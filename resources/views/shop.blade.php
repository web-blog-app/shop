@extends('layouts.layout')

@section('title', 'Товар')


@section('content')
    <div class="catalog-page common-catalog-page">
      <div class="side-bar">
          <div class="categories-title">
              Категории
          </div>
          <ul class="categories-list">
              <li class="categories-list-item actions"><a href="#">Акции!</a></li>
              <li class="categories-list-item active"><a href="#">Сварочные аппараты</a></li>
              <li class="categories-list-item"><a href="#">Инструменты</a></li>
              <li class="categories-list-item"><a href="#">Сад и огород</a></li>
              <li class="categories-list-item"><a href="#">Сервис</a></li>
          </ul>
      </div>

      <div class="products-section">
          <div class="sort-menu">
              <ul class="sort-menu-list">
                  <li class="sort-menu-list-item"><a href="#">Сначала Акции</a></li>
                  <li class="sort-menu-list-item active"><a href="#">Сначала дешёвые</a></li>
                  <li class="sort-menu-list-item"><a href="#">Сначала дорогие</a></li>
              </ul>
          </div>
          <div class="product-cards">
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide1.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide2.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide1.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide2.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide1.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide2.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide1.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide2.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide1.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide2.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide1.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide2.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide1.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
              <div class="product-card">
                  <img class="card-image" src="{{ asset('/img/slider/slide2.jpg') }}" alt="">
                  <div class="card-title">
                      Сварочный аппарат ТПИ-12345
                  </div>
                  <div class="card-price">
                      19 999р.
                  </div>
                  <div class="card-button">
                      в корзину
                  </div>
              </div>
          </div>
      </div>
    </div>
@endsection

