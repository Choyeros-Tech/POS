<?php
require("../connections/connection.php");

$nombre = $_POST['nombre'];
$venta = $_POST['venta'];
$compra = $_POST['compra'];
$mayoreo = $_POST['mayoreo'];
$marca = $_POST['marca'];

$obtener= "SELECT id FROM inventario ORDER BY id DESC LIMIT 1 ";
$resultado = mysqli_query($mysqli, $obtener) or die("<h2>Error de MySQL.</h2>". mysql_error());
$row=mysqli_fetch_assoc($resultado);
$consecutivo=$row["id"]+1;


$registrar = "INSERT INTO articulos(id, nombre, costo_venta, costo_mayoreo, costo_compra, marca) VALUES ('$consecutivo', '$nombre', '$venta', '$mayoreo', '$compra', '$marca')";
$ejecutar = mysqli_query($mysqli, $registrar);
if($ejecutar)
{
	$agregar_inventario = "INSERT INTO inventario(articulo) VALUES('$consecutivo')";
	$res_inventario = mysqli_query($mysqli, $agregar_inventario);
	if($res_inventario)
	{
		echo "<script>location.href='../interfaces/articulos.php?registrado=true'</script>";
	}
	
}
else
{
	echo mysqli_error($mysqli);
}



?>