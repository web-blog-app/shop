
<?php $__env->startSection('title', 'Сброс пароля'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            <?php if(session()->has('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('status')); ?>

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
            <h2>Забыли пароль?</h2>
            <div class="spacer"></div>
            <form action="<?php echo e(route('password.email')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

               
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" required autofocus>
                <div class="login-container">
                    <button type="submit" class="auth-button">Отправить ссылку для сброса пароля</button>
                </div>
               

            </form>
        </div>
        <div class="auth-right">
            <h2>Информация о забытом пароле</h2>
            <div class="spacer"></div>
            <p>Пожалуйста, укажите email, который Вы использовали для входа на сайт.</p>
            <div class="spacer"></div>
            <p>Откройте электронное письмо, нажмите Сбросить пароль и дважды введите новый пароль.</p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>