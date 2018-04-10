<footer>
    <div class="container">
        <ul class="nav navbar-nav">
            <?php if(Auth::check()): ?>
                <li><a href="cabinet">Кабинет</a></li>
                <?php if(Auth::user()->role == 'client'): ?>
                <li><a href="<?php echo e(url('/allDoctors')); ?>">Доктора</a>
                    <li><a href="<?php echo e(url('/statement_form/null')); ?>">Заключить договор</a></li>
                <?php elseif(Auth::user()->role == 'doctor' || Auth::user()->role == 'admin'): ?>
                <li><a href="<?php echo e(url('/allDoctors')); ?>">Доктора</a>
                <li><a href="<?php echo e(url('/form_massage')); ?>">Письмо разработчику</a></li>
                    &nbsp;
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</footer>