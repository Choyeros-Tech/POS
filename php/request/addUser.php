<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "INSERT INTO usuarios (`usuario`, `password`, `nombre`, `direccion`, `telefono`, `correo`, `id_negocio`, `nivel`) VALUES ('".$_POST['usuario']."', '".md5($_POST['password'])."', '".$_POST['nombre']."', '".$_POST['direccion']."', '".$_POST['telefono']."', '".$_POST['correo']."', '".$_SESSION['id_negocio']."', '".$_POST['nivel']."');
";
$ejecutar = mysqli_query($mysqli, $consulta);

if($ejecutar){
    echo json_encode(array('status'=>true,'message'=>'Usuario guardado'));
}else{
    echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}

?>