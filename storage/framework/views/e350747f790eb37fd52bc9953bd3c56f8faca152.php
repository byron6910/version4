<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Horario ID: <?php echo e($horario->id_horario); ?> </h3>
           
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-8 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                           Detalle del Horario
                        </tr>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">ID:</th>
                            <td><?php echo e($horario->id_horario); ?></td>

                         </tr>   

                          <tr>
                            <th scope="row">Fecha:</th>
                            <td><?php echo e($horario->fecha_horario); ?></td>

                         </tr>

                          <tr>
                            <th scope="row">Hora:</th>
                            <td><?php echo e($horario->hora); ?></td>

                         </tr>

                 



                           <tr>  
                            <th scope="row">Opciones:</th>
                             <td>

                      
                            <a href="<?php echo e(URL::action('HorariosController@edit',$horario->id_horario)); ?>"><button class="btn btn-info">Editar </button></a>
                            <a href="" data-target="#modal-delete-<?php echo e($horario->id_horario); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                            </td>
                         </tr>

                    </tbody>
                    
                        
                       
                      
                    
                    
                    <?php echo $__env->make('horario.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    
                </table>

            <br>

            <table class="table table-bordered">
               <tr scope="row">Cooperativas:</tr>
                
                <tbody>
                  <tr>
                    <?php $__currentLoopData = $horario->cooperativas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul>
                      <li><?php echo e($coop->nombre); ?></li>

                    </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </tr>
                
                </tbody>
              </table>

                     
                          

                      
            </div>
            
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>