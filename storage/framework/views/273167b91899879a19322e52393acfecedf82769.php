<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-secondary active">
        <input type="checkbox"  autocomplete="off"> 1V
    </label>
    <label class="btn btn-secondary">
        <input type="checkbox" autocomplete="off"> 2P
    </label>
    </div>

    <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-secondary active">
        <input type="checkbox"  autocomplete="off"> 3P
    </label>
    <label class="btn btn-secondary">
        <input type="checkbox" autocomplete="off"> 4V
    </label>
    </div>

    <div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>
</div>

<div class="row">
    <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-secondary active">
        <input type="checkbox"  autocomplete="off"> 3P
    </label>
    <label class="btn btn-secondary">
        <input type="checkbox" autocomplete="off"> 4V
    </label>
    </div>
</div>


  <form class="px-4 py-3">
    <div class="form-group">
      <label for="exampleDropdownFormEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword1">Password</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input">
        Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="#">New around here? Sign up</a>
  <a class="dropdown-item" href="#">Forgot password?</a>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>