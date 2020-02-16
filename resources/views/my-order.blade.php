@extends('layouts.layout')

@section('title', 'Мой заказ')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section my-orders container">
        <div class="action-bar">
            <ul>
                <li><a href="{{ route('users.edit') }}">Мой профиль</a></li>
                <li class="active"><a href="{{ route('orders.index') }}">Мои заказы</a></li>
            </ul>
        </div>

        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">Номер заказа: {{ $order->id }}</h1>
            </div>

            <div>
                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                <div class="uppercase font-bold">Заказ размещен</div>
                                <div>{{ presentDate($order->created_at) }}</div>
                            </div>
                            <div>
                                <div class="uppercase font-bold">Номер заказа</div>
                                <div>{{ $order->id }}</div>
                            </div><div>
                                <div class="uppercase font-bold">Всего</div>
                                <div>{{ presentPrice($order->billing_total) }}</div>
                            </div>
                        </div>
                        <div>
                            <div class="order-header-items">
                                <div><span>Счет-фактура</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="order-products">
                        <table class="table products-table">
                            <tbody>
                                <tr>
                                    <td>Имя</td>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Адрес</td>
                                    <td>{{ $order->billing_address }}</td>
                                </tr>
                                <tr>
                                    <td>Город</td>
                                    <td>{{ $order->billing_city }}</td>
                                </tr>
                                <tr>
                                    <td>Суммма</td>
                                    <td>{{ presentPrice($order->billing_subtotal) }}</td>
                                </tr>
                                <tr>
                                    <td>Налог</td>
                                    <td>{{ presentPrice($order->billing_tax) }}</td>
                                </tr>
                                <tr>
                                    <td>Всего</td>
                                    <td>{{ presentPrice($order->billing_total) }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div> <!-- end order-container -->

                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                Элементы заказа
                            </div>

                        </div>
                    </div>
                    <div class="order-products">
                        @foreach ($products as $product)
                            <div class="order-product-item">
                                <div><img src="{{ productImage($product->image) }}" alt="{{ $product->name }}"></div>
                                <div>
                                    <div>
                                        <a class="order-link" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                    </div>
                                    <div>{{ presentPrice($product->price) }}</div>
                                    <div>Количество: {{ $product->pivot->quantity }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> <!-- end order-container -->
            </div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection
