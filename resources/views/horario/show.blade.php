@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Horario ID: {{$horario->id_horario}} </h3>
           
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
                            <td>{{$horario->id_horario}}</td>

                         </tr>   

                          <tr>
                            <th scope="row">Fecha:</th>
                            <td>{{$horario->fecha_horario}}</td>

                         </tr>

                          <tr>
                            <th scope="row">Hora:</th>
                            <td>{{$horario->hora}}</td>

                         </tr>

                 



                           <tr>  
                            <th scope="row">Opciones:</th>
                             <td>

                      
                            <a href="{{URL::action('HorariosController@edit',$horario->id_horario)}}"><button class="btn btn-info">Editar </button></a>
                            <a href="" data-target="#modal-delete-{{$horario->id_horario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                            </td>
                         </tr>

                    </tbody>
                    
                        
                       
                      
                    
                    
                    @include('horario.modal')
                    
                </table>

            <br>

            <table class="table table-bordered">
               <tr scope="row">Cooperativas:</tr>
                
                <tbody>
                  <tr>
                    @foreach($horario->cooperativas as $coop)
                    <ul>
                      <li>{{$coop->nombre}}</li>

                    </ul>
                    @endforeach
                    
                  </tr>
                
                </tbody>
              </table>

                     
                          

                      
            </div>
            
        </div>

    </div>
@endsection