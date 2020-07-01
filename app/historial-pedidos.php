<?php
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>
<?php include 'navbar.php';?>
<?php

//id que traigo de la pantalla anterior
$id = $_GET['id'];

//nombre del cliente
$cliente = $con->query("select nombre_cliente from cliente where id_cliente='$id'");
$rw = mysqli_fetch_array($cliente);
$nombredelcliente = $rw['nombre_cliente'];

//total a pagar por el cliente
$total = $con->query("SELECT sum(total) FROM cart WHERE client_email='$nombredelcliente' AND estado='Entregado'");
$tt = mysqli_fetch_array($total);


//total pagado por el cliente
$pagado = $con->query("SELECT sum(importe) FROM cuenta WHERE cliente='$nombredelcliente'");
$pg = mysqli_fetch_array($pagado);


// cantidad de pedidos
$totalpedidos = $con->query("SELECT count(*) FROM cart WHERE client_email='$nombredelcliente'");
$tp = mysqli_fetch_array($totalpedidos);

?> 
  <div class="container cont"> 
    <div class="row mt-2">
      <div class="col-md-6">
        <div class="col-md-12">                              
        </div>               
        <form action="php/agregarPagos.php?id=<?php echo $nombredelcliente; ?>" method="post">
          <div class="col-md-12">
            <h4 class="h4 text-success">Saldo a pagar: $ <?php $saldo = $tt[0] - $pg[0]; echo $saldo;?> .-</h4>
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
          <h6 class="display">Historial de Pagos</h6>
          <table class="table table-bordered bg-white table-sm">
            <thead class="bg-secondary">
              <tr>
                <th scope="col" class="text-white">Fecha del pago</th>
                <th scope="col" class="text-white">Importe Abonado</th>
              </tr>
            </thead>
            <?php
            $pagostotales = $con->query("SELECT * FROM cuenta WHERE cliente='$nombredelcliente'");
            while($pagos = mysqli_fetch_array($pagostotales)) {  
            ?>                                     
            <tbody>                   
              <td><?php $fecha=$pagos[2]; $newDate = date("d/m/Y", strtotime($fecha)); echo $newDate;?></td>
              <td>$<?php echo $pagos[3]; ?>.-</td>
            </tbody>
            <?php
            }
            ?>                  
          </table>                  
        </div>                 
      </div>
    </div>
    <hr class="display">
    <div class="row mt-2">
      <div class="col-md-12">
        <h6 class="display">Historial de Pedidos</h6>          
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-sm" id="table">
            <thead class="bg-secondary">
              <tr>
                <th scope="col" class="text-white">Pedido N°</th>
                <th scope="col" class="text-white">Fecha de Entrega</th>
                <th scope="col" class="text-white">Cliente</th>
                <th scope="col" class="text-white">Pedido</th>
                <th scope="col" class="text-white">Total a pagar</th>
                <th scope="col" class="text-white">Estado</th>
              </tr>
            </thead>
            <?php
            $cart = $con->query("select * from cart where client_email='$nombredelcliente' order by id desc");
            while ($rw=mysqli_fetch_array($cart)) {
            ?>
            <tbody>
              <td>
                <?php $id_pedido = $rw['id']; 
                echo $id_pedido;?>    
              </td>
              <td>
                <?php $date = $rw['fecha']; $newDate = date("d/m/Y", strtotime($date)); echo $newDate;?>
              </td>
              <td>
                <?php echo $rw['client_email'];?>   
              </td>           
              <td>
              <?php
                $products = $con->query(" select cart_product.q, cart_product.product_id,
                                                 product.name
                                          from cart_product
                                                 inner join product
                                          on cart_product.product_id = product.id
                                                 where cart_id='$id_pedido'");
                while ($row=mysqli_fetch_array($products)) {
                ?>             
                  <?php echo $row['q']." Kg."; echo " - "; echo $row['name']; echo "<br>";?> 
                <?php
                  }
                ?>
              </td>
              <td><?php echo '$'.$rw['total'] .'.-';?></td>
              <td><?php echo $rw['estado'];?></td>                         
            </tbody>
            <?php
            }
            ?>
          </table> 
        </div> 
      </div>      
    </div>     
  </div>
  <?php include 'footer.php';?>
</body>
</html>
