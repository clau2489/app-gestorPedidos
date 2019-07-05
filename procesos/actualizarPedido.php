  <?php
	require_once ("../conexion/db.php");
	require_once ("../conexion/conexion.php");

	$id = $_GET['id'];
	$cuenta = $_POST["cuenta"];

	$sql = "UPDATE pedidos SET cuenta='$cuenta' WHERE id_pedido='$id'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: ../detallePedidos.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
	}

	$conn->close();
  ?>