

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
 id="modal-delete-{{$ingreso->id_ingreso}}">

    {{Form::Open(['action'=>['IngresoController@destroy',$ingreso->id_ingreso],'method'=>'delete'])}}

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> X</span>
                    <h4 class="modal-title">Eliminar Ingreso</h4>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Confirme si desdea eliminar el Ingreso</p>
             </div>
                <div class="modal-footer">
                    <button type="button" class="btn-btn-default" data-dismiss="modal">Cerrar </button>
                    <button type="submit" class="btn-btn-primary" >Aceptar </button>
                    
                </div>
            </div>
           
        </div>
        {{Form::Close()}}
</div>