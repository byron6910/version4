<?php echo Form::open(['url'=>'user/index','method'=>'GET','autocomplete'=>'off','role'=>'search']); ?>


<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar.." value="<?php echo e($searchText); ?>">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </span>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <label>Tipo de Usuario:</label>
       		<select name="filtrar" class="form-control">
                        
				<option value="cliente"> Cliente</option>
				<option value="conductor"> Conductor</option>
				<option value="administrador"> Administrador</option>
        	</select>

      
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </span>
    </div>
</div>

<?php echo e(Form::close()); ?>