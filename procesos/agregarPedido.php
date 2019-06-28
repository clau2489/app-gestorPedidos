  <?php
	require_once ("../conexion/db.php");
	require_once ("../conexion/conexion.php");

	$cliente = $_POST["cliente"];
	$producto = $_POST["producto"];
	$precio = $_POST["precio"];
	$kilos = $_POST["kilos"];
	$fecha = $_POST["fecha"]; 

	$sql = "INSERT INTO pedidos (cliente, producto, precio, cant_kilos, fecha) VALUES ('$cliente', '$producto', '$precio', '$kilos', '$fecha')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: ../verListaPedidos.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
	}

	$conn->close();
  ?>