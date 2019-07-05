<!DOCTYPE html>
<html lang="es">

<?php include 'header.php';?>

<body>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
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
                    <th scope="col">Cantidad</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio U.</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estado del pedido</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                    <?php
                    require_once ("conexion/db.php");
                    require_once ("conexion/conexion.php");
                    $query_ped=mysqli_query($conn,"select * from pedidos where estado='Pendiente' order by fecha");  
                    while($rw=mysqli_fetch_array($query_ped)) {  
                    ?>                
                <tbody>
                  <tr>
                      <td>
                        <?php 
                        $date = $rw['fecha'];
                        $newDate = date("d/m/Y", strtotime($date));
                        echo $newDate; ?></td>
                      <td><?php echo $rw['cliente']; ?></td>
                      <td><?php echo $rw['cant_kilos']; ?></td>
                      <td><?php echo $rw['producto']; ?></td>
                      <td>$<?php echo $rw['precio']; ?>.-</td>
                      <td>$<?php echo $rw['total']; ?>.-</td>
                      <td><?php echo $rw['estado']; ?></td>
                      <td><a href="procesos/actualizarEstado.php?id=<?php echo $rw['id_pedido']; ?>" class="botn btn btn-success m-1"><i class="fa fas fa-check"></i></a></td>  
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
              <a href="index.php" class="btn btn-secondary btn-sm">Volver al Inicio</a>
            </div>
          </div>                   
        </div>        
      </div>
    </div>
  </div>
  
  <?php include 'footer.php';?>

</body>

</html>