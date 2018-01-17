<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Buses <a href="bus/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('bus.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Matricula </th>
                        <th>Marca</th>
                        <th>Capacidad</th>
                        <th>Condicion</th>
                        <th>Cooperativa</th>
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $buses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($bus->id_bus); ?></td>
                        <td> <?php echo e($bus->marca); ?></td>
                        <td> <?php echo e($bus->capacidad); ?></td>
                        <td> <?php echo e($bus->condicion); ?></td>
                        <td> <?php echo e($bus->cooperativa->nombre); ?></td>
                        
                        <td>
                        <a href="<?php echo e(URL::action('BusController@edit',$bus->id_bus)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($bus->id_bus); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('bus.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($buses->render()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>