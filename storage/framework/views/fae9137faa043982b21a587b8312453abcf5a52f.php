<!doctype html>
<html>
<head>
<meta charset="utf-8">

</head>
<body>
    
    <h1>Bienvenid@ <?php echo e($name); ?> </h1>
<div>
   
<br>

<br>
<h1>Correo:<?php echo $email; ?>!</h1>
<p>Confirma tu correo electronico con el siguinte link</p>
<a href="<?php echo e(url('register/verify/'.$confirmation_code)); ?>">
        Click para confirmar
 </a>
</div>
</body>
</html>