<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="jumbotron">
          <h4 class="display-6">Agregá un nuevo cliente con un solo Click!</h4>
          <hr class="my-4">
          <form method="post" action="procesos/agregarCliente.php">
            <div class="row">
              <div class="col-md-3">
                <input type="text" class="form-control m-1" placeholder="Codigo Cliente" name="codigocliente" id="codigocliente" required>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control m-1" placeholder="Nombre" name="nombrecliente" id="nombrecliente" required>
              </div>
              <div class="col-md-3">
                <input class="btn btn-block btn-success m-1" type="submit" name="enviar" value="Agregar Nuevo">
              </div>        
            </div>
          </form>
        </div>
      </div>      
    </div>
  </div> 

  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="jumbotron">
          <h6 class="display-6">Tu Lista de Clientes!</h6>
          <hr class="my-4">
          <div class="table-responsive">
            <table class="table table-bordered bg-white">
              <thead>
                <tr>
                  <th scope="col">Cliente</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <?php
              require_once ("conexion/db.php");
              require_once ("conexion/conexion.php");
              $query_clientes=mysqli_query($conn,"select * from cliente order by nombre");  
              while($rw=mysqli_fetch_array($query_clientes)) {  
              ?>
              <tbody>
                <td><?php echo $rw['nombre']; ?></td>
                <td style="width: 100px; padding: 5px;"><a href="historial-pedidos.php?id=<?php echo $rw['id_cliente']; ?>" class="botn btn btn-secondary m-1"><i class="fa fas fa-search"></i></a>
                  <a class="botn btn btn-danger m-1" href="procesos/borrarCliente.php?id=<?php echo $rw['id_cliente']; ?>" onclick="confirmar()" id="<?php echo $rw['id_cliente']; ?>"><i class="fa fas fa-trash-alt"></i></a>
                </td>
              </tbody>
              <?php
              }
              ?>
            </table>            
          </div>
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
