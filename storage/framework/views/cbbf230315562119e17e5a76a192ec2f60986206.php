<?php $__env->startSection('content'); ?>
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo detalle </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::open(['url'=>'detalle','method'=>'POST','autocomplete'=>'off']); ?>}
            <?php echo e(Form::token()); ?>


            
          
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" placeholder="Escriba Cantidad" name="cantidad">

            </div>

         
            <div class="form-group">
                <label for="id_origen_destino">Origen-Destino:</label>
                <select name="id_origen_destino" class="form-control selectpicker" data-live-search="true">
                     <?php $__currentLoopData = $origenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($origen->id_origen_destino); ?> "> <?php echo e($origen->origen.' - '.$origen->destino); ?></option>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                     
                </select>
             
              </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                     <label for="id_reserva">Reserva:</label>
                        <select name="id_reserva" class="form-control selectpicker" data-live-search="true">
                     <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($reserva->id_reserva); ?> "> <?php echo e($reserva->id_reserva); ?></option>

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