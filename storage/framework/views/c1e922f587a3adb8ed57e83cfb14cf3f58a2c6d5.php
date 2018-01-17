<?php $__env->startSection('content'); ?>
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Ingreso </h3>
            <?php echo $__env->make('Mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         </div>
    </div>

            {<?php echo Form::open(['url'=>'ingreso','method'=>'POST','autocomplete'=>'off']); ?>}
            <?php echo e(Form::token()); ?>

    <div class="row">
      
  


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
                <label for="Impuesto">Impuesto:</label>
                <input type="number" class="form-control" placeholder="Escriba Impuesto" name="impuesto" required value="<?php echo e(old('impuesto')); ?>")}}>

            </div>
            
        </div>


      

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="id">Nombre:</label>
                    <select name="id" class="form-control selectpicker" id="id" data-live-search="true">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?> "> <?php echo e($user->id.'- '. $user->name); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
        </div>

    </div>

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-body">
                     <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                            <div class="form-group">
                               <label for="id">Origen Destino:</label>
                                 <select name="pid_origen_destino" class="form-control selectpicker" id="pid_origen_destino" data-live-search="true">
                                  <?php $__currentLoopData = $detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($detalle->id_origen_destino); ?> "> <?php echo e($detalle->Origen_Destino->origen.'- '. $detalle->Origen_Destino->destino); ?></option>

                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>

                            </div>
                     </div>
                     <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                         <div class="form-group">
                         <label for="cantidad">Cantidad:</label>
                          <input type="number" class="form-control" placeholder="Escriba Cantidad" name="pcantidad" id="pcantidad">

                         </div>
                    </div>

                       <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                         <div class="form-group">
                         <label for="precio_compra">Precio_Compra:</label>
                          <input type="number" class="form-control" placeholder="Escriba Precio_Compra" name="pprecio_compra" id="pprecio_compra">

                         </div>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                         <div class="form-group">
                         <label for="precio_venta">Precio Venta:</label>
                          <input type="number" class="form-control" placeholder="Ingrese Precio Venta" name="pprecio_venta" id="pprecio_venta">

                         </div>
                    </div>

                      <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                         <div class="form-group">

                          <button class="btn btn-primary" type="button" id="bt_add">Agregar</button>

                         </div>
                    </div>

                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                         <table id="detalles" class="table table-bordered table-striped table-condensed table-hover ">

                            <thead style="background-color: #A9D0F5">
                                <th>Opciones</th>
                                <th>Origen-Destino</th>
                                <th>Cantidad</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>

                            </thead>

                            <tfoot>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><h4 id="total">$0.00 </h4></th>

                            </tfoot>
                            <tbody>
                                
                            </tbody>
                         </table>

                    </div>

                </div>
            </div>

        </div>
        

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
             <div class="form-group">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

        </div>
            
            <?php echo Form::close(); ?>


<?php $__env->startPush('scripts'); ?>

    <script >

        $(document).ready(function(){
            $('#bt_add').click(function(){
                agregar();
            });
        });

        var cont=0;
        total=0;
        subtotal=[];

        $("#guardar").hide();

        function agregar(){
            id_origen_destino=$("#pid_origen_destino").val();
            origen_destino=$("#pid_origen_destino option:selected").text();
            cantidad=$('#pcantidad').val();
            precio_venta=$('#pprecio_venta').val();
            precio_compra=$('#pprecio_compra').val();

            if(id_origen_destino!="" && cantidad!="" &&cantidad>0 &&precio_compra!=""&&precio_venta!="" ){
                subtotal[cont]=(cantidad*precio_venta);
                total=total+subtotal[cont];

                var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button</td><td><input type="hidden" name="id_origen_destino[]" value="'+id_origen_destino+'">'+origen_destino+'</td> <td><input type="number" name="cantidad[]" value="'+cantidad+'"></td> <td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td> </tr>';
                cont++;
                limpiar();
                $("#total").html("$"+total);
                evaluar();
                $('#detalles').append(fila);

            }else 
            {
                alert("Error revise los datos");
            }
        }

        function limpiar(){
            //$("#pid_origen_destino").val("");
            $("#pcantidad").val("");
            $("#pprecio_venta").val("");
            $("#pprecio_compra").val("");


        }

        function evaluar(){
            if(total>0){
                $("#guardar").show();
            }
            else{
                $("#guardar").hide();
            }
        }

        function eliminar(index){
            total=total-subtotal[index];
            $("#total").html("$"+total);
            $("#fila"+index).remove();
            evaluar();
        }

    </script>
<?php $__env->stopPush(); ?>
       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>