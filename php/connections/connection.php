<?php
require("../configuration/config.php");
$servidor = "localhost";
$usuario = "root";
$psw = "root";
$basedatos = $BD;

// $servidor = $BD.".hosting-data.io";
// $usuario = "dbo793410949";
// $psw = "Romero10.";
// $basedatos = $BD;

$mysqli = new mysqli($servidor, $usuario, $psw, $basedatos);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("utf8");

date_default_timezone_set('America/Chihuahua');
?>
