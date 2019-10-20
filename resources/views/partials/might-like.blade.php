<div class="might-like-section">
    <div class="container">
        <h2>Вам также может понравиться...</h2>
        <div class="might-like-container">
            @foreach ($mightAlsoLike as $product)
                <div class="product-card">
                    <a href="{{ route('shop.show', $product->slug) }}" class="might-like-product product-link">
                        <img src="{{ productImage($product->image) }}" alt="product">
                        <div class="might-like-product-name card-title">{{ $product->name }}</div>
                        <div class="might-like-product-price card-price">{{ $product->presentPrice() }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
