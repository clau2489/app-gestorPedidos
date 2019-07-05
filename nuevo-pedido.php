<!DOCTYPE html>
<html lang="es">

<?php include 'header.php';?>

<body>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
          <h4 class="display-6">Genera un Nuevo Pedido!</h4>
          <p class="lead">Seleccioná el Cliente y carga el pedido que te hace</p>
          <hr class="my-4">
          <form action="procesos/agregarPedido.php" method="post">
            <label>¿En qué fecha vas a entregar el pedido? </label>
            <input class="form-control" type="date" name="fecha" required>
            <label>Selecciona el Cliente: </label>
            <select class="form-control" name="cliente" required>
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
            <label>Producto a despachar: </label>
            <select class="form-control" name="producto" required>
              <option selected>Seleccionar..</option>
              <option value="Ricota - Chica">Ricota -- Chica</option>
              <option value="Ricota - Grande">Ricota -- Grande</option>
              <option value="Ricota - Bolsa">Ricota -- x Bolsa</option>
              <option value="Muzzarella - Barra">Muzzarella -- Barra</option>
              <option value="Muzzarella - Cilindro">Muzzarella -- Cilindro</option>
              <option value="Muzzarella - Plancha">Muzzarella -- Plancha</option>
              <option value="Tybos - Barra">Tybos -- Barra</option>
              <option value="Cremoso">Cremoso</option>
              <option value="Por Salut">Port Salut</option>
            </select>
            <div class="row">
              <div class="col-md-6">
                <label>Cantidad: </label>
                <input class="form-control" type="number" name="kilos" required>               
              </div>
              <div class="col-md-6">
                <label>Precio x Kg: </label>
                <input class="form-control" type="number" name="precio" step="0.01" required>             
              </div>              
            </div>           
            <button type="submit" class="btn btn-success btn-block mt-4" href="">Guardar pedido</button>        
          </form>
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
