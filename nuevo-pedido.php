<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
          <h4 class="display-6">Genera un Nuevo Pedido!</h4>
          <p class="lead">Seleccioná el Cliente y la fecha de Entrega</p>
          <hr class="my-4">
            <div class="row">
              <div class="col-md-12">
                <label>Seleccionar Cliente</label>
                <select class="form-control" name="cliente" id="cliente" required>
                <option selected>Seleccionar..</option>
                <?php
                require_once ("conexion/db.php");
                require_once ("conexion/conexion.php");
                $query_clientes=mysqli_query($conn,"select * from cliente order by nombre");  
                while($rw=mysqli_fetch_array($query_clientes)) {  
                ?>  
                <option><?php echo $rw['nombre']; ?></option>
                <?php
                }
                ?> 
                </select>                
              </div>
            </div>
            <hr class="my-4">
            <label>¿En qué fecha vas a entregar el pedido? </label>
            <input class="form-control" type="date" name="fecha" id="fecha" required>
            <hr class="my-4">                      
            <a class="btn btn-success btn-block mt-4" href="nuevo-pedido-prod.php" id="continuar">Continuar</a>
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
  <script type="text/javascript">

	 /*Funcion de Capturar, Almacenar datos y Limpiar campos*/
	$(document).ready(function(){    
	    $('#continuar').click(function(){        
	        /*Captura de datos escrito en los inputs*/        
	        var cliente = document.getElementById("cliente").value;
	        var fecha = document.getElementById("fecha").value;
	        /*Guardando los datos en el LocalStorage*/
	        localStorage.setItem("cliente", cliente);
	        localStorage.setItem("fecha", fecha);
	        /*Limpiando los campos o inputs*/
	        document.getElementById("cliente").value = "";
	        document.getElementById("fecha").value = "";
	    });   
	});   
  </script>

  <?php include 'footer.php';?>
</body>

</html>
