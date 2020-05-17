<?php $__env->startSection('title', 'Тележка'); ?>


<?php $__env->startSection('content'); ?>
    <div class="cart-section container">
        <div>
            <?php if(session()->has('success_message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('success_message')); ?>

                </div>
            <?php endif; ?>

                <span class="go-back-button">Назад</span>
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(Cart::count() > 0): ?>

            <h2><?php echo e(Cart::count()); ?> товар(ы) в корзине</h2>

            <div class="cart-table">
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><img src="<?php echo e(productImage($item->model->image)); ?>" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><?php echo e($item->model->name); ?></a></div>
                            
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>


                                <button type="submit" class="cart-options">Удалить</button>
                            </form>

                            <form action="<?php echo e(route('cart.switchToSaveForLater', $item->rowId)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>


                                <button type="submit" class="cart-options">Сохранить на потом</button>
                            </form>
                        </div>
                        <div class="cart-quantity-container">
                            <select class="quantity" data-id="<?php echo e($item->rowId); ?>" data-productQuantity="<?php echo e($item->model->quantity); ?>">
                                <?php for($i = 1; $i < 5 + 1 ; $i++): ?>
                                    <option <?php echo e($item->qty == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="cart-price"><?php echo e(presentPrice($item->subtotal)); ?></div>
                    </div>
                </div> <!-- end cart-table-row -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div> <!-- end cart-table -->

            <?php if(! session()->has('coupon')): ?>

                <a href="#" class="have-code">Есть код?</a>

                <div class="have-code-container">
                    <form action="<?php echo e(route('coupon.store')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button button-plain">Применить</button>
                    </form>
                </div> <!-- end have-code-container -->
            <?php endif; ?>

            <div class="cart-totals">
                <div class="cart-totals-left">
                    <span class="promo-text">Доставка бесплатная</span>, потому что мы такие классные.
                </div>

                <div class="cart-totals-right">
                    <div class="cart-totals-text">Сумма <br>
                        <?php if(session()->has('coupon')): ?>
                            Code (<?php echo e(session()->get('coupon')['name']); ?>)
                            <form action="<?php echo e(route('coupon.destroy')); ?>" method="POST" style="display:block">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('delete')); ?>

                                <button type="submit" style="font-size:14px;">Удалить</button>
                            </form>
                            <hr>
                           Новая сумма <br>
                        <?php endif; ?>
                        Налог (<?php echo e(config('cart.tax')); ?>%)<br>
                        <span class="cart-totals-total">Всего</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        <?php echo e(presentPrice(Cart::subtotal())); ?> <br>
                        <?php if(session()->has('coupon')): ?>
                            -<?php echo e(presentPrice($discount)); ?> <br>&nbsp;<br>
                            <hr>
                            <?php echo e(presentPrice($newSubtotal)); ?> <br>
                        <?php endif; ?>
                        <?php echo e(presentPrice($newTax)); ?> <br>
                        <span class="cart-totals-total"><?php echo e(presentPrice($newTotal)); ?></span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="<?php echo e(route('shop.index')); ?>" class="button cart-button reverse action-button button-secondary">Продолжить покупки</a>
                <a href="<?php echo e(route('checkout.index')); ?>" class="button-primary action-button cart-button">Оформить заказ</a>
            </div>

            <div class="loan-section">
                <p class="logo-container" >
                    <img class="sber-logo-img" src="<?php echo e(asset('/img/logo-sber.png')); ?>" alt="sberbank">
                </p>
                <p>Вы также можете оформить кредит без переплаты на покупку, для этого нажмите на кнопку ниже.</p>

                <a href="<?php echo e(route('checkout.sber')); ?>" class="button-loan cart-button"><img class="sber-logo-img" src="<?php echo e(asset('/img/button-sber.png')); ?>" alt="sberbank"></a>
            </div>

            <?php else: ?>

                <h3>Нет товаров в корзине!</h3>
                <div class="spacer"></div>
                <a href="<?php echo e(route('shop.index')); ?>" class="button">Продолжить покупки</a>
                <div class="spacer"></div>

            <?php endif; ?>

            <?php if(Cart::instance('saveForLater')->count() > 0): ?>

            <h2><?php echo e(Cart::instance('saveForLater')->count()); ?> Сохранить на потом</h2>

            <div class="saved-for-later cart-table">
                <?php $__currentLoopData = Cart::instance('saveForLater')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><img src="<?php echo e(productImage($item->model->image)); ?>" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><?php echo e($item->model->name); ?></a></div>
                            <div class="cart-table-description"><?php echo e($item->model->details); ?></div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="<?php echo e(route('saveForLater.destroy', $item->rowId)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>


                                <button type="submit" class="cart-options">Удалить</button>
                            </form>

                            <form action="<?php echo e(route('saveForLater.switchToCart', $item->rowId)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>


                                <button type="submit" class="cart-options">Переместить в корзину</button>
                            </form>
                        </div>

                        <div><?php echo e($item->model->presentPrice()); ?></div>
                    </div>
                </div> <!-- end cart-table-row -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div> <!-- end saved-for-later -->

            <?php else: ?>

            <h3>У вас нет товаров, сохраненных на потом.</h3>

            <?php endif; ?>

        </div>

    </div> <!-- end cart-section -->

    <?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '<?php echo e(route('cart.index')); ?>'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '<?php echo e(route('cart.index')); ?>'
                    });
                })
            })
        })();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>