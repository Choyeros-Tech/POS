<?php
error_reporting(0);
require("../connections/connection.php");
$tipoCort= $_POST["option"];
$usuario = $_SESSION['nombre'];
if ($tipoCort == 'Turno') {
    $consulta = "SELECT  vent.cantidad, vent.precio, art.costo_compra FROM ventas vent LEFT JOIN articulos art ON vent.articulo = art.id WHERE fecha = '".date('Y-m-d')."' AND empleado = '".$usuario."' ";
    $ventas = mysqli_query($mysqli, $consulta);
    $fondoCaja = "SELECT efectivo FROM efectivo WHERE fecha = '".date('Y-m-d')."' AND concepto = 'Fondo de Caja' AND ISNULL(corte)";
    $fondoCajaResp = mysqli_query($mysqli, $fondoCaja)->fetch_assoc();
    if($ventas)
    {
        $ventasTotatles = 0;
        $ventasSinGanancia = 0;
        while($venta = mysqli_fetch_assoc($ventas)){
            $ventasTotatles += $venta['cantidad']*$venta['precio'];
            $ventasSinGanancia += $venta['cantidad']*$venta['costo_compra'];
    
        }
    }
}
if($ventas){
    echo json_encode(array('status'=>true,'message'=>[
        'ventasTotatles'=>$ventasTotatles,
        'ganancias'=>$ventasTotatles-$ventasSinGanancia,
        'fondoCaja'=>intVal($fondoCajaResp['efectivo']),
    ]));
}else{
    echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}

?>