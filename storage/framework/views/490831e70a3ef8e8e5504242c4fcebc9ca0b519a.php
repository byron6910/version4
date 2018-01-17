<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Detalles Reservas <a href="detalle/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('detalle.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Cantidad</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Precio</th>
                       
                        <th>Fecha de Reserva</th>
                        <th>Hora de reserva</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Numero</th>

                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($detalle->id_detalle); ?></td>
                        <td> <?php echo e($detalle->cantidad); ?></td>
                        <td> <?php echo e($detalle->Origen_Destino->origen); ?></td>
                        <td> <?php echo e($detalle->Origen_Destino->destino); ?></td>
                        <td> <?php echo e($detalle->Origen_Destino->precio); ?></td>
                        
                        <td> <?php echo e($detalle->Reserva->fecha_reserva); ?></td>
                        <td> <?php echo e($detalle->Reserva->hora_reserva); ?></td>
                        <td> <?php echo e($detalle->Reserva->estado); ?></td>
                        
                        <td> <?php echo e($detalle->Reserva->id); ?></td>
                        <td> <?php echo e($detalle->Reserva); ?></td>

 
                        
                        <td>
                        <a href="<?php echo e(URL::action('DetalleController@edit',$detalle->id_detalle)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($detalle->id_detalle); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('detalle.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($detalles->links()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>