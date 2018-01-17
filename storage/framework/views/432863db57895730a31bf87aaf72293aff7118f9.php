<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de ingreso <a href="ingreso/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('ingreso.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Fecha de ingreso </th>
                        <th>Hora  de ingreso</th>
                        <th>Estado</th>
                        <th>Impuesto</th>
                       
                        
                        <th>Creado por Usuario </th>    
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $ingresos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingreso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($ingreso->id_ingreso); ?></td>
                        <td> <?php echo e($ingreso->fecha_ingreso); ?></td>
                        <td> <?php echo e($ingreso->hora_ingreso); ?></td>
                        <td> <?php echo e($ingreso->estado); ?></td>
                        <td> <?php echo e($ingreso->impuesto); ?></td>
             
                        
                        
                   
                    
                        <td> <?php echo e($ingreso->user->name); ?></td>
                        
                        <td>
                        <a href="<?php echo e(URL::action('IngresoController@edit',$ingreso->id_ingreso)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($ingreso->id_ingreso); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('ingreso.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($ingresos->render()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>