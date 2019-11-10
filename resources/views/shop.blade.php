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
              Категории:
          </div>
          <ul class="categories-list">
            @foreach ($categories as $category) 
              <li class="categories-list-item sub-menu" data-slug="{{$category -> slug}}">
                <a class="main-category-menu-item" href="{{ route('shop.index', ['category' => $category->slug]) }}">
                    {{ $category->name }}
                </a>               
                  @if($category->sub->count())                  
                   @include('partials.show', ['categories' => $category->sub])
                  @endif
              </li>
              @endforeach       
      </div>

      <div class="products-section">
          @component('components.breadcrumbs')
              <a href="/">Домашняя</a>
              <i class="fa fa-chevron-right breadcrumb-separator"></i>
              <span><a href="{{ route('shop.index') }}">Магазин</a></span>
              <i class="fa fa-chevron-right breadcrumb-separator"></i>
              <span><span><a href="#">{{$categoryName}}</a></span></span>
          @endcomponent
          <div class="sort-menu">
              <ul class="sort-menu-list">                  
                  <li class="sort-menu-list-item ">
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
                      <img class="card-image" src=" {{ productImage($product->image) }} " alt="{{ $product->name }}">
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

