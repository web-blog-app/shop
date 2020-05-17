@extends('layouts.layout')

@section('title', 'Зарегистрировать аккаунт')

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
            <h2>Зарегистрировать аккаунт</h2>
            <div class="spacer"></div>

            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                 @csrf

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Имя" required autofocus>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder=" Электронный адрес" required>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Пароль" required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль"
                    required>
                {!! htmlFormSnippet() !!}

                <div class="login-container">
                    <button type="submit" class="auth-button">Создать аккаунт</button>
                    <div class="already-have-container">
                        <p><strong>Уже есть аккаунт?</strong></p>
                        <a href="{{ route('login') }}">Войти</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="auth-right">
            <h2>Новый покупатель</h2>
            <div class="spacer"></div>
            <p><strong>Экономьте время сейчас.</strong></p>
            <p>Создание учетной записи позволит вам быстрее оформлять заказы, иметь легкий доступ к истории заказов и получать скидки и бонусы от нашего магазина.</p>


        </div>
    </div> <!-- end auth-pages -->
</div>
@endsection
