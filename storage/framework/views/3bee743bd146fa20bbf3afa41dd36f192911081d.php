<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Viajes <a href="viaje/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('viaje.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID Viaje </th>
                        <th>Estado</th>
                        <th>Fecha-Hora</th>
                        <th>Origen - Destino</th>
                                  
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $viajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($viaje->id_viaje); ?></td>
                        <td> <?php echo e($viaje->estado); ?></td>
                        <td> <?php echo e($viaje->horario->fecha_horario.'   '.$viaje->horario->hora); ?></td>
                        <td> <?php echo e($viaje->origen_destino->origen.' -'.$viaje->origen_destino->destino); ?></td>
                        
        
                        
                        <td>
                        <a href="<?php echo e(URL::action('ViajeController@edit',$viaje->id_viaje)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($viaje->id_viaje); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('viaje.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($viajes->render()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>