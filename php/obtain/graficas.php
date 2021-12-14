<?php
error_reporting(0);
require("../connections/connection.php");

$hoy = date("Y-m-d");

$query_ventas = "SELECT * FROM ventas WHERE fecha = '$hoy'";
$res_ventas = mysqli_query($mysqli, $query_ventas);
$total_ventas = 0;
$totalEgresoArticulos = 0;
$totalIngresosArticulos = 0;
if($res_ventas)
{
	while($ventas = mysqli_fetch_assoc($res_ventas))
	{
		$cantidad = $ventas['precio'] * $ventas['cantidad'];
		$total_ventas = $total_ventas + $cantidad;
		$totalEgresoArticulos += $ventas['cantidad'];
	}
}
$query_salidas = "SELECT * FROM salidas WHERE fecha = '$hoy'";
$res_Salidas = mysqli_query($mysqli, $query_salidas);
if($res_Salidas)
{
	while($salidas = mysqli_fetch_assoc($res_Salidas))
	{
		$totalEgresoArticulos += $salidas['cantidad'];

	}
}
$query_entradas = "SELECT * FROM entradas WHERE fecha = '$hoy'";
$res_entradas = mysqli_query($mysqli, $query_entradas);
if($res_entradas)
{
	while($entradas = mysqli_fetch_assoc($res_entradas))
	{
		$totalIngresosArticulos += $entradas['cantidad'];

	}
}

$query_ventas_por_usuario = "SELECT SUM(cantidad * precio) as total, empleado from ventas WHERE fecha = '$hoy' GROUP BY empleado ";
$res_ventas_por_usuario = mysqli_query($mysqli, $query_ventas_por_usuario);
$totales_por_usuario = "";
if($res_ventas_por_usuario)
{
	while($porusuario = mysqli_fetch_assoc($res_ventas_por_usuario))
	{
		$totales_por_usuario = $totales_por_usuario.'{y:'.$porusuario['total'].', label: "'.$porusuario['empleado'].'"},';
	}

}
else
{
	echo mysqli_error($mysqli);
}

$query_ingresos = "SELECT SUM(efectivo) as total, eos FROM efectivo WHERE fecha = '$hoy' GROUP BY eos";
$res_ingresos = mysqli_query($mysqli, $query_ingresos);
$ingreso_dinero = 0;
$egreso_dinero = 0;
if($res_ingresos)
{
	while($ie = mysqli_fetch_assoc($res_ingresos))
	{
		if($ie['eos'] == "entrada")
		{
			$ingreso_dinero = $ie['total'];
		}
		else
		{
			$egreso_dinero = $ie['total'];
		}
		
	}
}

$total_ventas = $total_ventas + $ingreso_dinero;
$ingresos_egresos = $ingreso_dinero + $egreso_dinero;
$ingresos_egresosArt = $totalEgresoArticulos + $totalIngresosArticulos;

?> 