<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        ФИО:<?php echo e($user['full_name']); ?>

                    </div>
                    <div class="panel-body">
                        Номер телефона:<?php echo e($user['number']); ?>

                    </div>
                    <div class="panel-body">
                        Адресс:<?php echo e($user['address']); ?>

                    </div>
                    <div class="panel-body">
                        <img src="../<?php echo e($user['path_to_image']); ?>" style="width:150px; height:150px;">
                    </div>
                    <div class="panel-body">
                        <?php if($waitng_declorations > 0): ?>
                        <p>Поданиые заявления </p>
                        <table border="1">
                            <tr>
                                <td>имя клиента</td>
                                <td>сообщение</td>
                                <td>дата подачи</td>
                                <td>принять</td>
                                <td>отказаться</td>
                            </tr>
                            <?php $__currentLoopData = $declorations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $decloration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($decloration->status == 'ожидание'): ?>
                                <tr>
                                     <td><a href="Profile/<?php echo e($decloration->client_id); ?>"> <?php echo e($decloration->client_name); ?> </a></td>
                                     <td><?php echo e($decloration->massage); ?></td>
                                     <td> <?php echo e($decloration->created_at); ?></td>
                                    <td><a href="Accept/<?php echo e($decloration->id); ?>">Принять</a></td>
                                    <td><a href="Refuse/<?php echo e($decloration->id); ?>}">Отклонить</a></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php else: ?>
                            <p>Поданиых договоров нет</p>
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <?php if($accept_declorations > 0 ): ?>
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
                                    <td> <a href="Profile/<?php echo e($decloration->client_id); ?>"> <?php echo e($decloration->client_name); ?> </a></td>
                                    <td> <?php echo e($decloration->created_at); ?></td>
                                    <td> <?php echo e($decloration->updated_at); ?></td>
                                    <td><?php echo e($decloration->massage); ?></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php else: ?>
                            <p>Принятых заявлений нет</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>