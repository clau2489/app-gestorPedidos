<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

</head>

<body>  
  <div class="container mt-5">
    <form method="post" action="agregarProducto.php">
      <div class="row">
        <div class="col-md-4">
          <input type="text" class="form-control m-1" placeholder="Codigo Cliente" name="codigocliente" id="codigocliente" required>
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control m-1" placeholder="Nombre" name="nombrecliente" id="nombrecliente" required>
        </div>
        <div class="col-md-2">
          <input class="btn btn-block btn-success m-1" type="submit" name="enviar" value="Agregar Nuevo">
        </div>        
      </div>
    </form>
  </div>

  <div class="container mt-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cliente</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <?php
      require_once ("db.php");
      require_once ("conexion.php");
      $query_clientes=mysqli_query($conn,"select * from cliente order by nombre");  
      while($rw=mysqli_fetch_array($query_clientes)) {  
      ?>
      <tbody>
          <td><?php echo $rw['codigo_cliente']; ?></td>
          <td><?php echo $rw['nombre']; ?></td>
          <td style="width: 150px;"><button class="btn btn-warning m-1"><i class="fas fa-search"></i></button><button class="btn btn-danger m-1"><i class="fas fa-trash-alt"></i></button></td>
      </tbody>
      <?php
      }
      ?>
    </table>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
