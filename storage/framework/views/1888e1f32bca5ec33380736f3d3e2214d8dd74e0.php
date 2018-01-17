<?php $__env->startSection('content'); ?>
    <h1><?php echo e($user->name); ?></h1>
    
    <p>Estado de Cuenta:
        <?php if($user->verified): ?>
            Verified
        <h1>Complete sus datos  </h1>

        <?php echo Form::open(['url' => route('user-postverify'),'file'=>'true']); ?>


          <div class="form-group">
              <?php echo Form::label('ciudad'); ?>

              <?php echo Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => 'Ingrese Ciudad']); ?>

          </div>

          <div class="form-group">
              <?php echo Form::label('calle'); ?>

              <?php echo Form::text('calle', '', ['class' => 'form-control', 'placeholder' => 'Ingrese Calle']); ?>

          </div>

          <div class="form-group">
              <?php echo Form::label('postal'); ?>

              <?php echo Form::number('postal', '', ['class' => 'form-control', 'placeholder' => 'Ingrese postal']); ?>

          </div>
          <div class="form-group">
            
              <?php echo Form::select('tipo', ['cliente' => 'Cliente', 'administrador' => 'Administrador', 'supervisor' => 'Supervisor'],'cliente'); ?>

          </div> 

          <div class="form-group">
              <?php echo Form::label('foto'); ?>

              <?php echo Form::file('foto'); ?>

          </div> 

          <div class="form-group">
              <button type="submit" class="btn btn-primary">Crear Usuario</button>
          </div>

          <?php echo Form::close(); ?>


        <?php else: ?>
            Not Verified
        <?php endif; ?>
    </p>
    <?php if( !$user->verified ): ?>
        <p>
          <a href="<?php echo e(route('user-verify')); ?>">Verifica tu cuenta ahora</a>
        </p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>