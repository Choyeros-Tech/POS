<?php
$servidor_admin = "localhost";
$usuario_admin = "root";
$psw_admin = "root";
$basedatos_admin = "Administrador_PV";

// $servidor_admin = "db793410898.hosting-data.io";
// $usuario_admin = "dbo793410898";
// $psw_admin = "Romero10.";
// $basedatos_admin = "db793410898";

$admin = new mysqli($servidor_admin, $usuario_admin, $psw_admin, $basedatos_admin);
if ($admin->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $admin->connect_errno . ") " . $admin->connect_error;
}
$admin->set_charset("utf8");

date_default_timezone_set('America/Chihuahua');
?>
