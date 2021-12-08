<?php
if(!isset($_SESSION)) 
{ 
	session_start();
}
require("../connections/connection_admin.php");

$identificador = "1";

$Query_datos 	= "SELECT * FROM configuracion WHERE id = '$identificador'";
$Resul_datos 	= mysqli_query($admin, $Query_datos);
if($Resul_datos)
{
	$Generales 		= mysqli_fetch_assoc($Resul_datos);
	$Tienda 		= $Generales['nombre'];
	$Telefono 		= $Generales['telefono'];
	$Correo 		= $Generales['correo'];
	$Direccion		= $Generales['direccion'];
	$Eslogan		= $Generales['eslogan'];
	$Direccion		= $Generales['direccion'];
	$BD				= $Generales['BD'];
	$Logo				= $Generales['logo'];
}
else
{
	echo mysqli_error($admin);
}

$Nombre 		= $_SESSION['nombre'];
$Nivel 			= $_SESSION['nivel'];
$Usuario 		= $_SESSION['usuario'];
$Id 			= $_SESSION['id_usuario'];





?>