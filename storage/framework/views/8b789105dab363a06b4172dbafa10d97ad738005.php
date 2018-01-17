<?php $__env->startSection('content'); ?>
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Horario </h3>
            <?php if(count($errors)>0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
    
            <?php endif; ?>
         </div>
    </div>

            {<?php echo Form::open(['url'=>'reserva','method'=>'POST','autocomplete'=>'off']); ?>}
            <?php echo e(Form::token()); ?>

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="id_reserva">ID Reserva:</label>
                <input type="number" class="form-control" placeholder="Escriba ID" name="id_reserva" required value="<?php echo e(old('id_reserva')); ?>">

            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="fecha_reserva">Fecha Reserva:</label>
                <input type="date" class="form-control" placeholder="Escriba Fecha" name="fecha_reserva"  required value="<?php echo e(old('fecha_reserva')); ?>">

            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" placeholder="Escriba Hora" name="hora" required value="<?php echo e(old('hora')); ?>")}}>

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
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" placeholder="Escriba Cantidad" name="cantidad" required value="<?php echo e(old('cantidad')); ?>")}}>

            </div>
            
        </div>
       

       
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="asiento">Asiento:</label>
                <input type="number" class="form-control" placeholder="Escriba Asietno" name="asiento" required value="<?php echo e(old('asiento')); ?>")}}>

            </div>
            
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="ci">Nombre:</label>
                    <select name="ci" class="form-control">
                        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cliente->ci); ?> "> <?php echo e($cliente->nombre.' '. $cliente->apellido); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="id_viaje">Viaje:</label>
                    <select name="id_viaje" class="form-control">
                        <?php $__currentLoopData = $viajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($viaje->id_viaje); ?> "> <?php echo e($viaje->id_viaje.'- '. $viaje->estado); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
        </div>

      
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="form-control" name="name" disable readonly value="<?php echo e($user->name); ?>")}}>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
            
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

        </div>

    </div>
            
            

            <?php echo Form::close(); ?>

       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>