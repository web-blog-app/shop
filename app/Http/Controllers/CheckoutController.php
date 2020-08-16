<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Voronkovich\SberbankAcquiring\Client;
use Voronkovich\SberbankAcquiring\Currency;
use Voronkovich\SberbankAcquiring\HttpClient\HttpClientInterface;
use Voronkovich\SberbankAcquiring\OrderStatus;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        return view('checkout')->with([
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sberCredit()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        return view('sber-credit')->with([
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)    {

        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Сожалею! Один из товаров в вашей корзине больше недоступен.');
        }

        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {

            $order = $this->addToOrdersTables($request, null);

            //Mail::send(new OrderPlaced($order));

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('confirmation.index')->with('success_message', 'Спасибо! Ваш заказ был успешно принят! В скором времени с вами свяжется наш менеджер');
        } catch (CardErrorException $e) {
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
    public function sberCheckout(CheckoutRequest $request)
    {  
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Сожалею! Один из товаров в вашей корзине больше недоступен.');
        }
     
       $client = new Client([
            'userName' => 'solaris-rf-credit-api',
            'password' => 'Sberbank1505075!',    
            'language' => 'ru',    
            'currency' => Currency::RUB,
            'httpMethod' => HttpClientInterface::METHOD_POST,              
            ]);       
              
        $orderId  = rand();
        $orderAmount = getNumbers()->get('newTotal');
              
        $returnUrl  = 'https://solaris-rf.ru/thankyou';
        $jsonParams = [
            'phone' => $request->phone,
            ]; 
         
        $n = 1;
        foreach (Cart::content() as $item) {
           
            $orderBundle['cartItems']['items'][] =[
                'positionId'  => $n++,
                'name'        => $item -> name,
                'quantity'    =>[
                        'value'   => $item -> qty,
                        'measure' => 'шт.'
                    ],
                'itemAmount'   => round($item -> price * $item -> qty,2),
                'itemPrice'    => $item -> price,
                'itemCurrency' => Currency::RUB,
                'itemCode'     => $item -> id,
            ];
        };
       
        
        $orderBundle['installments']['productID'] = 10;
        $orderBundle['installments']['productType'] = 'INSTALLMENT';
       
        
        $result = $client->registerOrder($orderId, $orderAmount, $returnUrl, $orderBundle, $jsonParams);
        $paymentFormUrl = $result ['formUrl'];
       
        

        $order = $this->addToOrdersTablesSber($request, $orderId, null);
               
         
           //Mail::send(new OrderPlaced($order));

            
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            session()->forget('coupon');

        return redirect($paymentFormUrl);

    }

 protected function addToOrdersTablesSber($request, $orderId, $error)
    {     

        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'sber_id' => $orderId,
            'sber_credit' => 'в кредит',
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_phone' => $request->phone,            
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'error' => $error,
            'payment_gateway' => 'sber',
        ]);
        
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function addToOrdersTables($request, $error)    {

        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_phone' => $request->phone,            
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

   

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }
}
