<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Conductores <a href="conductor/create"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('conductor.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Bus PLACA</th>  
                        <th>Foto</th>                      
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $conductores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conductor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($conductor->id_conductor); ?></td>
                        <td> <?php echo e($conductor->nombre); ?></td>
                        <td> <?php echo e($conductor->apellido); ?></td>
                        <td> <?php echo e($conductor->telefono); ?></td>
                        <td> <?php echo e($conductor->direccion); ?></td>
                        <td> <?php echo e($conductor->correo); ?></td>
                                             
                        <td> <?php echo e($conductor->placa); ?></td>

                        <td> 
                        <img src="<?php echo e(asset('imagenes/conductores/fotos/'.$conductor->foto)); ?>" alt="<?php echo e($conductor->foto); ?>" 
                        height="100px" width="100px" class="img-thumbnail">
                        </td>
                        
                        <td>
                        <a href="<?php echo e(URL::action('ConductorController@edit',$conductor->id_conductor)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($conductor->id_conductor); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('conductor.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo e($conductores->render()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>