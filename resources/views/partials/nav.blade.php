<header>
  <div class="info-line container">
    <div class="info-line-left">
      <div class="addr">
        <strong><span>Лида</span></strong>
        <p>ул. Пролыгина д. 3</p>
        
      </div>          
    </div>
    <div class="info-line-center">
      <div class="logo"><a href="{{route('landing-page')}}">Рубан<span>ОК</span></a></div>
    </div>
    <div class="info-line-right">
      <div class="phone">
        <strong><i class="fas fa-phone-volume"></i> +7(981)<span>775-84-01</span></strong>        
        <p>С 10 до 20 без выходных</p>
      </div>      
    </div>    
  </div>
    <div class="top-nav container">
      <div class="top-nav-left">          
          @if (! (request()->is('checkout') || request()->is('guestCheckout')))
          {{ menu('main', 'partials.menus.main') }}
          @endif
      </div>      
      <div class="top-nav-right">        
        <ul>
          @guest
          <li><a href="{{ route('login') }}">Вход</a>/<a href="{{ route('register') }}">Регистрация</a></li>          
        @else
          <li><a href="{{ route('users.edit') }}">Мой аккаунт</a>    </li>
          <li> <a href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Выход </a> </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        @endguest   
          <li><a  href="{{ route('cart.index') }}"> 
            @if (Cart::instance('default')->count() > 0)
            <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
            @endif
            <i class="fas fa-cart-plus"></i> Тележка
            </a></li>                       
      </ul>       
      </div>
    </div> 
</header>

