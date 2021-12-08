<?php
require("../configuration/config.php");
require("../connections/connection.php");

$cantidad = $_POST['cantidad'];
$tipo = $_POST['tipo'];
$otro = $_POST['otro'];
$proveedor = $_POST['proveedor'];

$fecha = date("Y-m-d");
$hora = date("H:i:s");
//$NOMBRE
if($tipo == "Otro")
{
	$query = "INSERT INTO efectivo(efectivo, concepto, fecha, hora, eos, proveedor, usuario) VALUES ('$cantidad', '$otro', '$fecha', '$hora', 'salida', '$proveedor', '$Nombre')";
}
else
{
	$query = "INSERT INTO efectivo(efectivo, concepto, fecha, hora, eos, proveedor, usuario) VALUES ('$cantidad', '$tipo', '$fecha', '$hora', 'salida', '$proveedor', '$Nombre')";
}

$ejecutar = mysqli_query($mysqli, $query);
if($ejecutar){
	echo json_encode(array('status'=>true,'message'=>'Pago realizado correctamente'));
}else{
	echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}

?>