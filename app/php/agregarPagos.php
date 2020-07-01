<?php
include "conection.php";
$id= $_GET['id'];
$fecha = $_POST["fecha"];
$importe = $_POST["importe"]; 
$sql = "INSERT INTO cuenta (cliente, fecha, importe) values ('$id', '$fecha', '$importe')";
if ($con->query($sql) === TRUE) {
  header("Location:../clientes.php");
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
?>