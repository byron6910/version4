<?php $__env->startSection('content'); ?>

            <div class="panel panel-primary">
                <div class="panel-heading">Perfil <?php echo e($user->name); ?></div>
                </div>
                    <div class="col-md-6 ">
                         <img src="/imagenes/<?php echo e($user->foto); ?>" style="width:100px; height:100px; float:left; border-radius:50%; margin-right:25px;">
                    </div>
                   
                        <h2><?php echo e($user->name); ?></h2> 
                          <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label> Actualizar Foto de Perfil</label>
                        <input type="file" name="foto">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">

                 </form>
                    
                
            </div>
       
       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>