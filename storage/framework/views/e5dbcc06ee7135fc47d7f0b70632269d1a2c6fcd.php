

<?php $__env->startSection('title', 'Мои заказы'); ?>



<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if(session()->has('success_message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success_message')); ?>

            </div>
        <?php endif; ?>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <div class="profile-section my-orders container">
        <div class="action-bar">

            <ul>
              <li><a href="<?php echo e(route('users.edit')); ?>">Мой профиль</a></li>
              <li class="active"><a href="<?php echo e(route('orders.index')); ?>">Мои заказы</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">Мои заказы</h1>
            </div>

            <div>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                <div class="uppercase font-bold">Заказ размещен</div>
                                <div><?php echo e(presentDate($order->created_at)); ?></div>
                            </div>
                            <div>
                                <div class="uppercase font-bold">Номер заказа</div>
                                <div><?php echo e($order->id); ?></div>
                            </div><div>
                                <div class="uppercase font-bold">Всего</div>
                                <div><?php echo e(presentPrice($order->billing_total)); ?></div>
                            </div>
                        </div>
                        <div>
                            <div class="order-header-items">
                                <div><a class="order-link" href="<?php echo e(route('orders.show', $order->id)); ?>">Информация для заказа</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="order-products">
                        <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="order-product-item">
                                <div><img src="<?php echo e(productImage($product->image)); ?>" alt="<?php echo e($product->name); ?>"></div>
                                <div>
                                    <div>
                                        <a class="order-link"  href="<?php echo e(route('shop.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                                    </div>
                                    <div><?php echo e(presentPrice($product->price)); ?></div>
                                    <div>Количество: <?php echo e($product->pivot->quantity); ?></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div> <!-- end order-container -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="spacer"></div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>