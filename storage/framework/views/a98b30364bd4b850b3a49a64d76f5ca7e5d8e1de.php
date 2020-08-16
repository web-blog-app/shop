

<?php $__env->startSection('title', "$product->name"); ?>
<?php $__env->startSection('description', "$product->meta_description"); ?>)

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

    <div class="catalog-page common-catalog-page">
        <div class="side-bar">
            <div class="categories-title">
              Категории:
          </div>
          <ul class="categories-list">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="categories-list-item sub-menu" data-slug="<?php echo e($category -> slug); ?>">             	
              	<?php if(!$category->sub->count()): ?>
                <a href="<?php echo e(route('shop.index', ['category' => $category->slug])); ?>" class="main-category-menu-item">
                    <?php echo e($category->name); ?>

                </a>
                <?php else: ?>
                <a class="main-category-menu-item">
                    <?php echo e($category->name); ?>                   
                </a>
                <?php echo $__env->make('partials.show', ['categories' => $category->sub], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>                 
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
      </div>

        <div class="products-section">
            <div class="single-product">
                <div class="product-images">
                    <div class="product-section-image">
                        <img src="<?php echo e(productImage($product->image)); ?>" alt="<?php echo e($product->name); ?>" class="active" id="currentImage">
                    </div>
                    <div class="product-section-images">
                        <div class="product-section-thumbnail selected">
                            <img src="<?php echo e(productImage($product->image)); ?>" alt="<?php echo e($product->name); ?>">
                        </div>
                        <?php if($product->images): ?>                    
                          <?php $__currentLoopData = json_decode($product->images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-section-thumbnail">
                          <img src="<?php echo e(productImage($image)); ?>" alt="product">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                </div>
                <div class="product-section-information">

                    <h1 class="product-section-title title"><?php echo e($product->name); ?></h1>
                    <div class="product-section-subtitle subtitle"><?php echo e($product->details); ?></div>
                    <div class="is-exist">Осталось: <?php echo e($product->quantity); ?> шт.</div>
                    <div class="product-section-price"><?php echo e($product->presentPrice()); ?></div>                    

                    <?php if($product->quantity > 0): ?>
                    <form action="<?php echo e(route('cart.store', $product)); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                      <button type="submit" class="button product-section-button">Добавить в тележку</button>
                    </form>
                    
                    <p class="logo-container" >
                        Вы можете купить данный товар в кредит без переплат в один клик!
                    </p>
                    <form action="<?php echo e(route('cart.sberOneClick', $product)); ?>" method="GET">
                          <?php echo e(csrf_field()); ?>

                          <button style="outline: none" type="submit" class="button-loan cart-button"><img class="sber-logo-img" src="https://solaris-rf.ru/img/button-sber.png" alt="sberbank"></button>
                    </form>
                    <?php else: ?>
                    <p class="logo-container" >
                        Сожалеем, в данный момент этого товара нет на складе.
                    </p>
                    <?php endif; ?>
                </div>
                <div class="product-additional-info">
                    <ul class="tabs">
                        <li class="tab-link current" data-tab="tab-1">Характеристики</li>
                        <li class="tab-link" data-tab="tab-2">Доставка по РФ</li>
                    </ul>
                    <div id="tab-1" class="tab-content current">
                      <?php echo $product->description; ?>                        
                    </div>
                    <div id="tab-2" class="tab-content">
                        Отправка заказов в регионы России осуществляется рядом транспортных компаний. Доставка в регионы оплачивается покупателем в соответствии с тарифами компании, осуществляющей перевозку. Доставка оплачивается покупателем при получении груза в транспортной компании.
                        Для оформления доставки потребуются ваши паспортные данные.
                        Доставка Вашего заказа до терминала транспортной компании осуществляется бесплатно нашей службой логистики.
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>