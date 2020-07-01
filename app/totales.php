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
      <div class="row mt-2">
        <h4 class="display">Totales a pedir: </h4>
        <hr class="my-4">
      </div>
      <div class="row mt-2">
          <?php
          $porsalut = $con->query("select sum(cart_product.q), cart_product.cart_id, cart_product.product_id from cart_product inner join cart on cart_product.cart_id = cart.id where product_id='1' and estado='pendiente'");
          $ps=mysqli_fetch_array($porsalut);          
          $muzzarella = $con->query("select sum(cart_product.q), cart_product.cart_id, cart_product.product_id from cart_product inner join cart on cart_product.cart_id = cart.id where product_id='2' and estado='pendiente'");
          $muzza=mysqli_fetch_array($muzzarella);
          $ricotta = $con->query("select sum(cart_product.q), cart_product.cart_id, cart_product.product_id from cart_product inner join cart on cart_product.cart_id = cart.id where product_id='3' and estado='pendiente'");
          $ricota=mysqli_fetch_array($ricotta);
          $cremoso = $con->query("select sum(cart_product.q), cart_product.cart_id, cart_product.product_id from cart_product inner join cart on cart_product.cart_id = cart.id where product_id='4' and estado='pendiente'");
          $cremosso=mysqli_fetch_array($cremoso);
          $tybo = $con->query("select sum(cart_product.q), cart_product.cart_id, cart_product.product_id from cart_product inner join cart on cart_product.cart_id = cart.id where product_id='5' and estado='pendiente'");
          $tibo=mysqli_fetch_array($tybo);
          $msv = $con->query("select sum(cart_product.q), cart_product.cart_id, cart_product.product_id from cart_product inner join cart on cart_product.cart_id = cart.id where product_id='6' and estado='pendiente'");
          $muzzasv=mysqli_fetch_array($msv);
          $total = $con->query("select sum(total) from cart where estado='Pendiente'");
          $tt=mysqli_fetch_array($total);                                                           
          ?> 
          <div class="col-md-4">
            <div class="bg-success card">
              <h6 class="display-6">Port Salut Javifer: <br><a class="numero"><?php echo $ps[0]; ?></a> Kg.</h6>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg-warning card">
              <h6 class="display-6">Muzzarella Javifer: <br><a class="numero"><?php echo $muzza[0]; ?></a> Kg.</h6>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg-primary card">
              <h6 class="display-6">Ricotta Javifer: <br><a class="numero"><?php echo $ricota[0]; ?></a> Kg.</h6>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg-secondary card">
              <h6 class="display-6">Cremoso Javifer: <br><?php echo $cremosso[0]; ?> Kg.</h6>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg-danger card">
              <h6 class="display-6">Tybo Javifer: <br><?php echo $tibo[0]; ?> Kg.</h6>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg-dark card">
              <h6 class="display-6">Séptimo Varón: <br><?php echo $muzzasv[0]; ?> Kg.</h6>
            </div>
          </div>
          <div class="col-md-12">
            <div class="bg-light card">
              <h3 style="padding: 0.5em">Total a Cobrar en Pedidos Pendientes: $ <?php echo $tt[0]; ?>.-</h3>
            </div>
          </div>                                                                      
      </div>      
    </div>

  <?php include 'footer.php';?>

</body>

</html>