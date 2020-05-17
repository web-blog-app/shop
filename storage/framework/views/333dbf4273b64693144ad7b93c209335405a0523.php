  
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>  

            <a href="<?php echo e(asset($menu_item->url)); ?>">                
                <?php echo e($menu_item->title); ?>

                <?php if($menu_item->title === 'Cart'): ?>
                    <?php if(Cart::instance('default')->count() > 0): ?>
                    <span class="cart-count"><span><?php echo e(Cart::instance('default')->count()); ?></span></span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

