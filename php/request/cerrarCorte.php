<?php
require("../connections/connection.php");
require("../configuration/config.php");
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$crearCorte = "INSERT INTO corte (`cantidad_caja`, `cantidad_total`, `id_usuario`, `fecha`, `hora`, `tipo`) VALUES ('".$_POST['cantidad_caja']."', '".$_POST['cantidad_total']."', '".$_SESSION['id_usuario']."', '$fecha', '$hora', '".$_POST['tipoCorteSend']."');";
$ejecutar = mysqli_query($mysqli, $crearCorte);
$idCorte = mysqli_insert_id($mysqli);

$consulta = "UPDATE ventas SET `corte` = '".$idCorte."' WHERE `empleado` = '".$_SESSION['nombre']."' AND fecha = '$fecha' AND ISNULL(corte);";
$ejecutar = mysqli_query($mysqli, $consulta);

$consulta = "UPDATE efectivo SET `corte` = '".$idCorte."' WHERE usuario = '".$_SESSION['nombre']."' AND fecha = '$fecha' AND ISNULL(corte)";
$ejecutar = mysqli_query($mysqli, $consulta);

session_destroy();
echo "<script>location.href='../../index.php'</script>";
?>