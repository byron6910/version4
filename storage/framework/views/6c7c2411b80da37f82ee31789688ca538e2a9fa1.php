<?php $__env->startSection('content'); ?>
    <h3> Editar </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Bus: <?php echo e($bus->id_bus); ?> </h3>
        
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::model($bus,['method'=>'PATCH','route'=>['bus.update',$bus->id_bus]]); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="id_bus">PLACA:</label>
                <input type="text" class="form-control" disable readonly value="<?php echo e($bus->id_bus); ?>" placeholder="Escriba Placa" name="id_bus">

            </div>
            
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" value="<?php echo e($bus->marca); ?>" placeholder="Escriba Marca" name="marca">

            </div>
           

            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" class="form-control" value="<?php echo e($bus->capacidad); ?>" placeholder="Escriba Capacidad" name="capacidad">
                
            </div>

            <div class="form-group">
                <label for="condicion">Condicion:</label>
                
                <select name="condicion" class="form-control">
                   
                            <option value="1"> En circulacion </option>
                            <option value="0"> En mantenimiento</option>
                </select>
               
            </div>

            <div class="form-group">
                <label for="id_cooperativa">Cooperativa:</label>
                <select name="id_cooperativa" class="form-control">
                    <?php $__currentLoopData = $cooperativas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperativa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($cooperativa->id_cooperativa==$bus->id_origen_destino): ?>
                    <option value="<?php echo e($cooperativa->id_cooperativa); ?> "selected> <?php echo e($cooperativa->nombre); ?></option>
                        <?php else: ?>
                    <option value="<?php echo e($cooperativa->id_cooperativa); ?> "> <?php echo e($cooperativa->nombre); ?></option>
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