<?php
error_reporting(0);
require("../connections/connection_admin.php");
$consulta = "SELECT nombre FROM usuarios WHERE id_negocio = '$identificador' order by nombre";
$ejecutar = mysqli_query($admin, $consulta);
if($ejecutar)
{
	while($usuario = mysqli_fetch_row($ejecutar))
	{
		echo '<option>'.$usuario[0].'</option>';
	}
}


?>
