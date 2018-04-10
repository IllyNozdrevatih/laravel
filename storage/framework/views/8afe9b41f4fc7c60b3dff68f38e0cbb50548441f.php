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
                        <img src="<?php echo e(URL::to('../')); ?>/<?php echo e($user['path_to_image']); ?>" style="width:150px; height:150px;">
                    </div>
                    <?php if(empty($doctors)): ?>
                        <div class="panel-body">
                            <p>Поданых заявлений нет</p>
                        </div>
                    <?php else: ?>
                    <div class="panel-body">
                        <table border="1" style="text-align: center">
                            <tr>
                                <td>Имя доктора</td>
                                <td>Часы работы:начало</td>
                                <td>Часы работы:конец</td>
                                <td>Специализация доктора</td>
                                <td>Дата подачи</td>
                                <td>Статус</td>
                                <td>Отправить смс</td>
                            </tr>
                            <?php for( $i = 0 ;$i < count($doctors);$i++): ?>
                            <tr>
                                <td><a href="Profile/<?php echo e($doctors[$i][0]->id); ?>"><?php echo e($doctors[$i][0]->full_name); ?></a></td>
                                <td><?php echo e($doctors[$i][0]->start_working); ?></td>
                                <td><?php echo e($doctors[$i][0]->finish_working); ?></td>
                                <td><?php echo e($doctors[$i][0]->specialization); ?></td>
                                <td> <?php echo e($declorations[$i]->created_at); ?></td>
                                <td> <?php echo e($declorations[$i]->status); ?></td>
                                <?php if($declorations[$i]['send_sms'] == '1'): ?>
                                    <td>сообщение уже отправлялось</td>
                                <?php else: ?>
                                       <td><a href="<?php echo e(url('/phone')); ?>/<?php echo e($declorations[$i]->id_doctor); ?>">отправить</a></td>
                                <?php endif; ?>
                            </tr>
                            <?php endfor; ?>
                        </table>
                    </div>
                    <?php endif; ?>
                    <div class="panel-body">
                        <a href="statement_form/null">Написать заявление</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>