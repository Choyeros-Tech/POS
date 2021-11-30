<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT a.nombre, a.costo_venta, a.costo_mayoreo, a.costo_compra, m.nombre FROM articulos a INNER JOIN marcas m ON a.marca = m.id ORDER BY a.nombre";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($cliente = mysqli_fetch_row($ejecutar))
	{
		echo '<tr>';
		echo '<td>'.$cliente[0].'</td>';
		echo '<td>$'.$cliente[1].'</td>';
		echo '<td>$'.$cliente[2].'</td>';
		echo '<td>$'.$cliente[3].'</td>';
		echo '<td>'.$cliente[4].'</td>';
		echo '<tr>';
	}
}

?>