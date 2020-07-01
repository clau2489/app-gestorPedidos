<?php
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>
<?php include 'navbar.php';?>
  <div class="container cont">
    <h4 class="display">Pedidos Entregados</h4>
    <hr class="my-4">    
    <div class="row mt-2">
      <div class="col-md-12">        
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
            $cart = $con->query("select * from cart where estado='Entregado' order by id desc");
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
