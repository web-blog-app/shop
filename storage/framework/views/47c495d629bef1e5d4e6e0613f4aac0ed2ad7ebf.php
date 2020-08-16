<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $__env->yieldContent('description', ''); ?>" >

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title> <?php echo $__env->yieldContent('title', ''); ?></title>
        <link rel="preconnect" href="//api-maps.yandex.ru">
	    <link rel="dns-prefetch" href="//api-maps.yandex.ru">
        <link rel="preconnect" href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" as="font" />
        <link rel="preconnect" href="https://fonts.googleapis.com/css?family=Poiret+One|Ruda&display=swap" as="font" />
        <link rel="preconnect" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" as="style" />

        <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">

        <!-- Fonts -->
       <?php echo htmlScriptTagJsApi(); ?>

        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poiret+One|Ruda&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <?php echo $__env->yieldContent('extra-css'); ?>
    </head>


<body class="<?php echo $__env->yieldContent('body-class', ''); ?>">
    <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="wrapper">

        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <div class="footer-container">
            <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <?php echo $__env->yieldContent('extra-js'); ?>
</body>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script>
      var _emv = _emv || [];
      _emv['campaign'] = '843f61d9c31569e5f15cc640';
      (function() {
        var em = document.createElement('script'); em.type = 'text/javascript'; em.async = true;
        em.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'leadback.ru/js/leadback.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(em, s);
      })();
    </script>
</html>