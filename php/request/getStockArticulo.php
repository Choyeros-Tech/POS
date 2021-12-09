<?php
    require("../connections/connection.php");
    $idArticulo = $_POST['idArticulo'];

    $query = "select * FROM inventario WHERE articulo = '".$idArticulo."'";

    $ejecutar = mysqli_query($mysqli, $query);
    $resultado = mysqli_fetch_assoc($ejecutar);

    if($resultado){
        echo json_encode(array('status'=>true,'message'=>$resultado['cantidad']));
    }
    else
    {
        echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
    }

?>