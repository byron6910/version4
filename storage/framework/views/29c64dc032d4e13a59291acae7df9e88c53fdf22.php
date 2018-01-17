<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Lista de Administradores <a href="/user/new"><button>Nuevo </button></a></h3>
            <?php echo $__env->make('user.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Nombre </th>
                        <th>Correo</th>
                        <th>Codigo</th>
                        <th>Telefono</th> 
                        <th>Ciudad</th>  
                        <th>Calle</th>  
                        <th>Postal</th> 
                        <th>Foto</th>  
                        <th>Password</th>       
                        <th>Verificado</th> 

                        <th>Activo hasta</th> 
                                          
                        <th>Opciones</th>
                    </thead>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->tipo=='administrador'): ?>
                    <tr>
                        <td> <?php echo e($user->id); ?></td>
                        <td> <?php echo e($user->name); ?></td>
                        <td> <?php echo e($user->email); ?></td>
                        <td> <?php echo e($user->country_code); ?></td>
                        <td> <?php echo e($user->phone_number); ?></td>
                        <td> <?php echo e($user->calle); ?></td>
                        <td> <?php echo e($user->postal); ?></td>
                        <td> <?php echo e($user->foto); ?></td>
                        <td> <?php echo e($user->password); ?></td>
                        <td> <?php echo e($user->verified); ?></td>
                        <td> <?php echo e($user->deleted_at); ?></td>
                        
                        <td>
                        <a href="<?php echo e(URL::action('UserController@edit',$user->id)); ?>"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-<?php echo e($user->id); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    <?php echo $__env->make('user.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    @ifelse
                    <h2>No hay datos</h2>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>


            </div>
            <?php echo e($users->render()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>