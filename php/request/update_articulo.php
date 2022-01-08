<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "UPDATE articulos SET `nombre` = '".$_POST['nombre']."', `costo_venta` = '".$_POST['venta']."', `costo_mayoreo` = '".$_POST['mayoreo']."', `costo_compra` = '".$_POST['compra']."', `marca` = '".$_POST['marca']."', `codigo` = '".$_POST['codigo']."', `unidad_medida` = '".$_POST['unidad_medida']."', `ganancia` = '".$_POST['ganancia']."', `not_min_check` = '".$_POST['not_min_check']."', `cant_min` = '".$_POST['cant_min']."' WHERE `id` = '".$_POST['idArt']."';";
$ejecutar = mysqli_query($mysqli, $consulta);

if($ejecutar){
    echo json_encode(array('status'=>true,'message'=>'Datos actualizados'));
}else{
    echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}

?>