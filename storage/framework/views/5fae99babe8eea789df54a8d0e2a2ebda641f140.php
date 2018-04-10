<style>
    .img {
        margin-top: 20px;
        width: 200px;
        height: 200px;
    }

    .textarea {
        width: 500px;
        height: 300px;
        resize: none;
        overflow-x:hidden;
        overflow-y:auto;
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Кабинет администратора</p>
                        <?php if(isset($isAddForm)): ?>
                            <p>Форма добовления пользователя</p>
                        <?php else: ?>
                            <P>Форма редактирования пользователя</P>
                        <?php endif; ?>
                    </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="panel-body">
                            <p>Имя доктора</p>
                                <input type="text" name="full_name" <?php if(isset($doctor->full_name)): ?> value="<?php echo e($doctor->full_name); ?>" <?php endif; ?>>
                            </div>
                            <div class="panel-body">
                                <p>E-mail</p>
                                <input type="text" name="email" <?php if(isset($doctor->email)): ?> value="<?php echo e($doctor->email); ?>" <?php endif; ?>>
                            </div>
                            <?php if(isset($isAddForm)): ?>
                            <div class="panel-body">
                                <p>Пароль</p>
                                <input type="password" name="password">
                            </div>
                            <?php endif; ?>
                            <div class="panel-body">
                                <p>Номер телефона</p>
                                <input type="text" name="number"  <?php if(isset($doctor->number)): ?> value="<?php echo e($doctor->number); ?>" <?php endif; ?>>
                            </div>
                            <div class="panel-body">
                                <p>Адрес</p>
                                <input type="text" name="address"  <?php if(isset($doctor->address)): ?> value="<?php echo e($doctor->address); ?>" <?php endif; ?>>
                            </div>
                            <div class="panel-body">
                                <p>Специализация</p>
                                <select name="specialization">
                                    <?php if(isset($doctor->specialization)): ?>
                                    <option value="<?php echo e($doctor->specialization); ?>">Выбрано : <?php echo e($doctor->specialization); ?></option>
                                    <?php else: ?>
                                    <option value="">Не выбрано</option>
                                    <?php endif; ?>
                                    <option value="Окулист">Окулист</option>
                                    <option value="Хирург">Хирург</option>
                                    <option value="Невропатолог">Невропатолог</option>
                                    <option value="Невропатолог">Психиатр</option>
                                    <option value="Психиатр">Теропевт</option>
                                    <option value="Педиатр">Педиатр</option>
                                    <option value="Уролог">Уролог</option>
                                </select>
                            </div>
                            <div class="panel-body">
                                <p>Начало рабочего дня</p>
                                <input type="text" name="start_working" <?php if(isset($doctor->start_working)): ?> value="<?php echo e($doctor->start_working); ?>" <?php endif; ?>>
                            </div>
                            <div class="panel-body">
                                <p>Конец рабочего дня</p>
                                <input type="text" name="finish_working" <?php if(isset($doctor->finish_working)): ?> value="<?php echo e($doctor->finish_working); ?>" <?php endif; ?>>
                            </div>
                            <div class="panel-body">
                                <p>О докторе</p>
                                <textarea name="about_doctor" class="textarea"><?php if(isset($doctor->about_doctor)): ?> <?php echo e($doctor->about_doctor); ?> <?php endif; ?></textarea>
                            </div>
                            <div class="panel-body">
                                <p>Фото</p>
                                <input type="file" name="img">
                            </div>
                            <div class="panel-body">
                                <input type="submit" <?php if(isset($isAddForm)): ?> value="Добавить" <?php else: ?> value="Изменить" <?php endif; ?>>
                            </div>
                            <?php echo e(csrf_field()); ?>

                        </form>
                    <div class="panel-body">
                        <p><a <?php if(isset($isAddForm)): ?> href="home" <?php else: ?> href="../home" <?php endif; ?>>Вернкуться в кабинет</a></p>
                    </div>
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