<?php
error_reporting(0);
require("../connections/connection.php");
$tipoCort= $_POST["option"];
$usuario = $_SESSION['nombre'];
if ($tipoCort == 'Turno') {
    $consulta = "SELECT  vent.cantidad, vent.precio, art.costo_compra FROM ventas vent LEFT JOIN articulos art ON vent.articulo = art.id WHERE fecha = '".date('Y-m-d')."' AND empleado = '".$usuario."'";
    $ventas = mysqli_query($mysqli, $consulta);
    if($ventas){
        $ventasTotatles = 0;
        $ventasSinGanancia = 0;
        
        while($venta = mysqli_fetch_assoc($ventas)){
            $ventasTotatles += $venta['cantidad']*$venta['precio'];
            $ventasSinGanancia += $venta['cantidad']*$venta['costo_compra'];
    
        }
    }
    $fondoCaja = "SELECT efectivo,concepto,eos FROM efectivo WHERE fecha = '".date('Y-m-d')."' AND ISNULL(corte)";
    $fondoCajaResp = mysqli_query($mysqli, $fondoCaja);
    if($fondoCajaResp){
        $ventasEfectivo = 0;
        while($efectCaja = mysqli_fetch_assoc($fondoCajaResp)){
            if ($efectCaja['concepto'] == 'Fondo de Caja') {
                $fondoInicial = $efectCaja['efectivo'];
            }
            if ($efectCaja['eos'] == 'entrada' && $efectCaja['concepto'] == 'Venta') {
                $ventasEfectivo += $efectCaja['efectivo'];
            }
            if ($efectCaja['eos'] == 'entrada' && $efectCaja['concepto'] == 'Recibo de Dinero') {
                $entradasEfectivo += $efectCaja['efectivo'];
            }
            if ($efectCaja['eos'] == 'salida') {
                $salidaEfectivo += $efectCaja['efectivo'];
            }
        }
    }
    $ventaTarjeta = "SELECT efectivo,concepto,eos FROM tarjeta WHERE fecha = '".date('Y-m-d')."' AND ISNULL(corte)";
    $ventaTarjetaResp = mysqli_query($mysqli, $ventaTarjeta);
    if($ventaTarjetaResp){
        $ventasTarjeta = 0;
        while($efectTarjeta = mysqli_fetch_assoc($ventaTarjetaResp)){
            if ($efectTarjeta['eos'] == 'entrada' && $efectTarjeta['concepto'] == 'Venta') {
                $ventasTarjeta += $efectTarjeta['efectivo'];
            }
        }
    }
    
}
if($ventas){
    echo json_encode(array('status'=>true,'message'=>[
        'ventasTotatles'=>$ventasTotatles,
        'ganancias'=>$ventasTotatles-$ventasSinGanancia,
        'fondoInicial'=>intVal($fondoInicial),
        'ventasEfectivo'=>intVal($ventasEfectivo),
        'entradasEfectivo'=>intVal($entradasEfectivo),
        'salidaEfectivo'=>intVal($salidaEfectivo),
        'ventasTarjeta'=>intVal($ventasTarjeta),
    ]));
}else{
    echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}

?>