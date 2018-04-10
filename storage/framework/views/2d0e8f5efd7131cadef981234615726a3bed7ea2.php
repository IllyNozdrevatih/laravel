<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?> " enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('full_name') ? ' has-error' : ''); ?>">
                                <label for="full_name" class="col-md-4 control-label">Ф.И.О.</label>

                                <div class="col-md-6">
                                    <input id="full_name" type="text" class="form-control" name="full_name" value="<?php echo e(old('full_name')); ?>" required autofocus>

                                    <?php if($errors->has('full_name')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('full_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="password" class="col-md-4 control-label">Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Повторите пароль</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('number') ? ' has-error' : ''); ?>">
                                <label for="number" class="col-md-4 control-label">Номер телефона</label>

                                <div class="col-md-6">
                                    <input id="number" type="text" class="form-control" name="number" value="<?php echo e(old('number')); ?>" required autofocus>

                                    <?php if($errors->has('number')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('number')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                <label for="address" class="col-md-4 control-label">Адрес</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>" required autofocus>

                                    <?php if($errors->has('address')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('path_to_image') ? ' has-error' : ''); ?>">
                                <label for="path_to_image" class="col-md-4 control-label">Изображение</label>

                                <div class="col-md-6">
                                    <input id="path_to_image" type="file" class="form-control" name="path_to_image" value="<?php echo e(old('path_to_image')); ?>">

                                    <?php if($errors->has('path_to_image')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('path_to_image')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>