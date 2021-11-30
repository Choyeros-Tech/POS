<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT id, nombre FROM marcas order by nombre";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($marcas = mysqli_fetch_row($ejecutar))
	{
		echo '<option value="'.$marcas[0].'">'.$marcas[1].'</option>';
	}
}

?>
