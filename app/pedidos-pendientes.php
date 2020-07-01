<?php
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>
  <?php include 'navbar.php';?>

  <!-- container -->
  <div class="container cont">

    <!-- row lista de clientes -->
    <h4 class="display">Pedidos Pendientes de entrega</h4>
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
                <th scope="col" class="text-white"></th>
              </tr>
            </thead>
            <?php
            $cart = $con->query("select * from cart where estado='Pendiente'");
            while ($rw=mysqli_fetch_array($cart)) {
            ?>
            <tbody>
              <td>
                <?php $id_pedido = $rw['id'];
                echo $id_pedido; ?>    
              </td>
              <td>
                <?php $date = $rw['fecha']; $newDate = date("d/m/Y", strtotime($date)); echo $newDate;?>
              </td>
              <td>
                <?php echo $rw['client_email'];?>   
              </td>           
              <td>
              <?php
                $products = $con->query("select cart_product.q, cart_product.product_id,
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
              <td>
                <a class="btn btn-primary btn-sm" href="php/actualizarEstado.php?id=<?php echo $id_pedido ?>">Entregado</a>
              </td>                      
            </tbody>
            <?php
            }
            ?>
          </table>            
        </div>          
      </div>      
    </div>
    <!-- end lista de clientes-->  
  </div>
  <!-- end container-->
  
  <script type="text/javascript"> 

  function Remplaza(entry) {
    out = "."; // reemplazar el .
    add = ","; // por ,
    temp = "" + entry;
    while (temp.indexOf(out)>-1) {
    pos= temp.indexOf(out);
    temp = "" + (temp.substring(0, pos) + add + 
    temp.substring((pos + out.length), temp.length));
    }
    document.subform.texto.value = temp;
  }

  $("#search").keyup(function(){
      _this = this;
      // Muestra los tr que concuerdan con la busqueda, y oculta los demás.
      $.each($("#table tbody tr"), function() {
          if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
             $(this).hide();
          else
             $(this).show();                
      });
  }); 
 
  function confirmar(id_cliente)
  {
    if (confirm("¿Esta Seguro de eliminar el Cliente? Una vez eliminado no se podrá acceder al historial de dicho cliente. Por su seguridad, asegurese de resguardar la información")) 
    {
      window.location.href = "procesos/borrarCliente.php?="+ id_cliente;
    }
    
  } 

  function alerta(){
    confirm("Esta por generar un nuevo Pedido, Desea Continuar?");   
  }

  </script>

  <?php include 'footer.php';?>

</body>

</html>
