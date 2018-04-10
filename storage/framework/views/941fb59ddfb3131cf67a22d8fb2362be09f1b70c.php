<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body float">
                        <img src="<?php echo e(URL::to('../')); ?>/<?php echo e($user['path_to_image']); ?>" class="profile-img">
                    </div>
                    <div class="panel-body height">
                        ФИО:<?php echo e($user['full_name']); ?>

                    </div>
                    <?php if(isset($user['specialization'])): ?>
                        <div class="panel-body height">
                            Специализация: <?php echo e($user['specialization']); ?>

                        </div>
                    <?php endif; ?>
                    <div class="panel-body height">
                        Номер телефона:<?php echo e($user['number']); ?>

                    </div>
                    <div class="panel-body height">
                        Адресс:<?php echo e($user['address']); ?>

                    </div>
                    <?php if(isset($user['about_doctor'])): ?>
                    <div class="panel-body ">
                        <p>О докторе</p>
                        <?php echo e($user['about_doctor']); ?>

                    </div>
                    <?php endif; ?>
              <?php if(!empty($declorations)): ?>
                  <div class="panel-body">
                                    <p>Принятые заявления</p>
                                    <table border="1">
                                        <tr>
                                            <td>имя клиента</td>
                                            <td>дата подачи</td>
                                            <td>дата заключения договора</td>
                                            <td>сообщение</td>
                                        </tr>
                                        <?php $__currentLoopData = $declorations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $decloration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($decloration->status == 'принят'): ?>
                                                <tr>
                                                    <td> <a href="<?php echo e(url('/Profile')); ?>/<?php echo e($decloration->client_id); ?>"> <?php echo e($decloration->client_name); ?> </a></td>
                                                    <td> <?php echo e($decloration->created_at); ?></td>
                                                    <td> <?php echo e($decloration->updated_at); ?></td>
                                                    <td><?php echo e($decloration->massage); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                    <?php endif; ?>
                    <div class="panel-body">
                        <a href="../cabinet">Вернуться в кабинет</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>