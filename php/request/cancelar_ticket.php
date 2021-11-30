<?php
require("../connections/connection.php");

$nticket = $_POST['nticket'];




$registrar = "UPDATE ventas SET activo = '1' WHERE id_venta = '$nticket'";
$ejecutar = mysqli_query($mysqli, $registrar);
if($ejecutar)
{
	echo "<script>location.href='../interfaces/administrador.php?registrado=true'</script>";
	
}
else
{
	echo mysqli_error($mysqli);
}

?>