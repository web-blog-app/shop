

<?php $__env->startSection('title', 'Спасибо за покупку'); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-class', 'sticky-footer'); ?>

<?php $__env->startSection('content'); ?>

    <div class="thank-you-section">
        <h1 class="title">Благодарим за покупку</h1>
        <p>Письмо с подтверждением было отправлено</p>
        <p>В ближайшее время с вами свяжется наш менеджер</p>
        <div class="spacer"></div>
        <div>
            <a href="<?php echo e(url('/shop')); ?>" class="button-primary cart-button">Вернуться в Каталог</a>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>