@extends('layouts.layout')
@section('title', 'Контакты - A2 Company')

@section('content')
    <div class="contacts">
        <div class="contacts-info container">
            <div class="title">
                A2 всегда на связи
            </div>
            <div class="subtitle company-info">
                <div class="addresses">
                    <p>
                        Юридический адрес:
                    </p>
                    <p>
                        Санкт-Петербург ул. Любых Инструметов д.1 пом.1
                    </p>
                    <p>
                        Адрес магазина:
                    </p>
                    <p>
                        Санкт-Петербург ул. Любых Инструметов д.1 пом.1
                    </p>
                </div>
                <div class="phones">
                    <p>
                        Телефоны:
                    </p>
                    <p>
                        + 7 (965) 123-12-12
                    </p>
                    <p>
                        + 7 (965) 123-12-12
                    </p>
                    <p>
                        + 7 (965) 123-12-12
                    </p>
                </div>
            </div>
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
                    <div class="phone" data-micromodal-trigger="modal-call">
                        + 7 (965) 123-12-12
                    </div>
                    <div class="recall-form-button">
                        заказать звонок
                    </div>
                </div>
                <div class="map-container">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A37fe8f99a90c2e486d278811fd39136476d50ab57caf3b63b7acf8ab170e552c&amp;width=100%25&amp;height=520&amp;lang=ru_RU&amp;"></script>
                </div>
            </div>
        </div>
    </div> <!-- end #app -->
@endsection
