<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Hospital</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
       footer {
           background-color: #5e5d5d;
       }

       body {
           height: 100%;
           display: flex;
           flex-direction: column;
           height: 100%;
       }
       html {
           height: 100%
       }
       #app {
           flex-grow:1;
       }

       .float {
           float: left;
       }

       .height {
           height: 45px;
       }

       .img{
           width: 40px;
           height: 30px;
       }

       .profile-img {
           width:120px;
           height:120px;
           margin: 5px;
       }
       .text-align {
           text-align: center;
       }

       .info-block {
           width: 338px;
           background-color: #262626;
           border: 2px solid  #262626;
           border-radius: 5px;
           float: left;
           margin: 10px;
           overflow: hidden;
           text-overflow: ellipsis;
           color: #cccccc;
       }
    </style>
</head>
<body>
    <div id="app">
        <header>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        Hospital
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <?php if(Auth::check()): ?>
                        <li><a href="<?php echo e(url('/cabinet')); ?>">Кабинет</a></li>
                            <?php if(Auth::user()->role == 'doctor' || Auth::user()->role == 'admin'): ?>
                        <li><a href="<?php echo e(url('/form_massage')); ?>">Письмо разработчику</a></li>
                            <?php elseif(Auth::user()->role == 'client'): ?>
                                <li><a href="<?php echo e(url('/allDoctors')); ?>">Доктора</a></li>
                                <li><a href="<?php echo e(url('/statement_form/null')); ?>">Заключить договор</a></li>
                            <?php endif; ?>    &nbsp;
                        <?php endif; ?>    &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Вход</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Регистрация</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           Выйти
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        </header>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
