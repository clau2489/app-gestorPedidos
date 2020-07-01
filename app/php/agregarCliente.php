<?php
include "conection.php";
$cod = $_POST["codigocliente"];
$nom = $_POST["nombrecliente"];
$fecha = date();
$importe = 0;
$sql = "INSERT INTO cliente (codigo_cliente, nombre_cliente) VALUES ('$cod', '$nom')";
if ($con->query($sql) === TRUE) {
	$s = $con->query("INSERT INTO cuenta (cliente, fecha, importe) VALUES ('$nom', '$fecha', '$importe')");
	header("Location:../clientes.php");
} else {
	echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
?>