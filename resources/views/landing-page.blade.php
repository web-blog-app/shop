
    @extends('layouts.layout')

    @section('title', 'A2 Company')

    @section('content')
        <div id="app">
            <div class="dark-bg">
            <header class="with-background">               
                <div class="hero container">
                    <div class="hero-copy">
                        <h1>Изделия ручной работы из дерева</h1>
                        <p>Предложенные нами изделия из дерева способны оживить дизайн интерьера, добавить ему эксклюзивной изюминки, а также стать незаменимым помощником при приготовлении различных блюд. Такая продукция станет не только функциональной вещью на любой кухне, но и подарит хорошее настроение всем, кто будет ею пользоваться.</p>
                        <div class="hero-buttons">
                            <a href="#" class="button button-white">Подробнее о Нас</a>
                            
                        </div>
                    </div> 

                    <div class="hero-image">
                        <img src="img/box.png" alt="hero image">
                    </div> 
                </div> <!-- end hero -->
                </div>
            </header>

            <div class="featured-section">

                <div class="container">
                    <h1 class="text-center">Рекомендованные товары </h1>

                    <p class="section-description">Яркость, выразительность и самобытность ручных работ из дерева позволяет использовать их для декорирования любого помещения, создавая при этом уникальные интерьерные решения.</p>

                    <div class="products text-center">
                        @foreach ($products as $product)
                            <div class="product">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <img src="{{ productImage($product->image) }}" alt="product">
                                </a>
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <div class="product-name">
                                        {{ $product->name }}
                                    </div>
                                </a>
                                <div class="product-price">{{ $product->presentPrice() }}</div>
                            </div>
                        @endforeach

                    </div> <!-- end products -->

                    <div class="text-center button-container">
                        <a href="{{ route('shop.index') }}" class="button">Перейти в магазин </a>
                    </div>

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

            <blog-posts></blog-posts>
        </div> <!-- end #app -->

        @endsection
        @section('extra-js')
        <script src="js/app.js"></script>
        @endsection
 

