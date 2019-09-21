@extends('layouts.layout')

@section('title', 'Товар')


@section('content')
    <div class="catalog-page">
      <div class="side-bar">
          <ul class="categories-list">
              <li class="categories-list-item actions">Акции!</li>
              <li class="categories-list-item active">Сварочные аппараты</li>
              <li class="categories-list-item">Инструменты</li>
              <li class="categories-list-item">Сад и огород</li>
              <li class="categories-list-item">Сервис</li>
          </ul>
      </div>

      <div class="products-container">
          <div class="sort-menu">
              <ul class="sort-menu-list">
                  <li class="sort-menu-list-item">Сначала Акции</li>
                  <li class="sort-menu-list-item active">Сначала дешёвые</li>
                  <li class="sort-menu-list-item">Сначала дорогие</li>
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

