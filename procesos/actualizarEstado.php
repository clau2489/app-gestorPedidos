<?php
require_once ("../conexion/db.php");
require_once ("../conexion/conexion.php");
$id = $_GET['id'];
$estado = "Entregado";
$sql = "UPDATE pedidos SET estado='$estado' WHERE id_pedido='$id'";
if ($conn->query($sql) === TRUE) {
	header("Location:../pedidos-pendientes.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
}
$conn->close();
?>