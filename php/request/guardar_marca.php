<?php
require("../connections/connection.php");
$nombre = $_POST['nombre'];

$registrar = "INSERT INTO marcas(nombre) VALUES ('$nombre')";
$ejecutar = mysqli_query($mysqli, $registrar);
if($ejecutar)
{
	echo "<script>location.href='../interfaces/articulos.php?registrado=true'</script>";	
}
else
{
	echo mysqli_error($mysqli);
}



?>