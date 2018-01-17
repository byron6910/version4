<?php $__env->startSection('content'); ?>
    <h3> Editar Cooperativa </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Cooperativa: <?php echo e($cooperativa->id_cooperativa); ?> </h3>
            <?php if(count($errors)>0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            {<?php echo Form::model($cooperativa,['method'=>'PATCH','route'=>['cooperativa.update',$cooperativa->id_cooperativa]]); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="id_cooperativa">ID:</label>
                <input type="number" class="form-control" disable readonly value="<?php echo e($cooperativa->id_cooperativa); ?>"  name="id_cooperativa">

            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo e($cooperativa->nombre); ?>"  name="nombre">

            </div>
           
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" value="<?php echo e($cooperativa->direccion); ?>"  name="direccion">

            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" value="<?php echo e($cooperativa->telefono); ?>" placeholder="Escriba Nombre" name="telefono">

            </div>



            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" disable readonly value="<?php echo e($cooperativa->correo); ?>" placeholder="Escriba Correo" name="correo">
                
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="boolean" class="form-control" value="<?php echo e($cooperativa->estado); ?>"  name="estado">
                
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>