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
      <div class="col-md-6 offset-md-3">
        <?php
        require_once ("conexion/db.php");
        require_once ("conexion/conexion.php");
        $id = $_GET['id'];
        $query_pedidos=mysqli_query($conn,"SELECT * FROM pedidos WHERE id_pedido='$id'");  
        while($rw=mysqli_fetch_array($query_pedidos)) {  
        ?>        
        <div class="jumbotron">
          <h6 class="display-6">Pedido N° <?php echo $rw['id_pedido']; ?>  - Cliente: <span><?php echo $rw['cliente']; ?></h6>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-8"> 
              <h6 class="h4 text-primary"><?php echo $rw['producto']; ?></h6>
            </div>
            <div class="col-md-4">
              <h5 class="lead"><?php echo $rw['cant_kilos']; ?> Unidades<br>Precio x Kg: $<?php echo $rw['precio']; ?></h5>
            </div>                             
          </div>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-12">
              <form action="procesos/actualizarPedido.php?id=<?php echo $rw['id_pedido']; ?>" method="post">
                <div class="col-md-12">
                  <h3 class="h2 text-success">Total: $<?php echo $rw['total'] ?>.-</h3>
                  <hr class="my-4">           
                </div>
                <div class="col-md-12">
                  <h5>Pago a Cuenta:</h5>
                  <input type="number" name="cuenta" id="cuenta" class="form-control jp">
                </div>
                <div class="col-md-12">
                  <h5>Saldo: </h5>
                  <input type="number" name="saldo" id="saldo" value="$<?php echo $rw['saldo'] ?>.-" class="form-control jp">
                </div>
                <div class="col-md-12">
                  <hr class="my-4">
                  <input type="submit" name="" class="btn btn-primary btn-block" value="Actualizar">
                </div>                
              </form>              
            </div>
          </div>                                     
          <hr class="my-4">
          <div class="row">
            <div class="col-md-12">
              <a href="index.php" class="btn btn-secondary btn-sm">Volver al Inicio</a>
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
