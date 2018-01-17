<?php $__env->startSection('content'); ?>
    <h3> Editar Origen Destino </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Origen Destino: <?php echo e($origen->id_origen_destino); ?> </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::model($origen,['method'=>'PATCH','route'=>['origen_destino.update',$origen->id_origen_destino],'files'=>'true']); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="id">ID:</label>
                <input type="number" class="form-control" disable readonly value="<?php echo e($origen->id_origen_destino); ?>"  name="id_origen_destino">

            </div>
            
            <div class="form-group">
                <label for="origen">Origen:</label>
                <input type="text" class="form-control" value="<?php echo e($origen->origen); ?>"  name="origen">

            </div>
           
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" class="form-control" value="<?php echo e($origen->destino); ?>"  name="destino">

            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="text" class="form-control" value="<?php echo e($origen->fecha); ?>"  name="fecha">

            </div>

            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="text" class="form-control" value="<?php echo e($origen->hora); ?>"  name="hora">

            </div>

          

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" value="<?php echo e($origen->stock); ?>"  name="stock">

            </div>


             <div class="form-group">
                <label for="condicion">Condicion:</label>
                
                <select name="condicion" class="form-control">
                   
                            <option value="1"> Disponible </option>
                            <option value="0"> No Disponible</option>
                </select>
               
            </div>

             <div class="form-group">
                <label for="id_cooperativa">Cooperativa:</label>
                <select name="id_cooperativa" class="form-control selectpicker" data-live-search="true">
                    <?php $__currentLoopData = $cooperativas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperativa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($cooperativa->id_cooperativa==$origen->id_cooperativa): ?>
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