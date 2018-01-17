<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Cooperativa <a href="cooperativa/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('cooperativa.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Id Viaje</th>

                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $cooperativas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperativa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($cooperativa->id_cooperativa); ?></td>
                        <td> <?php echo e($cooperativa->nombre); ?></td>
                        <td> <?php echo e($cooperativa->direccion); ?></td>
                        <td> <?php echo e($cooperativa->telefono); ?></td>
                        <td> <?php echo e($cooperativa->correo); ?></td>
                        <td> <?php echo e($cooperativa->activo); ?></td> 
                        <td> <?php echo e($cooperativa->id_viaje); ?></td> 
                         
                        
                        <td>
                        <a href="<?php echo e(URL::action('Cooperativa_Controller@edit',$cooperativa->id_cooperativa)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($cooperativa->id_cooperativa); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('cooperativa.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($cooperativas->links()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>