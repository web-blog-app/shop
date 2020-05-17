@extends('layouts.layout')
@section('title', 'A2 Company')
@section('description', setting('site.description'))

@section('content')
    <style>
        #map-yandex {
            background: url("{{ asset('/img/map_6.png') }}") #ffffff no-repeat;
            background-position: center center;
            background-size: cover;
            width: 100%;
            height: 100%;
            min-height: 200px;
        }
        .loader {
            position: absolute;
            z-index: 15;
            top: -100%;
            left: 0;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            overflow: hidden;
            color: #000000;
            transition: opacity .7s ease;
            opacity: 0;
            background-color: rgba(0,0,0,.55);
        }

        .loader:after,
        .loader:before {
            box-sizing: border-box;
        }

        .loader.is-active {
            top: 0;
            opacity: 1;
        }

        .loader-default:after {
            position: absolute;
            top: calc(50% - 24px);
            left: calc(50% - 24px);
            width: 48px;
            height: 48px;
            content: '';
            animation: rotation 1s linear infinite;
            border: solid 8px #ffffff;
            border-left-color: transparent;
            border-radius: 50%;
        }

        @keyframes rotation {
            from {
                transform: rotate(0);
            }
            to {
                transform: rotate(359deg);
            }
        }

        @keyframes blink {
            from {
                opacity: .5;
            }
            to {
                opacity: 1;
            }
        }
    </style>
    <div id="preloader" class="container preloader">
        <div class="preloader-container">
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
        </div>
    </div>
    <div class="application">
        <div class="main-slider">
            <div class="slide">
                <div class="slide-content container">
                    <img src="{{ asset('/img/slider/slide1.webp') }}" alt="Полуавтомат сварочный Solaris MULTIMIG-226">
                    <div class="description-container" style="background-image:url('{{ asset('/img/slider/slidebg2.webp') }}')">
                        <div class="slide-layer"></div>
                        <ul class="description">
                            <li><strong>Полуавтомат сварочный Solaris MULTIMIG-226</strong> </li>
                            <li>Два режима:  Сварка проволокой/Сварка электродом.</li>
                            <li>Работает при просадке в сети до 160Вт.</li>
                            <li>Отлично сваривает тонкие мелаллы ток от 20А до 220А.</li>
                            <li>Функцией сварки точками SPOT.</li>
                            <li>Гарантия 24 месяца.</li>
                            <li>Цена: <strong class="price">19 500 р.</strong> </li>
                        </ul>
                        <div class="slide-button">
                            <a href="{{ route('shop.show',["p982186"]) }}">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content container">
                    <img src="{{ asset('/img/slider/slide2.webp') }}" alt="Полуавтомат сварочный Solaris TOPMIG-225">
                    <div class="description-container" style="background-image:url('{{ asset('/img/slider/slidebg1.webp') }}')">
                        <div class="slide-layer"></div>
                        <ul class="description">
                            <li ><strong>Полуавтомат сварочный Solaris TOPMIG-225.</strong> </li>
                            <li>Классический полуавтомат.<li>
                            <li>Работает при просадке в сети до 160Вт.</li>
                            <li>Отлично сваривает тонкие мелаллы ток от 20А до 220А.</li>
                            <li>Металлический механизм подачи проволоки.</li>
                            <li>Гарантия 24 месяца.</li>
                            <li>Цена: <strong class="price">14 500 р.</strong> </li>
                        </ul>
                        <div class="slide-button">
                            <a href="{{ route('shop.show',["real-mig-160n"]) }}">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content container">
                    <img src="{{ asset('/img/slider/slide3.webp') }}" alt="Полуавтомат сварочный Solaris MULTIMIG-227">
                    <div class="description-container" style="background-image:url('{{ asset('/img/slider/slidebg2.webp') }}')">
                        <div class="slide-layer"></div>
                        <ul class="description">
                            <li><strong>Полуавтомат сварочный Solaris MULTIMIG-227</strong> </li>
                            <li>Три режима:  Сварка проволокой/Сварка электродом/Сварка TIG вольфрамом</li>
                            <li>Отлично сваривает тонкие мелаллы ток от 20А до 220А.</li>
                            <li>Функцией сварки точками SPOT.</li>
                            <li>Гарантия 24 месяца.</li>
                            <li>Цена: <strong class="price">22 500 р.</strong> </li>
                        </ul>
                        <div class="slide-button">
                            <a href="{{ route('shop.show',["p1020513"]) }}">Подробнее</a>
                        </div>"
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content container">
                    <img src="{{ asset('/img/slider/slide4.webp') }}" alt="Полуавтомат сварочный Solaris MULTIMIG-228">
                    <div class="description-container" style="background-image:url('{{ asset('/img/slider/slidebg2.webp') }}')">
                        <div class="slide-layer"></div>
                        <ul class="description">
                            <li><strong>Полуавтомат сварочный Solaris MULTIMIG-228</strong></li>
                            <li>Три режима:  Сварка проволокой/Сварка электродом/Сварка TIG вольфрамом</li>
                            <li>Отлично сваривает тонкие мелаллы ток от 20А до 220А.</li>
                            <li>Функцией сварки точками SPOT.</li>
                            <li>Гарантия 24 месяца.</li>
                            <li>Цена: <strong class="price">22 500 р.</strong> </li>
                        </ul>
                        <div class="slide-button">
                            <a href="{{ route('shop.show',["p916563"]) }}">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-catalog">
            <div class="main-catalog-title title">
                Мы рекомендуем обратить внимание.
            </div>
            <div class="main-product-list">
                @foreach ($products as $product)
                    <div class="main-product-card-container">
                        <div class="product">
                            <div class="product-title">
                                {{ $product->name }}
                            </div>
                            <img src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                            <div class="product-description">

                            <span class="description">
                            {{str_limit($product->details, 130, ' ...')}}
                            </span>
                            </div>
                            <p class="card-logo"><img class="sber-logo-img" src="{{ asset('/img/logo-sber.png') }}" alt="sberbank"></p>
                            <div class="product-price">
                                {{ $product->presentPrice() }}
                            </div>
                            <div class="product-button">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    Подробнее
                                </a>
                            </div>
                            <div class="wave"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('shop.index') }}" class="catalog-button">
                Перейти в каталог
            </a>
        </div>
        <div class="map container">
            <div class="map-title title">
                ДОСТАВИМ БЕСПЛАТНО ПО РОССИИ!
            </div>
            <div class="map-subtitle subtitle">
                Если вы не нашли свой город, свяжитесь с нами, мы что-нибудь придумаем...
            </div>
            <div class="map-content">
                <div class="map-info container">
                    <div class="address-title">
                        Компания {{setting('site.my_company')}} располагается по адресу:
                    </div>
                    <div class="address">
                        {{setting('site.my_addr')}}
                    </div>
                    <div class="phone">
                        {{setting('site.my_phone')}}
                    </div>
                    <div class="recall-form-button" data-micromodal-trigger="modal-call">
                        заказать звонок
                    </div>
                </div>
                <div id="map-container" class="map-container">
                    <div class="loader loader-default"></div>
                    <div id="map-yandex"></div>
                </div>
            </div>
        </div>
        <div class="advantages container">
            <div class="advantages-list">
                <div class="advantage-item">
                    <img src="{{ asset('/img/advantages/a1.webp') }}" alt="Действуем чётко">

                    <div class="advantage-title">Действуем чётко</div>
                    <div class="advantages-description">
                        Мы всегда помним о пожеланиях клиентов и никогда не забываем
                        об их предпочтениях. Это позволяет работать максимально эффективно
                    </div>
                </div>
                <div class="advantage-item">
                    <img src="{{ asset('/img/advantages/a2.webp') }}" alt="Все новинки у нас">

                    <div class="advantage-title">Все новинки у нас!</div>
                    <div class="advantages-description">
                        У нас вы найдете только новую и современную технику, которая соответствует
                        всем стандартам качества и ГОСТам.
                    </div>
                </div>
                <div class="advantage-item">
                    <img src="{{ asset('/img/advantages/a3.webp') }}" alt="Без обмана">

                    <div class="advantage-title">Без обмана</div>
                    <div class="advantages-description">
                        Оплата производится наличными при получении товара.
                    </div>
                </div>
                <div class="advantage-item">
                    <img src="{{ asset('/img/advantages/a4.webp') }}" alt="Доставляем">

                    <div class="advantage-title">Доставляем!</div>
                    <div class="advantages-description">
                        Доставка в более чем 2000 пуктов выдачи.
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end #app -->
    <script>
      window.onload = function() {
          var preloader = document.getElementById('preloader');
          preloader.parentNode.removeChild(preloader);

      };
    </script>
@endsection