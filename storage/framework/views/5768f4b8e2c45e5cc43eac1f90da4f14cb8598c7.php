<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form action="" method="POST">
                        <div class="panel-body">
                            <p>Сообщение</p>
                            <input type="text" name="massage">
                        </div>
                        <div class="panel-body">
                            <select name="doctor">
                                <?php if($id != 'null'): ?>
                                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($doctor->id == $id): ?>
                                            <option value="<?php echo e($doctor->id); ?>">
                                                <?php echo e($doctor->specialization); ?> : <?php echo e($doctor->full_name); ?>

                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <option value="">Не выбрано</option>
                                <?php endif; ?>
                                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($doctor->id == $id): ?>
                                        <?php else: ?>
                                            <option value="<?php echo e($doctor->id); ?>">
                                                <?php echo e($doctor->specialization); ?> : <?php echo e($doctor->full_name); ?>

                                            </option>
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="panel-body">
                            <input type="submit" value="Отправить">
                        </div>
                        <?php echo e(csrf_field()); ?>

                    </form>
                    <?php if(count($errors)>0): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div  class="panel-body"><?php echo e($error); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>