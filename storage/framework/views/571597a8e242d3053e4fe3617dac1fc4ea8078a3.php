<?php $__env->startSection('content'); ?>
    <h3> Editar Clientes </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Cliente: <?php echo e($cliente->ci); ?> </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            {<?php echo Form::model($cliente,['method'=>'PATCH','route'=>['cliente.update',$cliente->ci],'files'=>'true']); ?>}
            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="ci">CI:</label>
                <input type="text" class="form-control" disable readonly value="<?php echo e($cliente->ci); ?>"  name="ci">

            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo e($cliente->nombre); ?>" placeholder="Escriba Nombre" name="nombre">

            </div>
           
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" value="<?php echo e($cliente->apellido); ?>" placeholder="Escriba Apellido" name="apellido">

            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" value="<?php echo e($cliente->telefono); ?>" placeholder="Escriba Nombre" name="telefono">

            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" class="form-control" value="<?php echo e($cliente->ciudad); ?>" placeholder="Escriba Ciudad" name="ciudad">

            </div>
           

            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" value="<?php echo e($cliente->calle); ?>"  placeholder="Escriba Calle" name="calle">
                
            </div>

            <div class="form-group">
                <label for="postal">Postal:</label>
                <input type="number" class="form-control" value="<?php echo e($cliente->postal); ?>" placeholder="Escriba Postal" name="postal">

            </div>


            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" disable readonly value="<?php echo e($cliente->correo); ?>" placeholder="Escriba Correo" name="correo">
                
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" value="<?php echo e($cliente->usuario); ?>" placeholder="Escriba Usuario" name="usuario">
                
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" value="<?php echo e($cliente->password); ?>" placeholder="Escriba Password" name="password">
                
            </div>
            
            <div class="form-group">
                
                <label for="foto">Foto:</label>
                <input type="file" class="form-control"  name="foto">
                <?php if(($cliente->foto)!=""): ?>
                    <img src="<?php echo e(asset('imagenes/clientes/fotos/'.$cliente->foto)); ?>"  height="200px" width="200px">
                    <p> <?php echo e($cliente->foto); ?><p>
                <?php endif; ?>
                
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