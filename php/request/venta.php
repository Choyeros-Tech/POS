<?php
error_reporting(0);
require("../connections/connection.php");
require("../configuration/config.php");

$cliente = $_POST['cliente'];
$mpago = $_POST['mpago'];
$referencia = $_POST['referencia'];
$cambio = $_POST['cambio'];
$efectivo = $_POST['efectivo'];
$tarjeta = $_POST['tarjeta'];

$data = json_decode($_POST['array']);

$obtener= "SELECT id_venta FROM ventas ORDER BY id DESC LIMIT 1 ";
$resultado = mysqli_query($mysqli, $obtener) or die("<h2>Error de MySQL.</h2>". mysql_error());
$row=mysqli_fetch_assoc($resultado);
$consecutivo=$row["id_venta"]+1;

$fecha = date("Y-m-d");
$hora = date("H:i:s");

switch ($mpago) {
	case 'Tarjeta':
		$queryIngresoTarjeta = "INSERT INTO tarjeta(efectivo, concepto, fecha, hora, eos, usuario, id_venta) VALUES ('".$_POST['pago']."', 'Venta', '$fecha', '$hora', 'entrada', '".$_SESSION['nombre']."', '$consecutivo')";
		$res = mysqli_query($mysqli, $queryIngresoTarjeta);

		break;
	case 'Efectivo':
		$queryIngresoEfect = "INSERT INTO efectivo(efectivo, concepto, fecha, hora, eos, usuario, id_venta) VALUES ('".$_POST['pago']."', 'Venta', '$fecha', '$hora', 'entrada', '".$_SESSION['nombre']."', '$consecutivo')";
		$res = mysqli_query($mysqli, $queryIngresoEfect);

		break;
	case 'Mixto':
		$queryIngresoEfect = "INSERT INTO efectivo(efectivo, concepto, fecha, hora, eos, usuario, id_venta) VALUES ('".$_POST['efectivo']."', 'Venta', '$fecha', '$hora', 'entrada', '".$_SESSION['nombre']."', '$consecutivo')";
		$queryIngresoTarjeta = "INSERT INTO tarjeta(efectivo, concepto, fecha, hora, eos, usuario, id_venta) VALUES ('".$_POST['tarjeta']."', 'Venta', '$fecha', '$hora', 'entrada', '".$_SESSION['nombre']."', '$consecutivo')";
		$resTar = mysqli_query($mysqli, $queryIngresoTarjeta);
		$resEfec = mysqli_query($mysqli, $queryIngresoEfect);
		break;
}
if ($_POST['cambio']>0) {
	$queryIngresoEfect = "INSERT INTO efectivo(efectivo, concepto, fecha, hora, eos, usuario, id_venta) VALUES ('".$_POST['cambio']."', 'Venta', '$fecha', '$hora', 'salida', '".$_SESSION['nombre']."', '$consecutivo')";
	$resEfecFeria = mysqli_query($mysqli, $queryIngresoEfect);
}
for($i=0; $i< sizeof($data); $i++)
{
	$articulo = $data[$i]->articulo;
	$cantidad = $data[$i]->cantidad;
	$precio = $data[$i]->precio;
	$total = $cantidad * $precio;

	$contador_errores = 0;

	$query_cotizacion = "INSERT INTO ventas(id_venta, articulo, cantidad, precio, fecha, hora, empleado, cliente, tipo_pago, referencia) VALUES ('$consecutivo', '$articulo', '$cantidad', '$precio', '$fecha', '$hora', '$Nombre', '$cliente', '$mpago', '$referencia')";
	
	$res = mysqli_query($mysqli, $query_cotizacion);
	if($res)
	{
		//echo "guardardo";
		//restar inventario
		$consultar_inventario = "SELECT * FROM inventario WHERE articulo = '$articulo'";
		$res_inventario = mysqli_query($mysqli, $consultar_inventario);
		if($res_inventario)
		{
			$inventario = mysqli_fetch_assoc($res_inventario);
			$restante = $inventario['cantidad'] - $cantidad;
			$actualizar_inventario = "UPDATE inventario SET cantidad = '$restante' WHERE articulo = '$articulo'";
			$res_actualizar = mysqli_query($mysqli, $actualizar_inventario);
			if($res_actualizar)
			{
				echo base64_encode($consecutivo);
			}
			else
			{
				echo "error";
			}
		}
		else
		{
			echo "error";
		}

	}
	else
	{
		echo mysqli_error($mysqli);
		$contador_errores++;
	}
	
}


?>