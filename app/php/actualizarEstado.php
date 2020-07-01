<?php
session_start();
include "conection.php";
$id = $_GET['id'];
$estado = "Entregado";
$sql = "UPDATE cart SET estado='$estado' WHERE id='$id'";
if ($con->query($sql) === TRUE) {
	header("Location:../pedidos-pendientes.php");
} else {
	echo "Error: " . $sql . "<br>" . $con->error; //Redireccion de la página
}
?>