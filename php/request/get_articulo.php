<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT a.nombre, a.marca, a.codigo, i.cantidad, a.costo_venta, a.costo_mayoreo, a.costo_compra, m.nombre, a.id FROM articulos a INNER JOIN inventario i ON a.id = i.id INNER JOIN marcas m ON a.marca = m.id WHERE a.id = '".$_POST['id']."'";
$ejecutar = mysqli_query($mysqli, $consulta)->fetch_assoc();

if($ejecutar){
    echo json_encode(array('status'=>true,'message'=>$ejecutar));
}else{
    echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}

?>