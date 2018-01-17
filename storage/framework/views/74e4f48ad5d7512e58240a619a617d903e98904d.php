<?php $__env->startSection('content'); ?>
    <h3> Editar Cooperativa </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Cooperativa: <?php echo e($cooperativa->id_cooperativa); ?> </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
                <label for="activo">Activo:</label>
                <select name="activo" class="form-control">
                   
                            <option value="0"> NO ACTIVO </option>
                            <option value="1"> Activo</option>
                    </select>

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