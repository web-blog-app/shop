<ul style="display: block;">
  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li>
    <a href="<?php echo e(route('shop.index', ['category' => $category->slug])); ?>">
    <?php echo e($category->name); ?>

    </a>
    <?php if($category->sub->count()): ?>
      <?php echo $__env->make('partials.show', ['categories' => $category->sub], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>      
  </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>