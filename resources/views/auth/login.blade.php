@extends('layouts.layout')

@section('title', 'Авторизация')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2>Постоянный клиент</h2>
            <div class="spacer"></div>

            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Электронный адрес" required autofocus>
                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Пароль" required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Авторизоваться</button>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                    </label>
                </div>

                <div class="spacer"></div>

                <a href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>

            </form>
        </div>

        <div class="auth-right">
            <h2>Новый покупатель</h2>
            <div class="spacer"></div>
            <p><strong>Сэкономьте время сейчас.</strong></p>
            <p>Вам не нужна учетная запись для оформления заказа.</p>
            <div class="spacer"></div>
            <a href="{{ route('guestCheckout.index') }}" class="auth-button-hollow">Продолжить как Гость</a>
            <div class="spacer"></div>
            &nbsp;
            <div class="spacer"></div>
            <p><strong>Сэкономьте время позже.</strong></p>
            <p>Создайте аккаунт для быстрого оформления заказа и легкого доступа к истории заказов.</p>
            <div class="spacer"></div>
            <a href="{{ route('register') }}" class="auth-button-hollow">Создать аккаунт</a>

        </div>
    </div>
</div>
@endsection
