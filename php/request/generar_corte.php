<?php
require("../connections/connection.php");
require("../../assets/plugins/fpdf/fpdf.php");

$empleado = $_POST['empleado'];
$hoy = date("Y-m-d");

class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../assets/images/logo.jpg', 55, 5, 100 );
			$this->SetFont('Arial','B',15);
			$this->Cell(40);
			$this->Cell(120,30, 'CORTE DEL DIA',0,0,'C');
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
	$query = "SELECT a.nombre as articulo, v.cantidad as cantidad, v.precio as precio, v.hora as hora, v.fecha FROM ventas v INNER JOIN articulos a ON a.id = v.articulo WHERE v.empleado = '$empleado' AND v.fecha = '$hoy' AND v.activo = '0'";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(85,6,'ARTICULO',1,0,'C',1);
	$pdf->Cell(35,6,'CANTIDAD',1,0,'C',1);
	$pdf->Cell(35,6,'PRECIO',1,0,'C',1);
	$pdf->Cell(35,6,'TOTAL',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);

	$contador_total = 0;
	$contador_total_ingresos = 0;
	$contador_total_egresos = 0;
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(85,6,utf8_decode(mb_strtoupper($row['articulo'], 'UTF-8')),1,0,'C');
		$pdf->Cell(35,6,$row['cantidad'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode("$".$row['precio']),1,0,'C');
		$total = $row['precio'] * $row['cantidad'];
		$contador_total = $contador_total + $total;
		$pdf->Cell(35,6,utf8_decode("$".$total),1,1,'C');
	}

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(155,6,utf8_decode("TOTAL VENTAS"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("$".$contador_total),1,1,'C');

	$pdf->Cell(190,6,utf8_decode("INGRESOS A CAJA"),1,1,'C',1);

	$pdf->Cell(120,6,utf8_decode("CONCEPTO"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("HORA"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("EFECTIVO"),1,1,'C',1);

	$pdf->SetFont('Arial','',10);

	$query_ingresos = "SELECT * FROM efectivo WHERE eos = 'entrada' AND fecha = '$hoy'";
	$resultados_ingresos = $mysqli->query($query_ingresos);

	while($row = $resultados_ingresos->fetch_assoc())
	{
		$pdf->Cell(120,6,utf8_decode(mb_strtoupper($row['concepto'], 'UTF-8')),1,0,'C');
		$pdf->Cell(35,6,$row['hora'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode("$".$row['efectivo']),1,1,'C');
		$total = $row['efectivo'];
		$contador_total_ingresos = $contador_total_ingresos + $total;
	}

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(155,6,utf8_decode("TOTAL INGRESOS A CAJA"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("$".$contador_total_ingresos),1,1,'C');

	$pdf->Cell(190,6,utf8_decode("EGRESOS DE CAJA"),1,1,'C',1);

	$pdf->Cell(120,6,utf8_decode("CONCEPTO"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("HORA"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("EFECTIVO"),1,1,'C',1);

	$pdf->SetFont('Arial','',10);

	$query_ingresos = "SELECT * FROM efectivo WHERE eos = 'salida' AND fecha = '$hoy'";
	$resultados_ingresos = $mysqli->query($query_ingresos);

	while($row = $resultados_ingresos->fetch_assoc())
	{
		$pdf->Cell(120,6,utf8_decode(mb_strtoupper($row['concepto'], 'UTF-8')),1,0,'C');
		$pdf->Cell(35,6,$row['hora'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode("$".$row['efectivo']),1,1,'C');
		$total = $row['efectivo'];
		$contador_total_egresos = $contador_total_egresos + $total;
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

	$dinero_caja = $contador_total + $contador_total_ingresos - $contador_total_egresos;

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(155,6,utf8_decode("EFECTIVO EN CAJA"),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode("$".$dinero_caja),1,1,'C',1);

	

	$pdf->Output();


?>