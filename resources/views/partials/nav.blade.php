<header class="header">
  <div class="mobile-menu">
    <div class="close">
      <div class="close-cross-line-left">
        <div class="close-cross-line-right"></div>
      </div>
    </div>
    <div class="mobile-menu-content">
      <form class="search"  action="{{ route('search') }}" method="GET">      
        <input type="search" name="query" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Найти..." required>
      {{ csrf_field() }}
      </form>
      <ul class="mobile-menu-list">
        <li><a href="{{ route('landing-page') }}">Главная</a></li>
        <li><a href="{{ route('shop.index') }}">Каталог</a></li> 
        <li><a href="{{ route('contact') }}">Контакты</a></li>
        <li><a href="{{ route('about') }}">О нас</a></li>
      </ul>
    </div>
  </div>
  <div class="header-top">
    <a href="{{ route('landing-page') }}" class="header-logo"> <span class="minimaze">Компания</span> А<span>2</span></a>
    <form class="search"  action="{{ route('search') }}" method="GET">      
      <input type="search" name="query" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Найти..." required>
      {{ csrf_field() }}
    </form>
    <ul class="account">
       @guest
          <li><a href="{{ route('login') }}">Вход</a>/<a href="{{ route('register') }}">Регистрация</a></li>          
       @else
          <li><a href="{{ route('users.edit') }}">Мой аккаунт</a>    </li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
              Выход
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
       @endguest
    </ul>
    <div class="cart">
      <a  href="{{ route('cart.index') }}"> 
        @if (Cart::instance('default')->count() > 0)
        <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
        @endif
      <i class="fas fa-cart-plus"></i>
      <span>Тележка</span>
      </a>      
    </div>
    <ul class="menu-list">
      <li><a href="{{ route('contact') }}">Контакты</a></li>
      <li><a href="{{ route('about') }}">О нас</a></li>
    </ul>
    <div class="header-contacts">
      <a class="phone" href="/">+7 951 132-15-25</a>
      <a class="email" href="/">beru@beru.ru</a>
    </div>
    <a class="hamburger">
      <b></b>
      <b></b>
      <b></b>
    </a>
  </div>
  <div class="header-bottom">
    <ul class="menu">
      <li class="actions"><a href="{{ route('shop.index', ['category' => 'action']) }}">Акции</a></li>
      <li><a href="{{ route('shop.index') }}">Каталог</a></li>
      <li><a href="{{ route('shop.index', ['category' => 'svarka']) }}">Сварочные аппараты</a></li>
      <li><a href="{{ route('shop.index', ['category' => 'instruments']) }}">Инструмент</a></li>
      <li><a href="{{ route('shop.index', ['category' => 'sad']) }}">Сад и Дача</a></li>
    </ul>
  </div>
</header>

