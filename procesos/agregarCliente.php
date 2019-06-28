  <?php
	require_once ("../conexion/db.php");
	require_once ("../conexion/conexion.php");

	$cod = $_POST["codigocliente"];
	$nom = $_POST["nombrecliente"]; 

	$sql = "INSERT INTO cliente (codigo_cliente, nombre) VALUES ('$cod', '$nom')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: ../gestionClientes.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
	}

	$conn->close();
  ?>