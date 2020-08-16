

<?php $__env->startSection('title', 'Зарегистрировать аккаунт'); ?>

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
            <h2>Зарегистрировать аккаунт</h2>
            <div class="spacer"></div>

            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo e(csrf_field()); ?>

                 <?php echo csrf_field(); ?>

                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Имя" required autofocus>

                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder=" Электронный адрес" required>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Пароль" required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль"
                    required>
                <?php echo htmlFormSnippet(); ?>


                <div class="login-container">
                    <button type="submit" class="auth-button">Создать аккаунт</button>
                    <div class="already-have-container">
                        <p><strong>Уже есть аккаунт?</strong></p>
                        <a href="<?php echo e(route('login')); ?>">Войти</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="auth-right">
            <h2>Новый покупатель</h2>
            <div class="spacer"></div>
            <p><strong>Экономьте время сейчас.</strong></p>
            <p>Создание учетной записи позволит вам быстрее оформлять заказы, иметь легкий доступ к истории заказов и получать скидки и бонусы от нашего магазина.</p>


        </div>
    </div> <!-- end auth-pages -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>