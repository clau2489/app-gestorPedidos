<?php
	require_once ("conexion/db.php");
	require_once ("conexion/conexion.php");

	$id = $_POST["id_cliente"];

	$sql = "DELETE FROM cliente WHERE id_cliente = '$id'";

	if ($conn->query($sql) === TRUE) {
		  header("Location: index.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

?>