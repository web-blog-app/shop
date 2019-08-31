<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors('Неверный код купона. Пожалуйста, попробуйте еще раз.');
        }

        dispatch_now(new UpdateCoupon($coupon));

        return back()->with('success_message', 'Купон был применен!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return back()->with('success_message', 'Купон был удален.');
    }
}
