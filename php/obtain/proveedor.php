<?php
error_reporting(0);
require("../connections/connection.php");
$consulta = "SELECT id, nombre FROM proveedores order by nombre";
$ejecutar = mysqli_query($mysqli, $consulta);
if($ejecutar)
{
	while($proveedor = mysqli_fetch_row($ejecutar))
	{
		echo '<option value="'.$proveedor[0].'">'.$proveedor[1].'</option>';
	}
}

?>
