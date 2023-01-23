<!
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/styles.css')); ?>">
    </head>
    <body class="p-3">
        <div class="grid grid-cols-5">
            <!--header content-->
            <header class="col-span-5 ">
                <div class="grid grid-cols-10" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="col-start-2 col-span-3">
                        <a href="<?php echo e(route('home')); ?>">
                            Home
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="col-start-9 inline">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="inline">
                                    <a class="" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="inline">
                                    <a class="" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="inline">
                                <p>
                                    Hello <?php echo e(Auth::user()->name); ?>

                                </p>

                                <div class="" aria-labelledby="navbarDropdown">
                                    <a class="text-red-700 hover:text-red-500" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </header>
            <!--###################################################-->
            <!--main content-->
            <div class="col-start-2 col-span-3 flex justify-center">
                <?php echo $__env->yieldContent('main_content'); ?>
            </div>
            <!--###################################################-->
            <!--footer content-->
            <footer class="text-black col-start-3 col-span-1 mt-8 pt-8 text-center">
                footer section
            </footer>
            <!--###################################################-->
        </div>

    </body>
</html>
<?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/layouts/mainLayout.blade.php ENDPATH**/ ?>