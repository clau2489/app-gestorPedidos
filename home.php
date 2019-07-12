<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}?>
<html lang="es">
<?php include 'header.php';?>
<body>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
          <img src="img/logo.png" style="width: 100% ">
          <hr class="my-4">
          <h1 class="display-5">Bienvenido!</h1>
          <p class="lead">Administrá tus pedidos de la forma más facil</p>
          <p>Elegí una opción:</p>
          <a class="btn btn-primary btn-block" href="nuevo-pedido.php" role="button">Cargar un Nuevo Pedido</a>
          <a class="btn btn-warning btn-block" href="pedidos-pendientes.php" role="button">Pedidos Pendientes</a>
          <a class="btn btn-info btn-block" href="pedidos-entregados.php" role="button">Pedidos Entregados</a>          
          <a class="btn btn-success btn-block" href="clientes.php" role="button">Mis Clientes</a>
          <a class="btn btn-danger btn-block" href="clientes.php" role="button">Mi Cuenta</a>
          <a class="btn btn-dark btn-block" href="logout.php">Cerrar sesión</a>
          <hr class="my-4">
          <p class="copyright">Powered By <a href="http://www.oestedev.com"><img src="img/oestedev.png" style="width: 65px;"></a></p>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php';?>
</body>
</html>

