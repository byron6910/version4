<?php $__env->startSection('content'); ?>
    <div class="container">
      <h1>Crear Cuenta de Usuario</h1>
      <p> Ingresa los datos </p>

      <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php echo Form::open(['url' => route('user-create'),'file'=>'true']); ?>

          <div class="form-group">
              <?php echo Form::label('name','Nombre'); ?>

              <?php echo Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Escriba su nombre']); ?>

          </div>
          <div class="form-group">
              <?php echo Form::label('email'); ?>

              <?php echo Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Ingrese Correo']); ?>

          </div>
          <div class="form-group">
              <?php echo Form::label('password'); ?>

              <?php echo Form::password('password', ['class' => 'form-control']); ?>

          </div>
          <div class="form-group">
              <?php echo Form::label('country_code', 'Codigo Pais'); ?>

              <?php echo Form::text('country_code', '', ['class' => 'form-control', 'id' => 'authy-countries']); ?>

          </div>

          <div class="form-group">
          <?php echo Form::label('phone_number', 'Phone number'); ?>

          <?php echo Form::text('phone_number', '', ['class' => 'form-control', 'id' => 'authy-cellphone']); ?>

      </div>



          <div class="form-group">
              <button type="submit" class="btn btn-primary">Crear Usuario</button>
          </div>
      <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>