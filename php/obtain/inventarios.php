<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT a.nombre, a.codigo, i.cantidad, a.costo_venta, a.costo_mayoreo, a.costo_compra, m.nombre FROM articulos a INNER JOIN inventario i ON a.id = i.id INNER JOIN marcas m ON a.marca = m.id";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($articulo = mysqli_fetch_row($ejecutar))
	{
		echo '<tr>';
		echo '<td>'.$articulo[0].'</td>';
		echo '<td>'.$articulo[1].'</td>';
		echo '<td>'.$articulo[2].'</td>';
		echo '<td>$'.$articulo[3].'</td>';
		echo '<td>$'.$articulo[4].'</td>';
		echo '<td>$'.$articulo[5].'</td>';
		echo '<td>'.$articulo[6].'</td>';
		echo '<tr>';
	}
}

?>
