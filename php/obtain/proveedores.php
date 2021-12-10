<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT * FROM proveedores ORDER BY nombre";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($proveedores = mysqli_fetch_row($ejecutar))
	{
		echo '<tr>';
		echo '<td>'.$proveedores[1].'</td>';
		echo '<td>'.$proveedores[2].'</td>';
		echo '<td>'.$proveedores[3].'</td>';
		echo '<td>'.$proveedores[4].'</td>';
		echo '</tr>';
	}
}
else
{
	echo mysqli_error($mysqli);
}

?>
