@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
       <h1>Спасибо тебе за <br> Твоя очередь!</h1>
       <p>Письмо с подтверждением было отправлено</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Домашняя страница</a>
       </div>
   </div>




@endsection
