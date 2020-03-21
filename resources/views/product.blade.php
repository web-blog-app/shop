@extends('layouts.layout')

@section('title', "$product->name")


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

    <div class="catalog-page common-catalog-page">
        <div class="side-bar">
            <div class="categories-title">
              Категории:
          </div>
          <ul class="categories-list">
            @foreach ($categories as $category)
                    <li class="categories-list-item sub-menu" data-slug="{{$category -> slug}}">             	
              	@if(!$category->sub->count())
                <a href="{{ route('shop.index', ['category' => $category->slug]) }}" class="main-category-menu-item">
                    {{ $category->name }}
                </a>
                @else
                <a class="main-category-menu-item">
                    {{ $category->name }}                   
                </a>
                @include('partials.show', ['categories' => $category->sub])
                @endif                 
              </li>
              @endforeach       
      </div>

        <div class="products-section">
            <div class="single-product">
                <div class="product-images">
                    <div class="product-section-image">
                        <img src="{{ productImage($product->image) }}" alt="{{$product->name}}" class="active" id="currentImage">
                    </div>
                    <div class="product-section-images">
                        <div class="product-section-thumbnail selected">
                            <img src="{{ productImage($product->image) }}" alt="{{$product->name}}">
                        </div>
                        @if ($product->images)                    
                          @foreach (json_decode($product->images, true) as $image)
                        <div class="product-section-thumbnail">
                          <img src="{{ productImage($image) }}" alt="product">
                        </div>
                        @endforeach
                      @endif
                    </div>
                </div>
                <div class="product-section-information">

                    <h1 class="product-section-title title">{{ $product->name }}</h1>
                    <div class="product-section-subtitle subtitle">{{ $product->details }}</div>
                    <div class="is-exist">Осталось: {{$product->quantity}} шт.</div>
                    <div class="product-section-price">{{ $product->presentPrice() }}</div>                    

                    @if ($product->quantity > 0)
                    <form action="{{ route('cart.store', $product) }}" method="POST">
                      {{ csrf_field() }}
                      <button type="submit" class="button product-section-button">Добавить в корзину</button>
                    </form>
                    @endif
                </div>
                <div class="product-additional-info">
                    <ul class="tabs">
                        <li class="tab-link current" data-tab="tab-1">Характеристики</li>
                        <li class="tab-link" data-tab="tab-2">Доставка по РФ</li>
                    </ul>
                    <div id="tab-1" class="tab-content current">
                      {!! $product->description !!}                        
                    </div>
                    <div id="tab-2" class="tab-content">
                        Отправка заказов в регионы России осуществляется рядом транспортных компаний. Доставка в регионы оплачивается покупателем в соответствии с тарифами компании, осуществляющей перевозку. Доставка оплачивается покупателем при получении груза в транспортной компании.
                        Для оформления доставки потребуются ваши паспортные данные.
                        Доставка Вашего заказа до терминала транспортной компании осуществляется бесплатно нашей службой логистики.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection