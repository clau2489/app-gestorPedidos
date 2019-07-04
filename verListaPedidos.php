<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/style.css" rel="stylesheet">
  <link href="vendor/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="jumbotron">
          <h4 class="display-6">Controlá tus pedidos!</h4>
          <p class="lead">Obtené mas detalles haciendo click en la lupa</p>
          <hr class="my-4">
          <div class="table-responsive">
            <table class="table table-bordered bg-white">
              <thead>
                  <tr>
                    <th scope="col">Fecha:</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Kilos</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                    <?php
                    require_once ("conexion/db.php");
                    require_once ("conexion/conexion.php");
                    $query_ped=mysqli_query($conn,"select * from pedidos order by fecha");  
                    while($rw=mysqli_fetch_array($query_ped)) {  
                    ?>                
                <tbody>
                  <tr>
                      <td><?php echo $rw['fecha']; ?></td>
                      <td><?php echo $rw['cliente']; ?></td>
                      <td><?php echo $rw['producto']; ?></td>
                      <td><?php echo $rw['cant_kilos']; ?></td>
                      <td><a href="detallePedidos.php?id=<?php echo $rw['id_pedido']; ?>" class="botn btn btn-secondary m-1"><i class="fa fas fa-search"></i></a></td>  
                    <?php
                    }
                    ?>
                  </tr>
                </tbody>
            </table>
          </div>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-12">
              <a href="index.php" class="btn btn-secondary btn-block">Volver al Inicio</a>
            </div>
          </div>                   
        </div>        
      </div>
    </div>
  </div>
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>