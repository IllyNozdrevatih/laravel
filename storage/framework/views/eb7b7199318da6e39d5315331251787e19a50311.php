<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Кабинет администратора</p>
                    </div>
                    <div class="panel-body">
                        <table border="1" class="text-align">
                            <tr>
                                <td>имя доктора</td>
                                <td>специализация</td>
                                <td>фото</td>
                                <td>начало рабочего дня</td>
                                <td>конец рабочего дня</td>
                                <td>количество заявлений</td>
                                <td>количество принятых заявлений</td>
                                <td>редактировать</td>
                                <td>удалиить</td>
                            </tr>
                            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="Profile/<?php echo e($doctor->id); ?>"><?php echo e($doctor->full_name); ?></a></td>
                                <td><?php echo e($doctor->specialization); ?></td>
                                <td><img src="<?php echo e(URL::to('../')); ?>/<?php echo e($doctor->path_to_image); ?>" class="img"></td>
                                <td><?php echo e($doctor->start_working); ?></td>
                                <td><?php echo e($doctor->finish_working); ?></td>
                                <td><?php echo e($doctor->declaration_count); ?></td>
                                <td><?php echo e($doctor->declaration_accept); ?></td>
                                <td><a href="Update/<?php echo e($doctor->id); ?>">редактировать</a></td>
                                <td><a href="Del/<?php echo e($doctor->id); ?>">x</a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                    <div class="panel-body">
                        <a href="Add">добавить доктора</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>