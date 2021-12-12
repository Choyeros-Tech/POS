<?php
require("../configuration/config.php");
require("../connections/connection.php");

$cantidad = $_POST['cantidad'];
$tipo = $_POST['tipo'];
$otro = (isset($_POST['otro'])?$_POST['otro']:'');
$fecha = date("Y-m-d");
$hora = date("H:i:s");

$obtener= "SELECT id FROM efectivo ORDER BY id DESC LIMIT 1 ";
$resultado = mysqli_query($mysqli, $obtener) or die("<h2>Error de MySQL.</h2>". mysql_error());
if (mysqli_num_rows($resultado)>0) {
	$row=mysqli_fetch_assoc($resultado);
	$consecutivo=$row["id"]+1;
}else {
	$consecutivo=1;
}



//$NOMBRE
if($tipo == "Otro")
{
	$query = "INSERT INTO efectivo(id, efectivo, concepto, fecha, hora, eos, usuario) VALUES ('$consecutivo', '$cantidad', '$otro', '$fecha', '$hora', 'entrada', '$Nombre')";
}
else
{
	$query = "INSERT INTO efectivo(id, efectivo, concepto, fecha, hora, eos, usuario) VALUES ('$consecutivo', '$cantidad', '$tipo', '$fecha', '$hora', 'entrada', '$Nombre')";
}

$ejecutar = mysqli_query($mysqli, $query);
if($ejecutar)
{
	if(isset($_POST['inicial']))
	{
		echo json_encode(array('status'=>true,'message'=>'Guardado realizado correctamente'));

	}
	elseif($tipo == "Recibo de Dinero")
	{
		echo json_encode(array('status'=>true,'message'=>'Guardado de efectivo realizado correctamente','recibo'=>true,'reciboMessage'=>'../interfaces/recibo.php?id='.$consecutivo));


	}
	else
	{
		echo json_encode(array('status'=>true,'message'=>'Guardado de efectivo realizado correctamente'));
	}
	
}
else
{
	echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));

}


?>