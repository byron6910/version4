<?php $__env->startSection('content'); ?>
    <h1>Confirmacion de cuenta...</h1>
    <p>
      Tu Cuenta a sido creada revisa tu celular para activalar y envia el numero adjunto
    </p>
    <?php echo Form::open(['url' => route('user-verify')]); ?>

        <div class="form-group">
            <?php echo Form::label('token'); ?>

            <?php echo Form::text('token', '', ['class' => 'form-control']); ?>

        </div>
        <button type="submit" class="btn btn-primary">Verify Token</button>
    <?php echo Form::close(); ?>


    <hr>
    <?php echo Form::open(['url' => route('user-verify-resend')]); ?>

        <button type="submit" class="btn">Resend code</button>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>