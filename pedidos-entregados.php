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
              <thead class="bg-secondary">
                  <tr>
                    <th scope="col" class="text-white">Fecha:</th>
                    <th scope="col" class="text-white">Cliente</th>
                    <th scope="col" class="text-white">Cantidad</th>
                    <th scope="col" class="text-white">Producto</th>
                    <th scope="col" class="text-white">Precio</th>
                    <th scope="col" class="text-white">Total</th>
                    <th scope="col" class="text-white">Estado</th>
                  </tr>
                </thead>
                    <?php
                    require_once ("conexion/db.php");
                    require_once ("conexion/conexion.php");
                    $query_ped=mysqli_query($conn,"select * from pedidos where estado='Entregado' order by fecha");  
                    while($rw=mysqli_fetch_array($query_ped)) {  
                    ?>                
                <tbody>
                  <tr>
                      <td><?php $date = $rw['fecha']; $newDate = date("d/m/Y", strtotime($date)); echo $newDate; ?></td>
                      <td><?php echo $rw['cliente']; ?></td>
                      <td><?php echo $rw['cant_kilos']; ?></td>
                      <td><?php echo $rw['producto']; ?></td>
                      <td>$<?php echo $rw['precio']; ?>.-</td>
                      <td>$<?php echo $rw['total']; ?>.-</td>
                      <td><?php echo $rw['estado']; ?></td>  
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
              <a href="home.php" class="btn btn-secondary btn-sm">Volver al Inicio</a>
            </div>
          </div>                   
        </div>        
      </div>
    </div>
  </div>
  <?php include 'footer.php';?>
</body>
</html>