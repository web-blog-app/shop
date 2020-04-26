@extends('layouts.layout')

@section('title', 'Покупка')



@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.sber') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <h2 class="form-title">Заполните форму и система перенаправит вас в Ваш <span class="sberbank-logo"><img class="sber-logo-img" src="{{ asset('/img/logosber.svg') }}" alt="sberbank"></span> аккаунт</h2>
                    <h3 class="form-title">С условиями предоставления рассрочки можно ознакомиться по <a target="_blank" class="sber-color" href="https://www.pokupay.ru/credit_terms">ссылке</a></h3>

                    <div class="form-group">
                        <label for="email">Адрес электронной почты</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                            <label for="city">Город</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        </div>                   

                    <div class="half-form"> 
                    <div class="form-group">
                        <label for="address">Адрес</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    </div>                       
                        
                    </div> <!-- end half-form -->

                    <div class="half-form">                        
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <button type="submit" id="complete-order" class="sber-button action-button cart-button button-primary full-width">Завершить заказ</button>
                </form>              
            </div> 

            <div class="checkout-table-container">
                <h2>Ваш заказ</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{ productImage($item->model->image) }}" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $item->model->name }}</div>
                                <div class="checkout-table-description">{{ $item->model->details }}</div>
                                <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-text">Количество </div>
                            <div class="checkout-table-quantity"> {{ $item->qty }}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    @endforeach

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Промежуточный итог <br>
                        @if (session()->has('coupon'))
                            Скидка ({{ session()->get('coupon')['name'] }}) :
                            <br>
                            <hr>
                            Новая сумма <br>
                        @endif
                        Налог ({{config('cart.tax')}}%)<br>
                        <span class="checkout-totals-total">Всего</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ presentPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        {{ presentPrice($newTax) }} <br>
                        <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

