  <?php
	require_once ("../conexion/db.php");
	require_once ("../conexion/conexion.php");

	$id = $_GET['id'];
	$total = $_POST["total"];
	$cuenta = $_POST["cuenta"];
	$saldo = $_POST["saldo"];

	$sql = "UPDATE pedidos SET total='$total', cuenta='$cuenta', saldo='$saldo' WHERE id_pedido='$id'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: ../detallePedidos.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
	}

	$conn->close();
  ?>