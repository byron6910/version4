<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Reserva <a href="reserva/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('reserva.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Fecha de Reserva </th>
                        <th>Hora  de Reserva</th>
                        <th>Estado</th>
                        
                        <th>Creado por Usuario </th>    
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($reserva->id_reserva); ?></td>
                        <td> <?php echo e($reserva->fecha_reserva); ?></td>
                        <td> <?php echo e($reserva->hora_reserva); ?></td>
                        <td> <?php echo e($reserva->estado); ?></td>
                    
                        <td> <?php echo e($reserva->user->name); ?></td>
                        
                        <td>
                        <a href="<?php echo e(URL::action('ReservaController@edit',$reserva->id_reserva)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($reserva->id_reserva); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('reserva.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($reservas->render()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>