<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Clientes <a href="cliente/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('cliente.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>CI </th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Ciudad</th>
                        <th>Calle</th>
                        <th>Postal</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Password</th>
                        <th>Foto</th>
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($cliente->ci); ?></td>
                        <td> <?php echo e($cliente->nombre); ?></td>
                        <td> <?php echo e($cliente->apellido); ?></td>
                        <td> <?php echo e($cliente->telefono); ?></td>
                        <td> <?php echo e($cliente->ciudad); ?></td>
                        <td> <?php echo e($cliente->calle); ?></td>
                        <td> <?php echo e($cliente->postal); ?></td>
                        <td> <?php echo e($cliente->correo); ?></td>
                        <td> <?php echo e($cliente->usuario); ?></td>
                        <td> <?php echo e($cliente->password); ?></td>
                        <td> 
                        <img src="<?php echo e(asset('imagenes/clientes/fotos/'.$cliente->foto)); ?>" alt="<?php echo e($cliente->foto); ?>" 
                        height="100px" width="100px" class="img-thumbnail">
                        </td>
                        
                        
                        <td>
                        <a href="<?php echo e(URL::action('Cliente_Controller@edit',$cliente->ci)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($cliente->ci); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('cliente.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($clientes->render()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>