

<?php $__env->startSection('title', 'Результаты поиска'); ?>


<?php $__env->startSection('content'); ?>

 <span class="go-back-button">Назад</span>
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

    <div class="search-results-container container">
        <h1>Результаты поиска</h1>
        <p class="search-results-count"><?php echo e($products->total()); ?> результат(ы) для '<?php echo e(request()->input('query')); ?>'</p>

        <?php if($products->total() > 0): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Назвавние</th>
                    <th>Подробности</th>
                    <th class="search-price">Цена</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>  
                        <th><img src="<?php echo e(productImage($product->image)); ?>" alt="<?php echo e($product->name); ?>"></th>
                        <th><a href="<?php echo e(route('shop.show', $product->slug)); ?>"><?php echo e($product->name); ?></a></th>
                        <td><?php echo e($product->details); ?></td>
                        <td class="search-price"><?php echo e($product->presentPrice()); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <?php echo e($products->appends(request()->input())->links()); ?>

        <?php endif; ?>
    </div> <!-- end search-results-container -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>