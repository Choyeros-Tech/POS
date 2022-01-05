<?php
    error_reporting(0);
    require("../connections/connection.php");
    $consulta = 'SELECT * FROM articulos WHERE codigo = "'.$_POST['codigo'].'"';
    $ejecutar = mysqli_query($mysqli, $consulta);
    $result = mysqli_fetch_assoc($ejecutar);
    if($ejecutar){
        if (count($result)>0) {
            echo json_encode(array('status'=>true,'message'=>$result));
        }else{
            echo json_encode(array('status'=>false,'message'=>'Articulo no encontrado'));
        }
    }else{
        echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
    }

?>