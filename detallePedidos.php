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
        <?php
        require_once ("conexion/db.php");
        require_once ("conexion/conexion.php");
        $id = $_GET['id'];
        $query_pedidos=mysqli_query($conn,"SELECT * FROM pedidos WHERE id_pedido='$id'");  
        while($rw=mysqli_fetch_array($query_pedidos)) {  
        ?>        
        <div class="jumbotron">
          <h4 class="display-6">Detalle del Pedido N° <?php echo $rw['id_pedido']; ?> </h4>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-12">
              <h5>Cliente: <?php echo $rw['cliente']; ?></h5>
            </div>
          </div>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-8"> 
              <h2><?php echo $rw['cant_kilos']; ?> <?php echo $rw['producto']; ?></h2>
            </div>
            <div class="col-md-4">
              <h5>Precio x Kg: $<?php echo $rw['precio']; ?></h5>
            </div>                             
          </div>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-12">
              <?php 
              $p = $rw['precio'];
              $k = $rw['cant_kilos'];
              $total = $p * $k;
              ?>
              <h1 class="h3 text-success">Total a pagar: $<?php echo $total ?>.-</h1>               
            </div>             
          </div>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-6">
              <h5>Pago a Cuenta:</h5>
              <input type="number" name="">
            </div>
            <div class="col-md-6">
              <h5>Saldo: </h5>
            </div>            
          </div>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-12">
              <a href="index.php" class="btn btn-secondary btn-block">Volver al Inicio</a>
            </div>
          </div>       
        </div>
          <?php
          }
          ?>          
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
