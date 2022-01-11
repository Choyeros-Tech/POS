<?php
require("../connections/connection.php");
require("../../assets/plugins/fpdf/fpdf.php");

$empleado = (isset($_POST['empleado'])?$_POST['empleado']:'dia');
$hoy = date("Y-m-d");
$tipo = $_POST['tipo'];
class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../assets/images/logo.jpg', 55, 5, 100 );
			$this->SetFont('Arial','B',15);
			$this->Cell(40);
			$this->Cell(120,30, 'CORTE DE'.((isset($_POST['empleado']))?' '.$_POST['empleado']:'L DIA'),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	if ($tipo == 'Turno') {
		$query = "SELECT a.nombre as articulo, v.cantidad as cantidad, v.precio as precio, v.hora as hora, v.fecha FROM ventas v INNER JOIN articulos a ON a.id = v.articulo WHERE ".(($empleado != 'dia')?'v.empleado = "'.$empleado.'" AND':'')." v.fecha = '$hoy' AND v.activo = '0' AND v.corte IS NULL";
	} else {
		$query = "SELECT a.nombre as articulo, v.cantidad as cantidad, v.precio as precio, v.hora as hora, v.fecha, v.empleado, v.corte FROM ventas v INNER JOIN articulos a ON a.id = v.articulo WHERE v.fecha = '$hoy' AND v.activo = '0'";
	}
	
	$resultado = $mysqli->query($query);
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	

	$contador_total = 0;
	$contador_total_ingresos = 0;
	$contador_total_egresos = 0;
	if ($tipo == 'Turno') {
		$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(85,6,'ARTICULO',1,0,'C',1);
		$pdf->Cell(35,6,'CANTIDAD',1,0,'C',1);
		$pdf->Cell(35,6,'PRECIO',1,0,'C',1);
		$pdf->Cell(35,6,'TOTAL',1,1,'C',1);
		
		$pdf->SetFont('Arial','',10);
		while($row = $resultado->fetch_assoc())
		{
			$pdf->Cell(85,6,utf8_decode(mb_strtoupper($row['articulo'], 'UTF-8')),1,0,'C');
			$pdf->Cell(35,6,$row['cantidad'],1,0,'C');
			$pdf->Cell(35,6,utf8_decode("$".$row['precio']),1,0,'C');
			$total = $row['precio'] * $row['cantidad'];
			$contador_total = $contador_total + $total;
			$pdf->Cell(35,6,utf8_decode("$".$total),1,1,'C');
		}
	}else{
		$array = [];
		while($row = $resultado->fetch_assoc())
		{
			if (!isset($array[$row['corte']])) {
				$array[$row['corte']] = array(array("empleado"=>$row['empleado'],"articulo"=>$row['articulo'],"cantidad"=>$row['cantidad'],"precio"=>$row['precio']));

			}else {
				array_push($array[$row['corte']],array("empleado"=>$row['empleado'],"articulo"=>$row['articulo'],"cantidad"=>$row['cantidad'],"precio"=>$row['precio']));
			}
		}
		foreach ($array as $key => $value) {
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(190,6,utf8_decode($value[0]['empleado']),1,1,'C',1);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(85,6,'ARTICULO',1,0,'C',1);
			$pdf->Cell(35,6,'CANTIDAD',1,0,'C',1);
			$pdf->Cell(35,6,'PRECIO',1,0,'C',1);
			$pdf->Cell(35,6,'TOTAL',1,1,'C',1);
			
			$pdf->SetFont('Arial','',10);
			foreach ($value as $key => $value2) {
				$pdf->Cell(85,6,utf8_decode(mb_strtoupper($value2['articulo'], 'UTF-8')),1,0,'C');
				$pdf->Cell(35,6,$value2['cantidad'],1,0,'C');
				$pdf->Cell(35,6,utf8_decode("$".$value2['precio']),1,0,'C');
				$total = $value2['precio'] * $value2['cantidad'];
				$contador_total = $contador_total + $total;
				$pdf->Cell(35,6,utf8_decode("$".$total),1,1,'C');
			}
		}

	}

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(155,6,utf8_decode("TOTAL VENTAS"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("$".$contador_total),1,1,'C');

	$pdf->Cell(190,6,utf8_decode("INGRESOS A CAJA"),1,1,'C',1);

	

	if ($tipo == 'Turno') {
		$query_ingresos = "SELECT concepto,efectivo, efect.hora as horaEfect FROM efectivo efect LEFT JOIN ventas vent on efect.id_venta = vent.id_venta WHERE efect.eos = 'entrada' ".(($empleado != 'dia')?'AND efect.usuario="'.$empleado.'"':'')." AND efect.fecha = '$hoy' AND ISNULL(efect.corte) AND ISNULL(vent.corte) group by efect.id";
	} else {
		$query_ingresos = "SELECT concepto,efectivo, efect.hora as horaEfect, efect.usuario,efect.corte as corteEfect FROM efectivo efect LEFT JOIN ventas vent on efect.id_venta = vent.id_venta WHERE efect.eos = 'entrada' AND efect.fecha = '$hoy' group by efect.id";
		// var_dump($query_ingresos);
		// exit();
	}
	
	$resultados_ingresos = $mysqli->query($query_ingresos);
	if ($tipo == 'Turno') {
		$pdf->Cell(120,6,utf8_decode("CONCEPTO"),1,0,'C',1);
		$pdf->Cell(35,6,utf8_decode("HORA"),1,0,'C',1);
		$pdf->Cell(35,6,utf8_decode("EFECTIVO"),1,1,'C',1);

		$pdf->SetFont('Arial','',10);
		while($row = $resultados_ingresos->fetch_assoc())
		{
			$pdf->Cell(120,6,utf8_decode(mb_strtoupper($row['concepto'], 'UTF-8')),1,0,'C');
			$pdf->Cell(35,6,$row['horaEfect'],1,0,'C');
			$pdf->Cell(35,6,utf8_decode("$".$row['efectivo']),1,1,'C');
			$total = $row['efectivo'];
			$contador_total_ingresos = $contador_total_ingresos + $total;
		}
	}else{
		$array = [];
		while($row = $resultados_ingresos->fetch_assoc())
		{
			if (!isset($array[$row['corteEfect']])) {
				$array[$row['corteEfect']] = array(array("usuario"=>$row['usuario'],"concepto"=>$row['concepto'],"horaEfect"=>$row['horaEfect'],"efectivo"=>$row['efectivo']));

			}else {
				array_push($array[$row['corteEfect']],array("usuario"=>$row['usuario'],"concepto"=>$row['concepto'],"horaEfect"=>$row['horaEfect'],"efectivo"=>$row['efectivo']));
			}
		}
		foreach ($array as $key => $value) {
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(190,6,utf8_decode($value[0]['usuario']),1,1,'C',1);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(120,6,utf8_decode("CONCEPTO"),1,0,'C',1);
			$pdf->Cell(35,6,utf8_decode("HORA"),1,0,'C',1);
			$pdf->Cell(35,6,utf8_decode("EFECTIVO"),1,1,'C',1);

			$pdf->SetFont('Arial','',10);

			foreach ($value as $key => $value2) {
				$pdf->Cell(120,6,utf8_decode(mb_strtoupper($value2['concepto'], 'UTF-8')),1,0,'C');
				$pdf->Cell(35,6,$value2['horaEfect'],1,0,'C');
				$pdf->Cell(35,6,utf8_decode("$".$value2['efectivo']),1,1,'C');
				$total = $value2['efectivo'];
				$contador_total_ingresos = $contador_total_ingresos + $total;
			}
		}
	}

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(155,6,utf8_decode("TOTAL INGRESOS A CAJA"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("$".$contador_total_ingresos),1,1,'C');

	$pdf->Cell(190,6,utf8_decode("EGRESOS DE CAJA"),1,1,'C',1);


	if ($tipo == 'Turno') {
		$query_ingresos = "SELECT concepto,efect.hora as horaEfect,efectivo FROM efectivo efect LEFT JOIN ventas vent on efect.id_venta = vent.id_venta WHERE efect.eos = 'salida' ".(($empleado != 'dia')?'AND efect.usuario="'.$empleado.'"':'')." AND efect.fecha = '$hoy' AND ISNULL(efect.corte) AND ISNULL(vent.corte) group by efect.id";
	} else {
		$query_ingresos = "SELECT concepto,efect.hora as horaEfect,efectivo,efect.corte as corteEfect, efect.usuario FROM efectivo efect LEFT JOIN ventas vent on efect.id_venta = vent.id_venta WHERE efect.eos = 'salida' AND efect.fecha = '$hoy' group by efect.id";
	}
	
	$resultados_ingresos = $mysqli->query($query_ingresos);
	if ($tipo == 'Turno') {
		$pdf->Cell(120,6,utf8_decode("CONCEPTO"),1,0,'C',1);
		$pdf->Cell(35,6,utf8_decode("HORA"),1,0,'C',1);
		$pdf->Cell(35,6,utf8_decode("EFECTIVO"),1,1,'C',1);

		$pdf->SetFont('Arial','',10);
		while($row = $resultados_ingresos->fetch_assoc())
		{
			$pdf->Cell(120,6,utf8_decode(mb_strtoupper($row['concepto'], 'UTF-8')),1,0,'C');
			$pdf->Cell(35,6,$row['horaEfect'],1,0,'C');
			$pdf->Cell(35,6,utf8_decode("$".$row['efectivo']),1,1,'C');
			$total = $row['efectivo'];
			$contador_total_egresos = $contador_total_egresos + $total;
		}
	}else{
		$array = [];
		while($row = $resultados_ingresos->fetch_assoc())
		{
			if (!isset($array[$row['corteEfect']])) {
				$array[$row['corteEfect']] = array(array("usuario"=>$row['usuario'],"concepto"=>$row['concepto'],"horaEfect"=>$row['horaEfect'],"efectivo"=>$row['efectivo']));

			}else {
				array_push($array[$row['corteEfect']],array("usuario"=>$row['usuario'],"concepto"=>$row['concepto'],"horaEfect"=>$row['horaEfect'],"efectivo"=>$row['efectivo']));
			}
		}
		foreach ($array as $key => $value) {
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(190,6,utf8_decode($value[0]['usuario']),1,1,'C',1);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(120,6,utf8_decode("CONCEPTO"),1,0,'C',1);
			$pdf->Cell(35,6,utf8_decode("HORA"),1,0,'C',1);
			$pdf->Cell(35,6,utf8_decode("EFECTIVO"),1,1,'C',1);
		
			$pdf->SetFont('Arial','',10);
			foreach ($value as $key => $value2) {
				$pdf->Cell(120,6,utf8_decode(mb_strtoupper($value2['concepto'], 'UTF-8')),1,0,'C');
				$pdf->Cell(35,6,$value2['horaEfect'],1,0,'C');
				$pdf->Cell(35,6,utf8_decode("$".$value2['efectivo']),1,1,'C');
				$total = $value2['efectivo'];
				$contador_total_egresos = $contador_total_egresos + $total;
			}
		}
	}
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(155,6,utf8_decode("TOTAL EGRESOS DE CAJA"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("$".$contador_total_egresos),1,1,'C');


	$pdf->Cell(190,6,utf8_decode("BALANCE GENERAL"),1,1,'C',1);
	$pdf->SetFont('Arial','',10);

	$pdf->Cell(155,6,utf8_decode("VENTAS"),1,0,'C');
	$pdf->Cell(35,6,utf8_decode("$".$contador_total),1,1,'C');

	$pdf->Cell(155,6,utf8_decode("INGRESOS A CAJA"),1,0,'C');
	$pdf->Cell(35,6,utf8_decode("$".$contador_total_ingresos),1,1,'C');

	$pdf->Cell(155,6,utf8_decode("EGRESOS DE CAJA"),1,0,'C');
	$pdf->Cell(35,6,utf8_decode("$".$contador_total_egresos),1,1,'C');

	$dinero_caja = $contador_total_ingresos - $contador_total_egresos;

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(155,6,utf8_decode("EFECTIVO EN CAJA"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("$".$dinero_caja),1,1,'C',1);

	

	$pdf->Output();


?>