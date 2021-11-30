<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT id, nombre FROM articulos order by nombre";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($articulo = mysqli_fetch_row($ejecutar))
	{
		echo '<option value="'.$articulo[0].'">'.$articulo[1].'</option>';
	}
}

?>
