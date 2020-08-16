

<?php $__env->startSection('title', 'Авторизация'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            <?php if(session()->has('success_message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success_message')); ?>

            </div>
            <?php endif; ?> <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <h2>Постоянный клиент</h2>
            <div class="spacer"></div>

            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

               
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Электронный адрес" required autofocus>
                <input type="password" id="password" name="password" value="<?php echo e(old('password')); ?>" placeholder="Пароль" required>
               

                <div class="login-container">
                    <button type="submit" class="auth-button">Авторизоваться</button>
                    <label>
                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Запомнить меня
                    </label>
                </div>

                <div class="spacer"></div>

                <a href="<?php echo e(route('password.request')); ?>">
                    Забыли пароль?
                </a>

            </form>
        </div>

        <div class="auth-right">
            <h2>Новый покупатель</h2>
            <div class="spacer"></div>
            <p><strong>Сэкономьте время сейчас.</strong></p>
            <p>Вам не нужна учетная запись для оформления заказа.</p>
            <div class="spacer"></div>
            <a href="<?php echo e(route('guestCheckout.index')); ?>" class="auth-button-hollow">Продолжить как Гость</a>
            <div class="spacer"></div>
            &nbsp;
            <div class="spacer"></div>
            <p><strong>Сэкономьте время позже.</strong></p>
            <p>Создайте аккаунт для быстрого оформления заказа и легкого доступа к истории заказов.</p>
            <div class="spacer"></div>
            <a href="<?php echo e(route('register')); ?>" class="auth-button-hollow">Создать аккаунт</a>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>