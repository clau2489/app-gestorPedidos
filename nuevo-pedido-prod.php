<?php
require_once ("conexion/db.php");
require_once ("conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
          <h4 class="display-6">Agregá las cantidades</h4>
          <p class="lead"></p>
          <hr class="my-4">
          <form action="nuevo-pedido-total.php" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="input-group mb-3">
                  <button class="btn btn-success" id="boton-cargar">
                  <input type="text" class="form-control" id="cliente" name="cliente" value="" disabled>
                  <input type="text" class="form-control" id="fecha" name="fecha" value="" disabled> 
                </div>                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Ricota Chica</span>
                  </div>
                  <input type="number" class="form-control" name="ricotachica">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Ricota Grande</span>
                  </div>
                  <input type="number" class="form-control" name="ricotagrande">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Ricota Bolsa</span>
                  </div>
                  <input type="number" class="form-control" name="ricotabolsa">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Muzzarella Barra</span>
                  </div>
                  <input type="number" class="form-control" name="muzzabarra">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Muzzarella Cilindo</span>
                  </div>
                  <input type="number" class="form-control" name="muzzacilindro">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Muzzarella Plancha</span>
                  </div>
                  <input type="number" class="form-control" name="muzzaplancha">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Cremoso</span>
                  </div>
                  <input type="number" class="form-control" name="cremoso">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text inp">Tybo</span>
                  </div>
                  <input type="number" class="form-control" name="tybo">
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
  <script type="text/javascript">
    /*Funcion Cargar y Mostrar datos*/
    $(document).ready(function(){    
        $('#boton-cargar').click(function(){                       
            /*Obtener datos almacenados*/
            var cliente = localStorage.getItem("cliente");
            var fecha = localStorage.getItem("fecha");
            /*Mostrar datos almacenados*/      
            document.getElementById("cliente").innerHTML = cliente;
            document.getElementById("fecha").innerHTML = fecha; 
        });   
    });
  </script>
</body>

</html>
<?php
$conn->close();
?>