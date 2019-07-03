<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/style.css" rel="stylesheet">
  <link href="vendor/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

</head>

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="jumbotron">
          <h4 class="display-6">Datos del Cliente</h4>
          <hr class="my-4">
              <?php
              require_once ("conexion/db.php");
              require_once ("conexion/conexion.php");
              $id = $_GET['id'];
              $query_clientes=mysqli_query($conn,"SELECT * FROM cliente WHERE id_cliente='$id'");  
              while($rw=mysqli_fetch_array($query_clientes)) {  
              ?>
            <div class="row">
              <div class="col-md-6">
                <h5>Codigo de Cliente: <?php echo $rw['codigo_cliente']; ?></h5>
              </div>
              <div class="col-md-6">
                <h5><?php echo $rw['nombre']; ?></h5>
              </div>        
            </div>
              <?php
              }
              ?>
        </div>
      </div>      
    </div>
  </div> 

  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="jumbotron">
          <h6 class="display-6">Historial de Pedidos</h6>
          <hr class="my-4">
          <div class="table-responsive">
            <table class="table table-bordered bg-white">
              <thead>
                <tr>
                  <th scope="col">Cliente</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <?php
              require_once ("conexion/db.php");
              require_once ("conexion/conexion.php");
              $query_clientes=mysqli_query($conn,"select * from cliente order by nombre");  
              while($rw=mysqli_fetch_array($query_clientes)) {  
              ?>
              <tbody>
                  <td><?php echo $rw['nombre']; ?></td>
                  <td style="width: 50px; padding: 5px;"><a href="index.php" class="botn btn btn-secondary m-1"><i class="fa fas fa-search"></i></a>
                    <!--<a class="btn btn-danger m-1" href="borrarCliente.php" onclick="confirmar()" id="<?php echo $rw['id_cliente']; ?>"><i class="fa fas fa-trash-alt"></i></a> -->
                </td>
              </tbody>
              <?php
              }
              ?>
            </table>            
          </div>
        </div>
      </div>      
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <a href="index.php" class="btn btn-primary btn-lg">Volver al Inicio</a>
      </div>
    </div>
  </div>
  

  <script type="text/javascript">  
    function confirmar(id_cliente)
    {
      if (confirm("¿Desea Eliminar el registro?")) 
      {
        window.location.href = "procesos/borrarCliente.php?="+ id_cliente;
      }
    }
  </script>
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
