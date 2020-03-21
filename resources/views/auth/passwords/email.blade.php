@extends('layouts.layout')
@section('title', 'Сброс пароля')
@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
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
            <h2>Забыли пароль?</h2>
            <div class="spacer"></div>
            <form action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <div class="login-container">
                    <button type="submit" class="auth-button">Отправить ссылку для сброса пароля</button>
                </div>


            </form>
        </div>
        <div class="auth-right">
            <h2>Информация о забытом пароле</h2>
            <div class="spacer"></div>
            <p>Пожалуйста, укажите email, который Вы использовали для входа на сайт.</p>
            <div class="spacer"></div>
            <p>Откройте электронное письмо, нажмите Сбросить пароль и дважды введите новый пароль.</p>
        </div>
    </div>
</div>
@endsection

