<?php $__env->startSection('content'); ?>
    <h3> reserva </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar reserva: <?php echo e($reserva->id_reserva); ?> </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::model($reserva,['method'=>'PATCH','route'=>['reserva.update',$reserva->id_reserva]]); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="id_reserva">ID reserva:</label>
                <input type="number" class="form-control" disable readonly value="<?php echo e($reserva->id_reserva); ?>"  name="id_reserva">

            </div>
            
          
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label for="fecha_reserva">Fecha Reserva:</label>
                <input type="date" class="form-control" value="<?php echo e($reserva->fecha_reserva); ?>" name="fecha_reserva"  required>

             </div>
            </div>

          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label for="hora_reserva">Hora Reserva:</label>
                <input type="time" class="form-control" value="<?php echo e($reserva->hora_reserva); ?>" name="hora_reserva"  required>

             </div>
            </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control">
                        
                        <option value="0"> No Disponible</option>
                        <option value="1 "> Disponible</option>


                    </select>
                </div>
        </div> 



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="id">Nombre:</label>
                    <select name="id" class="form-control">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($user->id==$reserva->id): ?>
                        <option value="<?php echo e($user->id); ?> " selected> <?php echo e($user->nombre.' '. $user->id); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($user->id); ?> " > <?php echo e($user->name.' '. $user->id); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
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