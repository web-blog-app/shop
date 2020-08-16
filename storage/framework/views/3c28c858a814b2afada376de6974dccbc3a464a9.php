

<?php $__env->startSection('title', 'Мой профиль'); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/algolia.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
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
    </div>

    <div class="profile-section container">
        <div class="action-bar">
            <ul>
              <li class="active"><a href="<?php echo e(route('users.edit')); ?>">Мой профиль</a></li>
              <li><a href="<?php echo e(route('orders.index')); ?>">Мои заказы</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">Мой профиль</h1>
            </div>

            <div>
                <form action="<?php echo e(route('users.update')); ?>" method="POST">
                    <?php echo method_field('patch'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="form-control">
                        <input id="name" type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" placeholder="Имя" required>
                    </div>
                    <div class="form-control">
                        <input id="email" type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" placeholder="Email" required>
                    </div>
                    <div class="form-control">
                        <input id="password" type="password" name="password" placeholder="Пароль">
                        <div>Оставьте пароль пустым, чтобы сохранить текущий пароль</div>
                    </div>
                    <div class="form-control">
                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Повторите Пароль">
                    </div>
                    <div>
                        <button type="submit" class="my-profile-button">Обновить профиль</button>
                    </div>
                </form>
            </div>

            <div class="spacer"></div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>