<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Horarios <a href="horario/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('horario.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Precio</th>
                        <th>Cantidad</th>                        
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($horario->id_horario); ?></td>
                        <td> <?php echo e($horario->fecha_horario); ?></td>
                        <td> <?php echo e($horario->hora); ?></td>
                        <td> <?php echo e($horario->origen); ?></td>
                        <td> <?php echo e($horario->destino); ?></td>
                        <td> <?php echo e($horario->precio); ?></td>
                        <td> <?php echo e($horario->cantidad); ?></td>
                        
                        <td>
                        <a href="<?php echo e(URL::action('HorariosController@edit',$horario->id_horario)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($horario->id_horario); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('horario.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($horarios->render()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>