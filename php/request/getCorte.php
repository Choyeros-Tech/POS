<?php
error_reporting(0);
require("../connections/connection.php");
$tipoCort= $_POST["option"];
$usuario = $_SESSION['nombre'];
if ($tipoCort == 'Turno') {
    $consulta = "SELECT  vent.cantidad, vent.precio, vent.tipo_pago, art.costo_compra FROM ventas vent LEFT JOIN articulos art ON vent.articulo = art.id WHERE fecha = '".date('Y-m-d')."' AND empleado = '".$usuario."' AND ISNULL(vent.corte)";
    $ventas = mysqli_query($mysqli, $consulta);
    if($ventas){
        $ventasTotatles = 0;
        $ventasSinGanancia = 0;
        $ventasTotalesEfectivo = 0;
        $ventasTotalesTarjeta = 0;
        $ventasTotalesMixto = 0;
        
        while($venta = mysqli_fetch_assoc($ventas)){
            $ventasTotatles += $venta['cantidad']*$venta['precio'];
            $ventasSinGanancia += $venta['cantidad']*$venta['costo_compra'];
            switch ($venta['tipo_pago']) {
                case 'Efectivo':
                    $ventasTotalesEfectivo += $venta['cantidad']*$venta['precio'];
                    break;
                case 'Tarjeta':
                    $ventasTotalesTarjeta += $venta['cantidad']*$venta['precio'];
                    # code...
                    break;
                case 'Mixto':
                    $ventasTotalesMixto += $venta['cantidad']*$venta['precio'];
                    break;
            }
    
        }
    }
    $fondoCaja = "SELECT efec.efectivo,efec.concepto,efec.eos,efec.corte FROM efectivo efec LEFT JOIN ventas vent on efec.id_venta = vent.id_venta  WHERE efec.fecha = '".date('Y-m-d')."' AND ISNULL(vent.corte)";
    $fondoCajaResp = mysqli_query($mysqli, $fondoCaja);
    if($fondoCajaResp){
        $ventasEfectivo = 0;
        while($efectCaja = mysqli_fetch_assoc($fondoCajaResp)){
            if ($efectCaja['concepto'] == 'Fondo de Caja' && empty($efectCaja['corte'])) {
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
    $ventaTarjeta = "SELECT tarj.efectivo,tarj.concepto,tarj.eos FROM tarjeta tarj LEFT JOIN ventas vent on tarj.id_venta = vent.id_venta  WHERE tarj.fecha = '".date('Y-m-d')."' AND ISNULL(vent.corte)";
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
        'ventasTotalesEfectivo'=>intVal($ventasTotalesEfectivo),
        'ventasTotalesTarjeta'=>intVal($ventasTotalesTarjeta),
        'ventasTotalesMixto'=>intVal($ventasTotalesMixto),
    ]));
}else{
    echo json_encode(array('status'=>false,'message'=>mysqli_error($mysqli)));
}

?>