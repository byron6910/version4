<?php $__env->startSection('content'); ?>
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Origen Destino </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::open(['url'=>'origen_destino','method'=>'POST','autocomplete'=>'off']); ?>}
            <?php echo e(Form::token()); ?>


            
            <div class="form-group">
                <label for="origen">Origen:</label>
                <input type="text" class="form-control" placeholder="Escriba Origen" value="<?php echo e(old('origen')); ?>" name="origen">

            </div>

            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" class="form-control" placeholder="Escriba Destino" value="<?php echo e(old('destino')); ?>" name="destino">

            </div>


            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" placeholder="Escriba Precio" value="<?php echo e(old('precio')); ?>" name="precio">

            </div>

            <div class="form-group">
                <label for="cantidad">Stock:</label>
                <input type="number" class="form-control" placeholder="Escriba Stock" value="<?php echo e(old('$stock')); ?>"  name="stock">

            </div>


             <div class="form-group">
                <label for="condicion">Condicion:</label>
                
                <select name="condicion" class="form-control">
                   
                            <option value="1"> Disponible </option>
                            <option value="0"> No Disponible</option>
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