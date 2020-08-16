

<?php $__env->startSection('title', 'Покупка'); ?>



<?php $__env->startSection('content'); ?>

    <div class="container">

        <?php if(session()->has('success_message')): ?>
            <div class="spacer"></div>
            <div class="alert alert-success">
                <?php echo e(session()->get('success_message')); ?>

            </div>
        <?php endif; ?>

        <?php if(count($errors) > 0): ?>
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="checkout-section">
            <div>
                <form action="<?php echo e(route('checkout.sber')); ?>" method="POST" id="payment-form">
                    <?php echo e(csrf_field()); ?>

                    <h2 class="form-title">Заполните форму и система перенаправит вас для перехода к оформлению кредита <span class="sberbank-logo"><img class="sber-logo-img" src="<?php echo e(asset('/img/button-sber.png')); ?>" alt="sberbank"></span></h2>
                    <h3 class="form-title">С условиями предоставления кредита без переплаты можно ознакомиться по <a target="_blank" class="sber-color" href="https://www.pokupay.ru/credit_terms">ссылке</a></h3>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="email">Адрес электронной почты</label>
                        <?php if(auth()->user()): ?>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>" readonly>
                        <?php else: ?>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" >
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                    </div>
                    <div class="half-form">                        
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" required>
                        </div>
                    </div> <!-- end half-form -->
                     <?php echo htmlFormSnippet(); ?>  

                    <div class="spacer"></div>

                    <button type="submit" id="complete-order" class="sber-button action-button cart-button button-primary full-width">Завершить заказ</button>
                </form>              
            </div> 

            <div class="checkout-table-container">
                <h2>Ваш заказ</h2>

                <div class="checkout-table">
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="<?php echo e(productImage($item->model->image)); ?>" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item"><?php echo e($item->model->name); ?></div>
                                <div class="checkout-table-description"><?php echo e($item->model->details); ?></div>
                                <div class="checkout-table-price"><?php echo e($item->model->presentPrice()); ?></div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-text">Количество </div>
                            <div class="checkout-table-quantity"> <?php echo e($item->qty); ?></div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Промежуточный итог <br>
                        <?php if(session()->has('coupon')): ?>
                            Скидка (<?php echo e(session()->get('coupon')['name']); ?>) :
                            <br>
                            <hr>
                            Новая сумма <br>
                        <?php endif; ?>
                        Налог (<?php echo e(config('cart.tax')); ?>%)<br>
                        <span class="checkout-totals-total">Всего</span>

                    </div>

                    <div class="checkout-totals-right">
                        <?php echo e(presentPrice(Cart::subtotal())); ?> <br>
                        <?php if(session()->has('coupon')): ?>
                            -<?php echo e(presentPrice($discount)); ?> <br>
                            <hr>
                            <?php echo e(presentPrice($newSubtotal)); ?> <br>
                        <?php endif; ?>
                        <?php echo e(presentPrice($newTax)); ?> <br>
                        <span class="checkout-totals-total"><?php echo e(presentPrice($newTotal)); ?></span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>