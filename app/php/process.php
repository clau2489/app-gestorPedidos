<?php 
session_start();
include "conection.php";
$estado = "Pendiente";
if(!empty($_POST)){
	$q1 = $con->query("insert into cart(client_email, fecha, obs, total, estado, created_at) value (\"$_POST[email]\",\"$_POST[fecha]\",\"$_POST[obs]\",\"$_POST[total]\", \"$estado\", NOW())");
	if($q1){
		$cart_id = $con->insert_id;
		foreach($_SESSION["cart"] as $c){
			$q1 = $con->query("insert into cart_product(product_id,q,cart_id) value($c[product_id],$c[q],$cart_id)");
		}
		unset($_SESSION["cart"]);
	}
}
print "<script>alert('Venta procesada exitosamente');window.location='../pedidos-pendientes.php';</script>";
?>