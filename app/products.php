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
					<div class="col-md-10">
						<h4 class="display">Productos</h1>
					</div>
					<div class="col-md-2">
											
					</div>					
				</div>
				<hr>
				<div class="row mt-2 text-center">
					<?php
					$products = $con->query("select * from product");
					while($r=$products->fetch_object()):?>
						
						<div class="col-md-3 prods">

								<div class="imagen_carrito">
									<?php $img = $r->img; echo '<img style="width: 100%" src="data:image/jpeg;base64,'.base64_encode($img).'"/>'; ?>
								</div>

								<div class="nombre_carrito">
									<h4 class="display"><?php echo $r->name;?></h4>
								</div>
								
								<?php
								$found = false;
								if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}}
								?>
								<?php if($found):?>

								<div class="descripcion_carrito">
									<p><?php echo $r->descripcion;?></p>
								</div>
								
								<div class="agregado_carrito">
									<a href="cart.php" class="btn btn-success btn-block btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Agregado</a>
								</div>								
									
								<?php else:?>
								
								<div class="descripcion_carrito">
									<p class="descripcion"><?php echo $r->descripcion;?></p>
								</div>
								
								<div class="form_carrito">
									<form method="post" action="./php/addtocart.php">
										<input type="hidden" name="product_id" value="<?php echo $r->id; ?>">
									  	<div class="form-group">
									  		<label>Cantidad por Kilos</label>
									    	<input type="number" name="q" value="1" min="1" class="form-control" placeholder="Cantidad" step="00.1">
									  	</div>
									  	<button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar</button>
									</form>											
								</div>

							<?php endif; ?>
						</div>
							
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php';?>
</body>
</html>