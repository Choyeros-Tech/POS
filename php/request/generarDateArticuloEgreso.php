<?php
error_reporting(0);
require("../connections/connection.php");


$filtro = ($_POST['tipoArticulo']!='Todo')?'articulo="'.$_POST['tipoArticulo'].'" AND' : '';
$consulta = "SELECT * FROM salidas WHERE ".$filtro." fecha between '".$_POST['dateInicioArticulo']."' AND '".$_POST['dateFinArticulo']."'";

$ejecutar = mysqli_fetch_all(mysqli_query($mysqli, $consulta), MYSQLI_ASSOC);

if($ejecutar){
    echo json_encode(array('status'=>true,'message'=>$ejecutar));
}else{
    if (count($ejecutar)<=0) {
        echo json_encode(array('status'=>false,'message'=>'Sin Datos'));
    }else{
        echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
    }
}

?>