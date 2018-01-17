<div class="panel panel-primary">
    <div class="panel-heading"> Menu</div>
    <div class="panel-body">
         <ul class="nav nav-pills nav-stacked">

        @if(auth()->check())

              
                     <div class="list-group">
                        <li @if(request()->is('cooperativa')) class="active" @endif><a href="/cooperativa" class="list-group-item  list-group-item-action ">Cooperativa</a></li>
                        <li @if(request()->is('detalle')) class="active" @endif><a href="/detalle" class="list-group-item list-group-item-action">Detalle</a></li>
                        <li @if(request()->is('origen_destino')) class="active" @endif><a href="/origen_destino" class="list-group-item list-group-item-action">Origen Destino</a></li>
                    
                        <li @if(request()->is('reserva')) class="active" @endif><a href="/reserva" class="list-group-item list-group-item-action ">Reserva</a></li>
                       
                        <li @if(request()->is('bus')) class="active" @endif><a href="/bus" class="list-group-item list-group-item-action ">Bus</a></li>
                       
                        <li @if(request()->is('user')) class="active" @endif><a href="/user/index" class="list-group-item list-group-item-action ">Usuarios</a></li>
                  
                        <li @if(request()->is('ingreso')) class="active" @endif><a href="/ingreso" class="list-group-item list-group-item-action ">Ingreso</a></li>
                        
                        
                        
                        
                    </div>
        @else
             <li @if(request()->is('login')) class="active" @endif ><a  href="/login">Login </a></li>
            <li @if(request()->is('register')) class="active" @endif ><a href="/user/new">Crear Usuario</a></li>

        @endif

    ></ul>
    
    
    </div>

</div>