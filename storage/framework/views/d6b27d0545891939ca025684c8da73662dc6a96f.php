<?php $__env->startSection('content'); ?>

<div class="alert alert-danger">
                <ul>
                   
                    <li>No tiene Permisos de administracion</li>
                    <b></b>

                    <a href="/login"><button class="btn btn-danger" > Regresar</button></a>
                   
                </ul>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>