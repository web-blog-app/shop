@component('mail::message')
# Заказ принят 

Спасибо за ваш заказ.

**Номер заказа:** {{ $order->id }}

**Электронная почта заказа:** {{ $order->billing_email }}

**Название заказа:** {{ $order->billing_name }}

**Сумма заказа:** ${{ round($order->billing_total, 2) }}

**Заказанные товары**

@foreach ($order->products as $product)
Название: {{ $product->name }} <br>
Цена: {{ round($product->price , 2)}} руб. <br>
Количество: {{ $product->pivot->quantity }} <br>
@endforeach

Вы можете получить более подробную информацию о вашем заказе, зайдя на наш сайт.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Перейти на сайт
@endcomponent

Еще раз спасибо за то, что выбрали нас.

С уважением,
{{ config('app.name') }}
@endcomponent
