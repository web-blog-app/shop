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
            <div class="single-product">
                <div class="product-images">
                    <div class="product-section-image">
                        <img src="{{ asset('/img/slider/slide2.jpg') }}" alt="product" class="active" id="currentImage">
                    </div>
                    <div class="product-section-images">
                        <div class="product-section-thumbnail selected">
                            <img src="{{ asset('/img/slider/slide2.jpg') }}" alt="product">
                        </div>


                        <div class="product-section-thumbnail">
                            <img src="{{ asset('/img/slider/slide1.jpg') }}" alt="product">
                        </div>
                        <div class="product-section-thumbnail">
                            <img src="{{ asset('/img/slider/slide2.jpg') }}" alt="product">
                        </div>
                        <div class="product-section-thumbnail">
                            <img src="{{ asset('/img/slider/slide1.jpg') }}" alt="product">
                        </div>
                        <div class="product-section-thumbnail">
                            <img src="{{ asset('/img/slider/slide2.jpg') }}" alt="product">
                        </div>
                    </div>
                </div>
                <div class="product-section-information">

                    <h1 class="product-section-title title">Сварочный аппарат ТПИ-12345</h1>
                    <div class="product-section-subtitle subtitle">Полуавтоматический сварочный аппарат подходящий для всех видов работ</div>
                    <div class="is-exist">В наличии</div>
                    <div class="product-section-price">19 990 р.</div>

                    <p class="product-section-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto, assumenda earum excepturi
                        facilis odit saepe ullam veritatis. Adipisci consequuntur dolor ducimus eum impedit ipsa, ipsam minus
                        nostrum reprehenderit voluptatem?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto, assumenda earum excepturi
                        facilis odit saepe ullam veritatis. Adipisci consequuntur dolor ducimus eum impedit ipsa, ipsam minus
                        nostrum reprehenderit voluptatem?
                    </p>

                    <button type="submit" class="button product-section-button">Добавить в корзину</button>
                </div>
                <div class="product-additional-info">
                    <ul class="tabs">
                        <li class="tab-link current" data-tab="tab-1">Характеристики</li>
                        <li class="tab-link" data-tab="tab-2">Доставка по РФ</li>
                    </ul>
                    <div id="tab-1" class="tab-content current">
                        Трёхфазный электронный сварочный аппарат точечной сварки с микропроцессорным управлением. Применим для использования в кузовных цехах.
                        Многофункциональная распределительная панель используется для автоматической регулировки параметров точечной сварки в зависимости от инструмента и толщины металлического листа.
                        Серийное исполнение с набором “Studder“ для точечной сварки гвоздей, шурупов, подкладочных шайб, клепок и специальных шайб для нагрева, обжима, расплющивания и выравнивания металлического листа.
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
