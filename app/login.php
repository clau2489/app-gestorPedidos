<?php
$usuario_correcto = "provpellejero";
$contrasenia_correcta = "provpellejero123?";

$usuario = $_POST["usuario"];
$contrasenia = $_POST["contrasenia"];
if ($usuario === $usuario_correcto && $contrasenia === $contrasenia_correcta) {
    session_start();
    $_SESSION["usuario"] = $usuario;
    header("Location:products.php");
} else {
    header("Location:index.php");
}
?>