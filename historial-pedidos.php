<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>
<?php
require_once ("conexion/db.php");
require_once ("conexion/conexion.php");
$id = $_GET['id'];
$query_clientes=mysqli_query($conn,"SELECT * FROM cliente WHERE id_cliente='$id'");  
$rw = mysqli_fetch_array($query_clientes);
$name= $rw[2];

$query_pedidos=mysqli_query($conn,"SELECT * FROM pedidos WHERE cliente='$name'");

$query_totales=mysqli_query($conn,"SELECT sum(total) FROM pedidos WHERE cliente='$name'");
$totales=mysqli_fetch_array($query_totales);

$query_registros=mysqli_query($conn,"SELECT count(total) FROM pedidos WHERE cliente='$name'");
$registros=mysqli_fetch_array($query_registros);

$query_pagos=mysqli_query($conn,"SELECT * FROM pagos WHERE id_cliente='$id'");

$todoslospagos=mysqli_query($conn,"SELECT sum(importe) FROM pagos WHERE id_cliente='$id'");
?>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h5><?php echo $name; ?></h5>
          <br>
          <h6 class="display-6">Historial de Pedidos</h6>          
          <div class="table-responsive">
            <table class="table table-bordered bg-white">
              <thead class="bg-secondary">
                <tr>
                  <th scope="col" class="text-white">Fecha</th>
                  <th scope="col" class="text-white">Producto</th>
                  <th scope="col" class="text-white">Cantidad</th>
                  <th scope="col" class="text-white">Precio</th>
                  <th scope="col" class="text-white">Total</th>
                  <th scope="col" class="text-white">Estado</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($pedidos=mysqli_fetch_array($query_pedidos)) {  
                ?>
                <td><?php $date = $pedidos[5]; $newDate = date("d/m/Y", strtotime($date)); echo $newDate; ?></td>
                <td><?php echo $pedidos[2]; ?></td>
                <td><?php echo $pedidos[4]; ?> unidades</td>
                <td>$<?php echo $pedidos[3]; ?>.-</td>
                <td>$<?php echo $pedidos[6]; ?>.-</td>
                <td><?php echo $pedidos[7]; ?></td>
              </tbody>
              <?php
              }
              ?>             
            </table>
          </div>            
          <hr class="my-4">
          <div class="row">
            <div class="col-md-6">
              <div class="col-md-12">
                <h4>Total de Pedidos: <?php echo $registros[0];?></h4>
                <?php
                $importes=mysqli_fetch_array($todoslospagos);
                $t = $totales[0] - $importes[0];
                ?>                
                <h4 class="h4 text-success">Saldo a pagar: $<?php echo $t; ?>.-</h4>                  
              </div>
              <hr class="my-4">                
              <form action="procesos/agregarPagos.php?id=<?php echo $rw['id_cliente']; ?>" method="post">
                <div class="col-md-12">
                  <h6 class="display-6">Cobranza</h6>
                </div>                
                <div class="col-md-12">
                  <label>Fecha de pago:</label>
                  <input class="form-control" type="date" name="fecha" required>
                </div>
                <div class="col-md-12">
                  <label>Importe a abonar:</label>
                  <input class="form-control" type="number" name="importe" step="0.01" min="0" lang="en" value="0.00">
                </div>
                <div class="col-md-12">
                  <input type="submit" class="btn btn-success btn-sm mt-4" type="number" value="Actualizar Deuda">
                </div>                 
              </form>                
            </div>
            <div class="col-md-6">             
              <div class="table-responsive">
                <br>
                <h6 class="display-6">Historial de Pagos</h6>
                <table class="table table-bordered bg-white">
                  <thead class="bg-secondary">
                    <tr>
                      <th scope="col" class="text-white">Fecha del pago</th>
                      <th scope="col" class="text-white">Importe Abonado</th>
                    </tr>
                  </thead>
                  <?php
                  while($pagos=mysqli_fetch_array($query_pagos)) {  
                  ?>                                     
                  <tbody>                   
                    <td><?php $fecha=$pagos[1]; $newDate = date("d/m/Y", strtotime($fecha)); echo $newDate;?></td>
                    <td>$<?php echo $pagos[2]; ?>.-</td>
                  </tbody>
                  <?php
                  }
                  ?>                  
                </table>                  
              </div>                 
            </div>
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
