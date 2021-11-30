<?php
require("../connections/connection.php");

$articulo = $_POST['articulo'];
$tipocobro = $_POST['tipocobro'];
$cantidad = $_POST['cantidad'];

$datos = "SELECT a.costo_venta as venta, a.costo_mayoreo as mayoreo, i.cantidad as cantidad, a.nombre as nombre FROM articulos a INNER JOIN inventario i ON a.id = i.articulo WHERE a.id = '$articulo'";
$ejecutar = mysqli_query($mysqli, $datos);
if($ejecutar)
{
	$datos = mysqli_fetch_assoc($ejecutar);
	if($cantidad > $datos['cantidad'])
	{
		echo 'stock'; //sin stock suficiente
	}
	else
	{
		if($tipocobro == "Normal")
		{
			echo $datos['nombre'].",".$datos['venta'];
		}
		else
		{
			echo $datos['nombre'].",".$datos['mayoreo'];
		}
	}
}
?>