<?php $__env->startSection('content'); ?>
    <h3> Conductor </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Conductor: <?php echo e($conductor->id_conductor); ?> </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::model($conductor,['method'=>'PATCH','route'=>['conductor.update',$conductor->id_conductor]]); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="id_conductor">CI:</label>
                <input type="text" class="form-control" disable readonly value="<?php echo e($conductor->id_conductor); ?>"  name="id_conductor">

            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo e($conductor->nombre); ?>"  name="nombre">

            </div>
           
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" value="<?php echo e($conductor->apellido); ?>" placeholder="Escriba Apellido" name="apellido">

            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" value="<?php echo e($conductor->telefono); ?>" placeholder="Escriba Nombre" name="telefono">

            </div>

            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" value="<?php echo e($conductor->direccion); ?>" placeholder="Escriba Direccion" name="direccion">

            </div>
           

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" disable readonly value="<?php echo e($conductor->correo); ?>" placeholder="Escriba Correo" name="correo">
                
            </div>

            <div class="form-group">
                
                <label for="foto">Foto:</label>
                <input type="file" class="form-control"  name="foto">
                <?php if(($conductor->foto)!=""): ?>
                    <img src="<?php echo e(asset('imagenes/conductores/fotos/'.$conductor->foto)); ?>"  height="100px" width="100px">
                    <p> <?php echo e($conductor->foto); ?><p>
                <?php endif; ?>
                
            </div>

        
            
               <div class="form-group">
                    <label for="correo">PLACA:</label>
                    <<select name="id_bus" class="form-control">
                        <?php $__currentLoopData = $buses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($bus->id_bus==$conductor->id_bus): ?>
                        <option value="<?php echo e($bus->id_bus); ?> "selected> <?php echo e($bus->id_bus); ?></option>
                            <?php else: ?>
                        <option value="<?php echo e($bus->id_bus); ?> "> <?php echo e($bus->id_bus); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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