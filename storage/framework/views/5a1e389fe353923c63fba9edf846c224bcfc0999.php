<?php $__env->startSection('title', 'Магазин'); ?>


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
          </ul>
      </div>

      <div class="products-section">
          <span class="go-back-button">Назад</span>
          <div class="mobile-shop-controls">              
              <button type="button" class="btn open-categories btn-info">Категории</button>
          </div>
          <div class="sort-menu">
              <ul class="sort-menu-list">                  
                  <li class="sort-menu-list-item ">
                    <a href="<?php echo e(route('shop.index', ['category'=> request()->category, 'sort' => 'low_high'])); ?>">Сначала дешёвые</a> 
                  </li>
                  <li class="sort-menu-list-item">
                    <a href="<?php echo e(route('shop.index', ['category'=> request()->category, 'sort' => 'high_low'])); ?>">Сначала дорогие</a>
                  </li>
              </ul>
          </div>

          <div class="product-cards">
              <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="product-card">
                  <a href="<?php echo e(route('shop.show', $product->slug)); ?>" class="product-link">
                      <img class="card-image" src=" <?php echo e(productImage($product->image)); ?> " alt="<?php echo e($product->name); ?>">
                      <div class="card-title">
                          <?php echo e($product->name); ?>

                      </div>
                      <div class="card-price">
                          <?php echo e($product->presentPrice()); ?>

                      </div>
                      <div class="cart-button">
                        <form action="<?php echo e(route('cart.store', $product)); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <button type="submit" class="button button-plain">Добавить в корзину</button>
                        </form>
                      </div>
                  </a>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="text-align: left">Ничего не найдено</div>
              <?php endif; ?> 

              <div class="spacer"></div>
              <?php echo e($products->appends(request()->input())->links()); ?>

              </div>

          </div>
        <div class="mobile-categories-menu">
            <div class="close-btn close-categories">
                <div class="close-cross-line-left">
                    <div class="close-cross-line-right"></div>
                </div>
            </div>
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
            </ul>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>