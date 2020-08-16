<div class="might-like-section">
    <div class="container">
        <h2>Вам также может понравиться...</h2>
        <div class="might-like-container">
            <?php $__currentLoopData = $mightAlsoLike; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card">
                    <a href="<?php echo e(route('shop.show', $product->slug)); ?>" class="might-like-product product-link">
                        <img src="<?php echo e(productImage($product->image)); ?>" alt="product">
                        <div class="might-like-product-name card-title"><?php echo e($product->name); ?></div>
                        <div class="might-like-product-price card-price"><?php echo e($product->presentPrice()); ?></div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
