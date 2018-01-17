<div class="panel panel-primary">
    <div class="panel-heading"> Menu</div>
    <div class="panel-body">
         <ul class="nav nav-pills nav-stacked">

        <?php if(auth()->check()): ?>

              
                     <div class="list-group">
                        <li <?php if(request()->is('cooperativa')): ?> class="active" <?php endif; ?>><a href="/cooperativa" class="list-group-item  list-group-item-action ">Cooperativa</a></li>
                        <li <?php if(request()->is('detalle')): ?> class="active" <?php endif; ?>><a href="/detalle" class="list-group-item list-group-item-action">Detalle</a></li>
                        <li <?php if(request()->is('origen_destino')): ?> class="active" <?php endif; ?>><a href="/origen_destino" class="list-group-item list-group-item-action">Origen Destino</a></li>
                    
                        <li <?php if(request()->is('reserva')): ?> class="active" <?php endif; ?>><a href="/reserva" class="list-group-item list-group-item-action ">Reserva</a></li>
                       
                        <li <?php if(request()->is('bus')): ?> class="active" <?php endif; ?>><a href="/bus" class="list-group-item list-group-item-action ">Bus</a></li>
                       
                        <li <?php if(request()->is('user')): ?> class="active" <?php endif; ?>><a href="/user/index" class="list-group-item list-group-item-action ">Usuarios</a></li>
                  
                        <li <?php if(request()->is('ingreso')): ?> class="active" <?php endif; ?>><a href="/ingreso" class="list-group-item list-group-item-action ">Ingreso</a></li>
                        
                        
                        
                        
                    </div>
        <?php else: ?>
             <li <?php if(request()->is('login')): ?> class="active" <?php endif; ?> ><a  href="/login">Login </a></li>
            <li <?php if(request()->is('register')): ?> class="active" <?php endif; ?> ><a href="/user/new">Crear Usuario</a></li>

        <?php endif; ?>

    ></ul>
    
    
    </div>

</div>