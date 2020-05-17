@extends('layouts.layout')
@section('title', 'A2 Company')

@section('content')
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
                <div class="map-container">
                    <script type="text/javascript" charset="utf-8" async defer src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A37fe8f99a90c2e486d278811fd39136476d50ab57caf3b63b7acf8ab170e552c&amp;width=100%25&amp;height=520&amp;lang=ru_RU&amp;"></script>
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

        <div class="feedback-section">
            <div class="title">Отзывы о нас</div>
            <div class="feedback-slider">
                <div class="feedback-slide">
                    <div class="feedback-slide-content container">
                        <div class="feedback-image" style="background-image:url('{{ asset('/img/slider/feedback.webp') }}')"></div>
                        <div class="feedback-description-container">
                            Заказывал шуруповерт Sturm!, договорились с менеджером, обсудили детали сделки. Доставили до подъезда.
                            Был нюанс: осевое биение патрона шуруповерта. Все без проблем заменили. Спасибо за Ваш труд.
                        </div>
                    </div>
                </div>
                <div class="feedback-slide">
                    <div class="feedback-slide-content container">
                        <div class="feedback-image" style="background-image:url('{{ asset('/img/slider/feedback1.webp') }}')"></div>
                        <div class="feedback-description-container">
                            Заказывал шуруповерт Sturm!, договорились с менеджером, обсудили детали сделки. Доставили до подъезда.
                            Был нюанс: осевое биение патрона шуруповерта. Все без проблем заменили. Спасибо за Ваш труд.
                        </div>
                    </div>
                </div>
                <div class="feedback-slide">
                    <div class="feedback-slide-content container">
                        <div class="feedback-image" style="background-image:url('{{ asset('/img/slider/feedback2.webp') }}')"></div>
                        <div class="feedback-description-container">
                            Заказывал шуруповерт Sturm!, договорились с менеджером, обсудили детали сделки. Доставили до подъезда.
                            Был нюанс: осевое биение патрона шуруповерта. Все без проблем заменили. Спасибо за Ваш труд.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end #app -->
    <script>
      window.onload = function() {
        setTimeout(function () {
          var preloader = document.getElementById('preloader');
          preloader.parentNode.removeChild(preloader);
        }, 1000);
      };
    </script>
@endsection
