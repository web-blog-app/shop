@extends('layouts.layout')
@section('title', 'Контакты - A2 Company')

@section('content')
    <div class="contacts">
        <div class="contacts-info container">
            <div class="title">
                {{setting('site.my_company')}} всегда на связи
            </div>
            <div class="subtitle company-info">
                <div class="addresses">
                    <p>
                        Юридический адрес:
                    </p>
                    <p>
                        {{setting('site.my_addr')}}
                    </p>
                    <p>
                        Адрес магазина:
                    </p>
                    <p>
                        {{setting('site.my_addr')}}
                    </p>
                </div>
                <div class="phones">
                    <p>
                        Телефоны:
                    </p>
                    <p>
                        {{setting('site.my_phone')}}
                    </p>
                    <p>
                        {{setting('site.my_phone2')}}
                    </p>
                    
                </div>
                <div class="common-contacts">
                    <p>Реквизиты:</p>
                    <p>ИП Иванов Иван Иванович.</p>
                    <p>ИНН 7778644521 / ОГРНИП 1076564644123.</p>
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
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A37fe8f99a90c2e486d278811fd39136476d50ab57caf3b63b7acf8ab170e552c&amp;width=100%25&amp;height=520&amp;lang=ru_RU&amp;"></script>
                </div>
            </div>
        </div>
    </div> <!-- end #app -->
@endsection
