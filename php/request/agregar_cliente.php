<?php
require("../connections/connection.php");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

$registrar = "INSERT INTO clientes(nombre, direccion, telefono, correo) VALUES ('$nombre', '$direccion', '$telefono', '$correo')";
$ejecutar = mysqli_query($mysqli, $registrar);
if($ejecutar){
	echo json_encode(array('status'=>true,'message'=>'Cliente registrado'));
}else{
	echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}



?>