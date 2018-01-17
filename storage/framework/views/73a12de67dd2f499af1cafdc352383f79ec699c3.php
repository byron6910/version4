<?php $__env->startSection('content'); ?>
    <h3> Horario </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Horario: <?php echo e($horario->id_horario); ?> </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::model($horario,['method'=>'PATCH','route'=>['horario.update',$horario->id_horario]]); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="id_horario">ID Horario:</label>
                <input type="number" class="form-control" disable readonly value="<?php echo e($horario->id_horario); ?>"  name="id_horario">

            </div>
            
            <div class="form-group">
                <label for="fecha_horario">Fecha:</label>
                <input type="date" class="form-control" value="<?php echo e($horario->fecha_horario); ?>"  name="fecha_horario">

            </div>
           
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" value="<?php echo e($horario->hora); ?>" name="hora">

            </div>
            
               <div class="form-group">
                    <label for="id_origen_destino">OrigenDestino:</label>
                    <select name="id_origen_destino" class="form-control">
                        <?php $__currentLoopData = $origenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($origen->id_origen_destino==$horario->id_origen_destino): ?>
                        <option value="<?php echo e($origen->id_origen_destino); ?> "selected> <?php echo e($origen->origen.'-'. $origen->destino); ?></option>
                            <?php else: ?>
                        <option value="<?php echo e($origen->id_origen_destino); ?> "> <?php echo e($origen->origen.'-'. $origen->destino); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
       
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            <div class="form-group">
                <h3><?php echo e($horario->reserva); ?></h3>
                
            </div>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>