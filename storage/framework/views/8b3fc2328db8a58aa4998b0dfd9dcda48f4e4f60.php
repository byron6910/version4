;
<?php $__env->startSection('title'); ?> Cooperativa
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row main">
	<div class="main-login main-center">
	<h5>Ingrese nueva Cooperativa</h5>
		<form class="" method="post" action="http://127.0.0.1:8000/api/cooperativa">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
			
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Nombre:</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="nombre"   placeholder="Enter your Name"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="cols-sm-2 control-label">Email</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="correo"   placeholder="Enter your Email"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="telefono" class="cols-sm-2 control-label">Telefono</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
						<input type="number" class="form-control" name="telefono"   placeholder="Ingrese Telefono"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="direccion" class="cols-sm-2 control-label">Direccion</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="direccion"   placeholder="Enter your Direccion"/>
					</div>
				</div>
			</div> 	

			<div class="form-group">
				<label for="confirm" class="cols-sm-2 control-label">Estado</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
						<input type="boolean" class="form-control" name="estado"   placeholder="Confirm your Estado"/>
					</div>
				</div>
			</div>

			<div class="form-group ">
				<a  type="submit"  id="button" class="btn btn-primary btn-lg btn-block login-button">Register</a>
			</div>
			
		</form>
	</div>
</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer','2017'); ?>
<?php echo $__env->make('template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>