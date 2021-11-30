<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT v.id_venta, a.nombre, v.cantidad, v.precio, v.fecha, v.hora, v.empleado FROM ventas v INNER JOIN articulos a ON v.articulo = a.id WHERE v.activo = '0' GROUP BY v.id_venta";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($ticket = mysqli_fetch_row($ejecutar))
	{
		echo '<tr>';
		echo '<td>'.$ticket[0].'</td>';
		$id_venta = $ticket[0];
		$total = 0;

		$obtener_total = "SELECT cantidad, precio FROM ventas WHERE id_venta = '$id_venta'";
		$res_total = mysqli_query($mysqli, $obtener_total);
		if($res_total)
		{
			while($datos = mysqli_fetch_assoc($res_total))
			{
				$precio = $datos['cantidad'] * $datos['precio'];
				$total = $total + $precio;
			}
			echo '<td>$'.$total.'</td>';
		}
		echo '<td>'.$ticket[5].'</td>';
		echo '<td>'.$ticket[6].'</td>';
		echo '<td><button onclick="ticket2(\''.base64_encode($ticket[0]).'\');" class="btn btn-rounded btn-info mb-3"><i class="ti-notepad"></i></button></td>';
		echo '<tr>';
	}
}

?>
