<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <form class="form-login" action="login.php" method="post">
          <img src="img/logo.png" style="width: 100% ">
          <hr class="my-4">
          <div class="form-group">
            <label>Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario">
          </div>
          <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control" id="contrasenia" name="contrasenia">
          </div>
          <hr class="my-4">
          <button type="submit" class="btn btn-success btn-block">Iniciar Sesión</button>
        </form>        
      </div>
    </div>
  </div>  
  <?php include 'footer.php';?>
</body>
</html>