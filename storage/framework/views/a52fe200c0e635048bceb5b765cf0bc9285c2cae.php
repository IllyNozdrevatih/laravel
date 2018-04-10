<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="info-block">
                            <img src="<?php echo e(URL::to('../')); ?>/<?php echo e($doctor->path_to_image); ?>" class="profile-img float">
                            <div class="panel-body height">
                                ФИО:<?php echo e($doctor->full_name); ?>

                            </div>
                            <div class="panel-body height">
                                Номер телефона:<?php echo e($doctor->number); ?>

                            </div>
                            <div class="panel-body height">
                                Специализация:<?php echo e($doctor->specialization); ?>

                            </div>
                            <?php if(isset($doctor->about_doctor)): ?>
                                <div class="panel-body ">
                                    <p>О докторе</p>
                                    <?php echo e($doctor->about_doctor); ?>

                                </div>
                            <?php endif; ?>
                            <div class="panel-body ">
                                <a href="statement_form/<?php echo e($doctor->id); ?>">Выбрать доктора</a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="panel-body"><?php echo e($doctors->links()); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>