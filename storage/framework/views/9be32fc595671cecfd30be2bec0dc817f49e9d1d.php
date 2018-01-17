<?php $__env->startSection('content'); ?>
    <h3> User </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Usuario: <?php echo e($user->id); ?> </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::model($user,['method'=>'PATCH','route'=>['user.update',$user->id]]); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="id">ID :</label>
                <input type="number" class="form-control" disable readonly value="<?php echo e($user->id); ?>"  name="id">

            </div>
            
          
        
             <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo e($user->name); ?>" name="name"  required>
            </div>
      
      
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" value="<?php echo e($user->email); ?>" disable readonly  name="email"  required>

            </div>
     


            <div class="form-group">
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" value="<?php echo e($user->country_code); ?>" name="country_code"  required>

            </div>


            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" value="<?php echo e($user->phone_number); ?>" name="phone_number"  required>

            </div>
     

    
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" value="<?php echo e($user->password); ?>" name="password"  required>

            </div>
      
        


            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

               <?php echo e($user->detalles); ?>


            <?php echo Form::close(); ?>


            
          
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>