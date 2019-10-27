@extends('layouts.layout')

@section('title', 'Товар')


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
              Категории
          </div>
          <ul class="categories-list">
              <li class="categories-list-item sub-menu">
                <a href="#weldings">
                    Сварочные аппараты
                </a>
                  <ul style="display: block;">
                      <li>
                          <a href="#weldings">
                              Полуавтомвтические
                          </a>
                      </li>
                      <li>
                          <a href="#weldings">
                              Автоматические
                          </a>
                      </li>
                      <li>
                          <a href="#weldings">
                              Кислородые горелки
                          </a>
                      </li>
                      <li>
                          <a href="#weldings">
                              Плазменные аппараты
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="categories-list-item sub-menu">
                  <a href="#cuttingWheels">
                      Отрезные круги
                  </a>
                  <ul style="display: block;">
                      <li>
                          <a href="#cuttingWheels">
                              Стандартные
                          </a>
                      </li>
                      <li>
                          <a href="#cuttingWheels">
                              Большие
                          </a>
                      </li>
                      <li>
                          <a href="#cuttingWheels">
                              Малые
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>

          {{--<ul class="categories-list">            --}}
            {{--@foreach ($categories as $category)              --}}
              {{--<li class="categories-list-item ">--}}
                {{--<a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>--}}
              {{--</li>--}}
            {{--@endforeach--}}
          {{--</ul>--}}
      </div>

      <div class="products-section">
          <div class="sort-menu">
              <ul class="sort-menu-list">
                  <li class="sort-menu-list-item">Сначала Акции</li>
                  <li class="sort-menu-list-item active">
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Сначала дешёвые</a> 
                  </li>
                  <li class="sort-menu-list-item">
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">Сначала дорогие</a>
                  </li>
              </ul>
          </div>

          <div class="product-cards">
              @forelse ($products as $product)
              <div class="product-card">
                  <a href="{{ route('shop.show', $product->slug) }}" class="product-link">
                      <img class="card-image" src=" {{ productImage($product->image) }} " alt="">
                      <div class="card-title">
                          {{ $product->name }}
                      </div>
                      <div class="card-price">
                          {{ $product->presentPrice() }}
                      </div>
                      <div class="cart-button">
                        <form action="{{ route('cart.store', $product) }}" method="POST">
                          {{ csrf_field() }}
                          <button type="submit" class="button button-plain">Добавить в корзину</button>
                        </form>
                      </div>
                  </a>
              </div>
              @empty
                    <div style="text-align: left">Ничего не найдено</div>
              @endforelse 

              <div class="spacer"></div>
              {{ $products->appends(request()->input())->links() }}
              </div>

          </div>
      </div>
    </div>
@endsection

