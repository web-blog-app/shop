@extends('layouts.layout')
@section('title', 'A2 Company')

@section('content')
    <div class="application">
        <div class="main-slider">
            <div class="slide">
                <div class="slide-content container">
                    <img src="{{ asset('/img/slider/slider1.png') }}" alt="">
                    <div class="description-container" style="background-image:url('{{ asset('/img/slider/slidebg1.jpg') }}')">
                        <div class="slide-layer"></div>
                        <ul class="description">
                            <li>
                                Надёжность
                            </li>
                            <li>
                                Доставка по всей России!
                            </li>
                            <li>
                                Цена всего 29999 руб.
                            </li>
                        </ul>
                        <div class="slide-button">
                            Подробнее
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content container">
                    <img src="{{ asset('/img/slider/slider2.png') }}" alt="">
                    <div class="description-container" style="background-image:url('{{ asset('/img/slider/slidebg2.jpg') }}')">
                        <div class="slide-layer"></div>
                        <ul class="description">
                            <li>
                                Выбор года!
                            </li>
                            <li>
                                Качество
                            </li>
                            <li>
                                Скидки!
                            </li>
                        </ul>
                        <div class="slide-button">
                            Подробнее
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content container">
                    <img src="{{ asset('/img/slider/slide1.jpg') }}" alt="">
                    <div class="description-container" style="background-image:url('{{ asset('/img/slider/slidebg1.jpg') }}')">
                        <div class="slide-layer"></div>
                        <ul class="description">
                            <li>
                                Хит продаж!
                            </li>
                            <li>
                                Маска в подарок!
                            </li>
                            <li>
                                Гарантия 3 года!
                            </li>

                        </ul>
                        <div class="slide-button">
                            Подробнее
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
                        <img src="{{ productImage($product->image) }}" alt="product">
                        <div class="product-description">
                            
                            <span class="warning">
                            Что отличает данный продукт от других!
                            </span>
                        </div>
                        <div class="product-price">
                            {{ $product->presentPrice() }}
                        </div>
                        <div class="product-button">
                            <a href="{{ route('shop.show', $product->slug) }}">
                            Купить
                        </a>
                        </div>
                        <div class="wave">-50%</div>
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
                        Компания А2 располагается по адресу:
                    </div>
                    <div class="address">
                        Санкт-Петербург ул. Любых Инструметов д.1 пом.1
                    </div>
                    <div class="phone">
                        + 7 (965) 123-12-12
                    </div>
                    <div class="recall-form-button" data-micromodal-trigger="modal-call">
                        заказать звонок
                    </div>
                </div>
                <div class="map-container">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A37fe8f99a90c2e486d278811fd39136476d50ab57caf3b63b7acf8ab170e552c&amp;width=100%25&amp;height=520&amp;lang=ru_RU&amp;"></script>
                </div>
            </div>
        </div>
        <div class="advantages container">
            <div class="advantages-list">
                <div class="advantage-item">
                    <img src="{{ asset('/img/advantages/a1.png') }}" alt="">

                    <div class="advantage-title">Действуем чётко</div>
                    <div class="advantages-description">
                        Мы всегда помним о пожеланиях клиентов и никогда не забываем
                        о их предпочтениях. Это позволяет работать максимально эффективно
                    </div>
                </div>
                <div class="advantage-item">
                    <img src="{{ asset('/img/advantages/a2.png') }}" alt="">

                    <div class="advantage-title">Все новинки у нас!</div>
                    <div class="advantages-description">
                        Мы всегда помним о пожеланиях клиентов и никогда не забываем
                        о их предпочтениях. Это позволяет работать максимально эффективно
                    </div>
                </div>
                <div class="advantage-item">
                    <img src="{{ asset('/img/advantages/a3.jpg') }}" alt="">

                    <div class="advantage-title">Все виды оплаты</div>
                    <div class="advantages-description">
                        Мы всегда помним о пожеланиях клиентов и никогда не забываем
                        о их предпочтениях. Это позволяет работать максимально эффективно
                    </div>
                </div>
                <div class="advantage-item">
                    <img src="{{ asset('/img/advantages/a4.jpg') }}" alt="">

                    <div class="advantage-title">Доставляем!</div>
                    <div class="advantages-description">
                        Мы всегда помним о пожеланиях клиентов и никогда не забываем
                        о их предпочтениях. Это позволяет работать максимально эффективно
                    </div>
                </div>
            </div>
        </div>

        <div class="feedback-section">
            <div class="title">Отзывы о нас</div>
            <div class="feedback-slider">
                <div class="feedback-slide">
                    <div class="feedback-slide-content container">
                        <div class="feedback-image" style="background-image:url('{{ asset('/img/slider/feedback.jpg') }}')"></div>
                        <div class="feedback-description-container">
                            Заказывал шуруповерт Sturm!, договорились с менеджером, обсудили детали сделки. Доставили до подъезда.
                            Был нюанс: осевое биение патрона шуруповерта. Все без проблем заменили. Спасибо за Ваш труд.
                        </div>
                    </div>
                </div>
                <div class="feedback-slide">
                    <div class="feedback-slide-content container">
                        <div class="feedback-image" style="background-image:url('{{ asset('/img/slider/feedback1.jpg') }}')"></div>
                        <div class="feedback-description-container">
                            Заказывал шуруповерт Sturm!, договорились с менеджером, обсудили детали сделки. Доставили до подъезда.
                            Был нюанс: осевое биение патрона шуруповерта. Все без проблем заменили. Спасибо за Ваш труд.
                        </div>
                    </div>
                </div>
                <div class="feedback-slide">
                    <div class="feedback-slide-content container">
                        <div class="feedback-image" style="background-image:url('{{ asset('/img/slider/feedback2.jpg') }}')"></div>
                        <div class="feedback-description-container">
                            Заказывал шуруповерт Sturm!, договорились с менеджером, обсудили детали сделки. Доставили до подъезда.
                            Был нюанс: осевое биение патрона шуруповерта. Все без проблем заменили. Спасибо за Ваш труд.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end #app -->
@endsection
