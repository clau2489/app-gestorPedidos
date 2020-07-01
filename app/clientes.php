<!DOCTYPE html>
<html lang="es">
<?php include 'header.php';?>
<body>
  <?php include 'navbar.php';?>

  <!-- container -->
  <div class="container cont">
      

    <!-- Modal Nuevo Cliente -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ingresar Nuevo Cliente</h4><button type="button" class="btn btn-default" data-dismiss="modal">X</button>
          </div>
          <div class="modal-body">
            <form method="post" action="php/agregarCliente.php">
              <div class="form-row">
                <div class="col-md-12">
                  <input type="text" class="form-control m-1" placeholder="Codigo Cliente" name="codigocliente" id="codigocliente" required>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control m-1" placeholder="Nombre" name="nombrecliente" id="nombrecliente" required>
                </div>
                <div class="col-md-12">
                  <br>                  
                  <input class="btn btn-success btn-sm float-right" type="submit" name="enviar" value="Guardar">
                </div>        
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal-->


    <!-- row lista de clientes -->
    <h4 class="display">Lista de Clientes</h4>
    <hr class="my-4">    


    <!--fila de buscador y boton nuevo --> 
    <div class="row mt-2">
      <div class="col-md-10">
        <input type="text" id="search" class="form-control form-control-sm" placeholder="Busqueda rápida..." />
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-plus-square" aria-hidden="true"></i> Nuevo Cliente</button>
      </div>          
    </div>
    <br class="my-4">    
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-sm" id="table">
            <thead class="bg-secondary">
              <tr>
                <th scope="col" class="text-white"># Cod.</th>
                <th scope="col" class="text-white">Cliente</th>
                <th scope="col" class="text-white"></th>
                <th scope="col" class="text-white"></th>
              </tr>
            </thead>
            <?php
            include "php/conection.php";
            $query_clientes=mysqli_query($con,"select * from cliente order by nombre_cliente");  
            while($rw=mysqli_fetch_array($query_clientes)) {  
            ?>
            <tbody>
              <td><?php echo $rw['codigo_cliente']; ?></td>
              <td><?php echo $rw['nombre_cliente']; ?></td>
              <td style="width: 50px; padding: 5px;">
                <a href="historial-pedidos.php?id=<?php echo $rw['id_cliente']; ?>" class="botn btn btn-success btn-sm m-1"><i class="fa fa-search" aria-hidden="true"></i>
                </a>
              </td>
              <td style="width: 50px; padding: 5px;">
                <a href="procesos/borrarCliente.php?id=<?php echo $rw['id_cliente']; ?>"  onclick="confirmar()" class="botn btn btn-danger btn-sm m-1"><i class="fa fa-times" aria-hidden="true"></i>
                </a>
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
