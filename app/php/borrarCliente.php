<?php
require_once ("../conexion/db.php");
require_once ("../conexion/conexion.php");
$id = $_GET['id'];
$sql = "DELETE FROM cliente WHERE id_cliente = '$id'";
if ($conn->query($sql) === TRUE) {
	header("Location:../home.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>