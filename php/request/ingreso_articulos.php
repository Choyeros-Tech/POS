<?php
require("../configuration/config.php");
require("../connections/connection.php");

$articulo = $_POST['articulo'];
$cantidad = $_POST['cantidad'];
$fecha = date("Y-m-d");
$hora = date("H:i:s");

$query = "INSERT INTO entradas(cantidad, articulo, fecha, hora, usuario) VALUES ('$cantidad', '$articulo', '$fecha', '$hora', '$Nombre')";

$ejecutar = mysqli_query($mysqli, $query);
if($ejecutar)
{
	$cantidad_inventario = "SELECT cantidad FROM inventario WHERE articulo = '$articulo'";
	$res_inventario = mysqli_query($mysqli, $cantidad_inventario);
	if($res_inventario)
	{
		$contar = mysqli_fetch_assoc($res_inventario);
		$total_mercancia = $cantidad + $contar['cantidad'];

		$actualizar_inventario = "UPDATE inventario SET cantidad = '$total_mercancia' WHERE articulo = '$articulo'";
		$res_actualiar = mysqli_query($mysqli, $actualizar_inventario);
		if($res_actualiar)
		{
			echo "<script>location.href='../interfaces/ingresos.php?registrado=true&ingreso=mercancia'</script>";
		}
		else
		{
			echo "1".mysqli_error($mysqli);
		}

	} 
	else
	{
		echo "2".mysqli_error($mysqli);
	}

}
else
{
	echo "3".mysqli_error($mysqli);
}


?>