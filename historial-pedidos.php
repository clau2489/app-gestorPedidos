<!DOCTYPE html>
<html lang="es">

<?php include 'header.php';?>

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h6 class="display-6">Historial de Pedidos</h6>          
          <div class="table-responsive">
            <table class="table table-bordered bg-white">
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Total</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <?php
              require_once ("conexion/db.php");
              require_once ("conexion/conexion.php");
              $id = $_GET['id'];
              $query_clientes=mysqli_query($conn,"SELECT * FROM cliente WHERE id_cliente='$id'");  
              $rw = mysqli_fetch_array($query_clientes);
              $name= $rw['nombre'];
              $query_pedidos=mysqli_query($conn,"SELECT * FROM pedidos WHERE cliente='$name'");
              while($rd=mysqli_fetch_array($query_pedidos)) {  
              ?>
              <tbody>
                  <td><?php $date = $rd['fecha']; $newDate = date("d/m/Y", strtotime($date)); echo $newDate; ?></td>
                  <td><?php echo $rd['producto']; ?></td>
                  <td><?php echo $rd['cant_kilos']; ?></td>
                  <td><?php echo $rd['precio']; ?></td>
                  <td><?php echo $rd['total']; ?></td>
                  <td><?php echo $rd['estado']; ?></td>
              </tbody>
              <?php
              }
              ?>              
            </table>            
          </div>
          <hr class="my-4">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a href="index.php" class="btn btn-secondary btn-sm">Volver al Inicio</a>
              </div>
            </div>
          </div>              
        </div>
      </div>      
    </div>
  </div> 

  <script type="text/javascript">  
    function confirmar(id_cliente)
    {
      if (confirm("¿Desea Eliminar el registro?")) 
      {
        window.location.href = "procesos/borrarCliente.php?="+ id_cliente;
      }
    }
  </script>
  
  <?php include 'footer.php';?>

</body>

</html>
