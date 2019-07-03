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
          <h4 class="display-6">Detalle del Pedido</h4>
          <hr class="my-4">
              <?php
              require_once ("conexion/db.php");
              require_once ("conexion/conexion.php");
              $id = $_GET['id'];
              $query_pedidos=mysqli_query($conn,"SELECT * FROM pedidos WHERE id_pedido='$id'");  
              while($rw=mysqli_fetch_array($query_pedidos)) {  
              ?>
            <div class="row">
              <div class="col-md-12">
                <h5>Codigo de Pedido: <?php echo $rw['id_pedido']; ?></h5>
                <h5>Cliente: <?php echo $rw['cliente']; ?></h5>
                <h5>Producto: <?php echo $rw['producto']; ?></h5>
                <h5>Precio x Kg: $<?php echo $rw['precio']; ?></h5>
                <h5>Cantidad de Kg Pedidos: <?php echo $rw['cant_kilos']; ?></h5>
                <br>
                <?php 
                $p = $rw['precio'];
                $k = $rw['cant_kilos'];
                $total = $p * $k;
                ?>
                <h5>Total a pagar: <?php echo $total ?></h5>
                <input type="number" name="pago">
              </div>        
            </div>
              <?php
              }
              ?>
        </div>
      </div>      
    </div>
  </div> 
  <!--
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
                    <a class="btn btn-danger m-1" href="borrarCliente.php" onclick="confirmar()" id="<?php echo $rw['id_cliente']; ?>"><i class="fa fas fa-trash-alt"></i></a> 
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
  </div> -->

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
