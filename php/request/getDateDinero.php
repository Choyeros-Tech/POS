<?php
error_reporting(0);
require("../connections/connection.php");
$filtro = ($_POST['tipoEfectivo']!='Todo')?'concepto="'.$_POST['tipoEfectivo'].'" AND' : '';
$consulta = "SELECT * FROM efectivo WHERE ".$filtro." fecha between '".$_POST['dateInicioDinero']."' AND '".$_POST['dateFinDinero']."'";

$ejecutar = mysqli_fetch_all(mysqli_query($mysqli, $consulta), MYSQLI_ASSOC);

if($ejecutar){
    echo json_encode(array('status'=>true,'message'=>$ejecutar));
}else{
    echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}

?>