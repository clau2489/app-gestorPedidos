<?php
require_once ("../conexion/db.php");
require_once ("../conexion/conexion.php");
$id= $_GET['id'];
$fecha = $_POST["fecha"];
$importe = $_POST["importe"]; 
$sql = "INSERT INTO pagos (id_cliente, fecha, importe) VALUES ('$id', '$fecha', '$importe')";
if ($conn->query($sql) === TRUE) {
  header("Location:../clientes.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
}
$conn->close();
?>