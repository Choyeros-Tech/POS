<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT id, nombre FROM clientes order by nombre";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($cliente = mysqli_fetch_row($ejecutar))
	{
		echo '<option value="'.$cliente[0].'">'.$cliente[1].'</option>';
	}
}

?>
