  <?php
	require_once ("../conexion/db.php");
	require_once ("../conexion/conexion.php");

	$cliente = $_POST["cliente"];
	$producto = $_POST["producto"];
	$precio = $_POST["precio"];
	$kilos = $_POST["kilos"]; 

	$sql = "INSERT INTO pedidos (id_cliente, producto, precio, cant_kilos) VALUES ('$cliente', '$producto', '$precio', '$kilos')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: ../pedidos.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
	}

	$conn->close();
  ?>