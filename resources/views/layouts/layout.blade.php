<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> @yield('title', '')</title>

        
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poiret+One|Ruda&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')">
    <div class="container preloader">
        <div class="preloader-container">
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
        </div>
    </div>
    @include('partials.nav')
    <div class="wrapper">

        <div class="content">
            @yield('content')
        </div>

        <div class="footer-container">
            @include('partials.footer')
        </div>
    </div>
    @yield('extra-js')

    <div type="button" class="callback-bt" data-micromodal-trigger="modal-call">
        <div class="text-call">
            <i class="fa fa-phone"></i>
            <span>Заказать<br>звонок</span>
        </div>
    </div>
    <div class="modal micromodal-bounce" id="modal-call" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-call-title" aria-describedby="modal-call-content">
                <div role="document">
                    <header class="modal__header">
                        <h3 class="modal__title" id="modal-call-title">
                            Заказать обратный звонок
                        </h3>
                        <div class="form-general-error form-error">
                            Ошибка сервера. Попробуйте позже.
                        </div>
                    </header>
                    <main class="modal__content" id="modal-call-content">
                        <form novalidate class="form call-form">
                            <div class="form-group">
                                <div class="form-error">Некоректно введено имя</div>
                                <label class="form-label" for="name">Имя</label>
                                <input maxlength="60" data-validate="text" type="text" id="name" class="form-input">
                            </div>
                            <div class="form-group">
                                <div class="form-error">Некоректно введен номер</div>
                                <label class="form-label" for="phone">Номер телефона</label>
                                <input data-validate="phone" type="text" id="phone" class="form-input">
                            </div>
                            <footer class="modal__footer">
                                <button type="submit" class="modal__btn submit-button modal__btn-primary">Отправить</button>
                                <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Закрыть</button>
                            </footer>
                        </form>
                        <div class="form-success-msg">
                            Спасибо! <br> Мы обязательно свяжемся с вами!
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
