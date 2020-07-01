<?php
require_once ("conexion/db.php");
require_once ("conexion/conexion.php");
$cliente = $_POST["cliente"];
$fecha = $_POST["fecha"];
$ricotachica = $_POST["ricotachica"];
$ricotagrande = $_POST["ricotagrande"];
$ricotabolsa = $_POST["ricotabolsa"];
$muzzabarra = $_POST["muzzabarra"];
$muzzacilindro = $_POST["muzzacilindro"];
$muzzaplancha = $_POST["muzzaplancha"];
$cremoso = $_POST["cremoso"];
$tybo = $_POST["tybo"];
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
          <h4 class="display-6">Resumen del Pedido</h4>
          <p class="lead">Confirmar los datos y agregar el total</p>
          <hr class="my-4">
          <form action="nuevo-pedido-total.php" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="cliente" value="<?php echo $cliente ?>" disabled>
                  <input type="text" class="form-control" id="fecha" value="<?php echo $fecha ?>" disabled> 
                </div>                

                  <h6><?php echo $ricotachica ." - Ricota -- Chica"; ?></h6>
                  <h6><?php echo $ricotagrande ." - Ricota -- grande"; ?></h6>
                  <h6><?php echo $ricotabolsa ." - Ricota -- Bolsa";?></h6>
                  <h6><?php echo $muzzabarra." - Muzzarella -- Barra";?></h6>
                  <h6><?php echo $muzzacilindro." - Muzzarella -- Barra";?></h6>
                  <h6><?php echo $muzzaplancha." - Muzzarella -- Plancha";?></h6>
                  <h6><?php echo $cremoso." - Cremoso";?></h6>
                  <h6><?php echo $tybo." - tybo";?></h6>
                                      

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Total a pagar</span>
                  </div>
                  <input type="number" class="form-control" id="ricota">
                </div>
                <hr class="my-4">                      
                <button type="submit" class="btn btn-success btn-block mt-4" href="">Continuar</button>              
              </div>
            </div>            
          </form>
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
<?php
$conn->close();
?>