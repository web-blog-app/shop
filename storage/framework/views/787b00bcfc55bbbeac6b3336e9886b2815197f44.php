<?php $__env->startComponent('mail::message'); ?>
# Заказ принят 

Спасибо за ваш заказ.

**Номер заказа:** <?php echo e($order->id); ?>


**Электронная почта заказа:** <?php echo e($order->billing_email); ?>


**ФИО:** <?php echo e($order->billing_name); ?>


**Сумма заказа:** <?php echo e(round($order->billing_total, 2)); ?> руб.

**Заказанные товары**

<?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
Название: <?php echo e($product->name); ?> <br>
Цена: <?php echo e(round($product->price , 2)); ?> руб. <br>
Количество: <?php echo e($product->pivot->quantity); ?> <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

Вы можете получить более подробную информацию о вашем заказе, зайдя на наш сайт.

<?php $__env->startComponent('mail::button', ['url' => config('app.url'), 'color' => 'green']); ?>
Перейти на сайт
<?php echo $__env->renderComponent(); ?>

Еще раз спасибо за то, что выбрали нас.

С уважением,
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
