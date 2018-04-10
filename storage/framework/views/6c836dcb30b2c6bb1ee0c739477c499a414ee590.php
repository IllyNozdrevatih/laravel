<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>Письмо разработщику</h1>
                    </div>
                        <?php echo Form::open(['url' => 'send-mail']); ?>


                    <div class="panel-body">
                        <p>Сообщение</p>
                        <?php echo e(Form::textarea('massage')); ?>

                    </div>
                    <div class="panel-body">
                        <?php echo e(Form::submit('send')); ?>

                    </div>
                        <?php echo Form::close(); ?>


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