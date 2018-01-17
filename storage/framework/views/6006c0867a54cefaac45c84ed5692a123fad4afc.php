<?php $__env->startSection('content'); ?>
    <h1><?php echo e($user->name); ?></h1>
    
    <p>Estado de Cuenta:
        <?php if($user->verified): ?>
            Verified
      

       

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