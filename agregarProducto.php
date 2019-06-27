  <?php
	/* Connect To Database*/
	require_once ("db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("conexion.php");//Contiene funcion que conecta a la base de datos


	$cod = $_POST["codigocliente"];
	$nom = $_POST["nombrecliente"]; 

	$sql = "INSERT INTO cliente (codigo_cliente, nombre) VALUES ('$cod', '$nom')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: index.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
	}

	$conn->close();
  ?>