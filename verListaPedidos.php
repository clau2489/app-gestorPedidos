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
            <table class="table">
              <thead>
                  <tr>
                    <th scope="col">Fecha:</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Kilos</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    require_once ("conexion/db.php");
                    require_once ("conexion/conexion.php");
                    $query_pedidos=mysqli_query($conn,"select * from pedidos order by date");
                    while($rw=mysqli_fetch_array($query_pedidos)) {  
                    ?>
                    <td><?php echo $rw['fecha']; ?></td>
                    <td><?php echo $rw['cliente']; ?></td>
                    <td><?php echo $rw['producto']; ?></td>
                    <td><?php echo $rw['cant_kilos']; ?></td>  
                    <?php
                    }
                    ?>
                  </tr>
                </tbody>
            </table>
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