<?php
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'header.php';?>
</head>
<body>
	<?php include 'navbar.php';?>
	<div class="container cont">
		<div class="row">
			<div class="col-md-12">
				<div class="row mt-2">
					<div class="col-md-8">
						<h4 class="display">Carrito de Pedidos</h4>
					</div>
					<div class="col-md-4">
						<a href="./products.php" class="btn btn-primary btn-sm float-right text-white"><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar más productos</a>						
					</div>											
				</div>
				<hr class="my-4">
				<div class="row mt-2">
					<div class="col-md-6">
						<div class="bw">
							<h4 class="display">Productos en el carrito</h4>
							<br>
							<?php
							//Esta es la consula para obtener todos los productos de la base de datos.
							$products = $con->query("select * from product");
							if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
							?>
							<table class="table table-bordered table-sm">
							<thead class="bg-secondary">
								<th class="text-white">Cant.</th>
								<th class="text-white">Producto</th>
								<th class="text-white"></th>
							</thead>
							<?php 
							//Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
							foreach($_SESSION["cart"] as $c):
							$products = $con->query("select * from product where id=$c[product_id]");
							$r = $products->fetch_object();
							?>
							<tr>
								<td width="40"><?php echo $c["q"];?></td>
								<td><?php echo $r->name;?></td>
								<td width="40">
								<?php
								$found = false;
								foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}
								?>
									<a href="php/delfromcart.php?id=<?php echo $c["product_id"];?>" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></a>
								</td>
							</tr>
							<?php endforeach; ?>
							</table>							
						</div>
						<br>											
					</div>
					<div class="col-md-6">
						<div class="bw">
							<h4 class="display">Destino</h4>
							<form class="form-group" method="post" action="./php/process.php">
								<div class="row">
								    <div class="col-md-12">
						                <label>Seleccionar Cliente</label>
						                <select class="form-control" name="email" id="email" required>
						                	<option selected>Seleccionar..</option>
						                	<?php
						                	include "php/conection.php";
						                	$query_clientes=mysqli_query($con,"select * from cliente order by nombre_cliente");  
						                	while($rw=mysqli_fetch_array($query_clientes)) {  
						                	?>  
						                	<option><?php echo $rw['nombre_cliente']; ?></option>

					                	<?php
					                	}
					                	?>
					                	</select>	 
								    </div>
								    <div class="col-md-12">
								    	<label>Fecha de Entrega: </label>
				            			<input class="form-control" type="date" name="fecha" id="fecha" required>
								    </div>
								    <div class="col-md-12">
								    	<label>Observaciones: </label>
				            			<textarea class="form-control" name="obs" id="obs" rows="4"></textarea>
								    </div>
								    <div class="col-md-12">
								    	<label>Total a Pagar: </label>
				            			<input class="form-control" type="number" name="total" id="total" step="00.1" required>
				            			<hr>
								    </div>								    				    
								    <div class="col-md-12">
								    	<input type="submit" class="btn btn-success btn-block pay" value="Finalizar Pedido">
								    </div>						
								</div>
							</form>								
						</div>					
					</div>
				</div>
				<?php else:?>
					<p class="alert alert-warning">El carrito esta vacio.</p>
				<?php endif;?>
			</div>
		</div>
	</div>
</body>
</html>