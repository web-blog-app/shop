@extends('layouts.layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

    <div class="thank-you-section">
        <h1 class="title">Благодарим за покупку</h1>
        <p>Письмо с подтверждением было отправлено</p>
        <p>В ближайшее время с вами свяжется наш менеджер</p>
        <div class="spacer"></div>
        <div>
            <a href="{{ url('/') }}" class="button-primary cart-button">Вернуться в Каталог</a>
        </div>
    </div>

@endsection