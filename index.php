<!DOCTYPE html>
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
          <a class="btn btn-secondary btn-block" href="pedidos-entregados.php" role="button">Pedidos Entregados</a>          
          <a class="btn btn-success btn-block" href="clientes.php" role="button">Estados de Cuenta de Clientes</a>
          <a class="btn btn-danger btn-block" href="clientes.php" role="button">Mi Cuenta</a>
        </div>
      </div>
    </div>
  </div>

<?php include 'footer.php';?>  

</body>

</html>
