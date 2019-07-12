<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
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
            <div class="row">
              <div class="col-md-6">
                <label>Producto a despachar: </label>
                <select class="form-control" id="producto" name="producto" required>
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
              </div>
              <div class="col-md-2">
                <label>Cantidad: </label>
                <input class="form-control" type="number" id="cantidad" name="kilos" required>               
              </div>
              <div class="col-md-2">
                <label>Precio final: </label>
                <input class="form-control" type="number" id="precio" name="precio" step="0.01" min="0" lang="en" value="0.00" required>             
              </div>
              <div class="col-md-2">
                <button class="btn btn-success btn-block" onclick="Agregar()">Agregar al Pedido</button>
              </div>              
            </div>
            <div class="row">
              <div class="col-md-12">
                <hr class="my-4">
                <table class="table table-bordered bg-white">
                  <thead class="bg-secondary">
                      <tr>
                        <th scope="col" class="text-white">Cantidad</th>
                        <th scope="col" class="text-white">Producto</th>
                        <th scope="col" class="text-white">Precio</th>
                      </tr>
                    </thead>                
                    <tbody>
                      <tr>
                          <td id="cant"></td>
                          <td id="prod"></td>
                          <td id="prec"></td>
                      </tr>
                    </tbody>
                </table>

              </div>
            </div>          
            <button type="submit" class="btn btn-success btn-block mt-4" href="">Guardar pedido</button>        
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
  <script type="text/javascript">
    
    function Agregar() {
      var productos = new Array();
      var cantidades= new Array();
      var precios = new Array();
      
      var p = document.getElementById("producto").value;
      productos.push(p);
      var c = document.getElementById("cantidad").value;
      cantidades.push(c);
      var pr = document.getElementById("precio").value;
      precios.push(pr);
      
      var x = productos.toString();
      document.getElementById("prod").innerHTML = x;

      var y = cantidades.toString();
      document.getElementById("cant").innerHTML = y;

      var z = precios.toString();
      document.getElementById("prec").innerHTML = z;

      console.log(cantidades);
      console.log(productos);
      console.log(precios);

    }
  </script>

  <?php include 'footer.php';?>
</body>

</html>
