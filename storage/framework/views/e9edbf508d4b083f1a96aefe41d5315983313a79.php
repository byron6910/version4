<?php $__env->startSection('content'); ?>
    <h3> Editar detalle </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar detalle: <?php echo e($detalle->id_detalle); ?> </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::model($detalle,['method'=>'PATCH','route'=>['detalle.update',$detalle->id_detalle]]); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="id_detalle">ID:</label>
                <input type="number" class="form-control" disable readonly value="<?php echo e($detalle->id_detalle); ?>"  name="id_detalle">

            </div>
            
      

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" value="<?php echo e($detalle->cantidad); ?>" placeholder="Escriba Cantidad" name="cantidad">

            </div>




             <div class="form-group">
                <label for="origen">Origen:</label>
                <select name="id_origen_destino" class="form-control">
                    <?php $__currentLoopData = $origenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($detalle->id_origen_destino==$origen->id_origen_destino): ?>
                    <option value="<?php echo e($origen->id_origen_destino); ?> "selected> <?php echo e($origen->origen.'-'.$origen->destino); ?></option>
                        <?php else: ?>
                    <option value="<?php echo e($origen->id_origen_destino); ?> "> <?php echo e($origen->origen.'-'.$origen->destino); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
             </div>




             <div class="form-group">
                <label for="reserva">Reserva:</label>
                <select name="id_reserva" class="form-control">
                    <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($detalle->id_reserva==$reserva->id_reserva): ?>
                    <option value="<?php echo e($reserva->id_reserva); ?> "selected> <?php echo e($reserva->id); ?></option>
                        <?php else: ?>
                    <option value="<?php echo e($reserva->id_reserva); ?> "> <?php echo e($reserva->id); ?></option>
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