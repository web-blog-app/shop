<header class="header">
  <div class="mobile-menu">
    <div class="close">
      <div class="close-cross-line-left">
        <div class="close-cross-line-right"></div>
      </div>
    </div>
    <div class="mobile-menu-content">
      <form class="search"  action="<?php echo e(route('search')); ?>" method="GET">      
        <input type="search" name="query" id="query" value="<?php echo e(request()->input('query')); ?>" class="search-box" placeholder="Найти..." required>
      <?php echo e(csrf_field()); ?>

      </form>
      <ul class="mobile-menu-list">
        <li><a  href="<?php echo e(route('cart.index')); ?>">
            <span class="cart-title">Тележка</span>
            <?php if(Cart::instance('default')->count() > 0): ?>
              <span class="cart-count"><span><?php echo e(Cart::instance('default')->count()); ?></span></span>
            <?php endif; ?>
          </a>
        </li>
        <li><a href="<?php echo e(route('landing-page')); ?>">Главная</a></li>
        <li><a href="<?php echo e(route('shop.index')); ?>">Каталог</a></li>
        <li><a href="<?php echo e(route('contact')); ?>">Контакты</a></li>
        <li><a href="<?php echo e(route('about')); ?>">О нас</a></li>
      </ul>
    </div>
  </div>
  <div class="header-top-contacts">
    <div class="header-top-contacts-city">
      Санккт-Петербург
    </div>
    <div class="header-top-contacts-phones">
      <a href="tel:<?php echo e(setting('site.my_phone')); ?>"><i class="fa fa-phone"></i><?php echo e(setting('site.my_phone')); ?></a>
      <a href="tel:<?php echo e(setting('site.my_phone2')); ?>"><i class="fa fa-phone"></i><?php echo e(setting('site.my_phone2')); ?></a>
    </div>
    <ul class="menu-list">
      <li><a href="<?php echo e(route('contact')); ?>">Контакты</a></li>
      <li><a href="<?php echo e(route('about')); ?>">О нас</a></li>
    </ul>
    <ul class="account">
      <?php if(auth()->guard()->guest()): ?>
      <li><a href="<?php echo e(route('login')); ?>">Вход</a>/<a href="<?php echo e(route('register')); ?>">Регистрация</a></li>
      <?php else: ?>
        <li><a href="<?php echo e(route('users.edit')); ?>">Мой аккаунт</a>    </li>
        <li>
          <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            Выход
          </a>
        </li>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
          <?php echo e(csrf_field()); ?>

        </form>
        <?php endif; ?>
    </ul>
  </div>
  <div class="header-top">
    <a href="<?php echo e(route('landing-page')); ?>" class="header-logo"> <span class="minimaze">Компания</span> А<span>2</span></a>
    <form class="search"  action="<?php echo e(route('search')); ?>" method="GET">
      <input type="search" name="query" id="query" value="<?php echo e(request()->input('query')); ?>" class="search-box" placeholder="Найти..." required>
      <?php echo e(csrf_field()); ?>

    </form>
    <div class="cart">
      <a  href="<?php echo e(route('cart.index')); ?>">
        <?php if(Cart::instance('default')->count() > 0): ?>
        <span class="cart-count"><span><?php echo e(Cart::instance('default')->count()); ?></span></span>
        <?php endif; ?>
      <i class="fas fa-cart-plus cart-icon"></i>
      <span class="cart-title">Тележка</span>
      </a>
    </div>
    <a class="hamburger">
      <b></b>
      <b></b>
      <b></b>
    </a>
  </div>
  <div class="header-bottom">
    <ul class="menu">      
      <li class="actions"><a href="<?php echo e(route('shop.index')); ?>">Каталог</a></li>
      <?php echo e(menu('main', 'partials.menus.main')); ?>

    </ul>
    <div class="btn-group menu-mobile">
      <span class="actions"><a href="<?php echo e(route('shop.index')); ?>">Каталог</a></span>
      <button type="button" class="btn btn-default">Популярные Категории</button>
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu">
        <?php echo e(menu('main', 'partials.menus.main')); ?>

      </ul>
    </div>
  </div>
</header>

