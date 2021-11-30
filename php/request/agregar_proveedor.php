<?php
require("../connections/connection.php");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

$registrar = "INSERT INTO proveedores(nombre, direccion, telefono, correo) VALUES ('$nombre', '$direccion', '$telefono', '$correo')";
$ejecutar = mysqli_query($mysqli, $registrar);
if($ejecutar)
{
	echo "<script>location.href='../interfaces/proveedores.php?registrado=true'</script>";
}
else
{
	echo mysqli_error($mysqli);
}



?>