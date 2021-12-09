<?php
require("../connections/connection.php");

$nombre = $_POST['nombre'];
$venta = $_POST['venta'];
$compra = $_POST['compra'];
$mayoreo = $_POST['mayoreo'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];
$codigo = $_POST['codigo'];


$registrar = "INSERT INTO articulos(nombre, costo_venta, costo_mayoreo, costo_compra, marca, codigo) VALUES ('$nombre', '$venta', '$mayoreo', '$compra', '$marca','$codigo')";
$ejecutar = mysqli_query($mysqli, $registrar);

if($ejecutar)
{
	$registrarCantInv = "INSERT INTO inventario(articulo, cantidad) VALUES ('".mysqli_insert_id($mysqli)."', '$cantidad')";
	$ejecutarInv = mysqli_query($mysqli, $registrarCantInv);
	if($ejecutarInv){
		echo json_encode(array('status'=>true,'message'=>'Articulo agregado correctamente'));
	}else{
		echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
	}
}
else
{
	echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}



?>