<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Origen Destino <a href="origen_destino/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('origen_destino.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                         <th>Condicion</th>
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $origenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($origen->id_origen_destino); ?></td>
                        <td> <?php echo e($origen->origen); ?></td>
                        <td> <?php echo e($origen->destino); ?></td>
                        <td> <?php echo e($origen->precio); ?></td>
                        <td> <?php echo e($origen->stock); ?></td>
                        <td> <?php echo e($origen->condicion); ?></td>
                        
                        <td>
                        <a href="<?php echo e(URL::action('OrigenDestino_Controller@edit',$origen->id_origen_destino)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($origen->id_origen_destino); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('origen_destino.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($origenes->links()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>