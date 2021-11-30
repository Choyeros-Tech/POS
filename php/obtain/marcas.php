<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT * FROM marcas ORDER BY nombre";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($marcas = mysqli_fetch_row($ejecutar))
	{
		echo '<li>'.$marcas[1].'</li>';
	}
}

?>
