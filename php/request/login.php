<?php
require("../connections/connection_admin.php");
session_start();
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

$sql="SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
$resultado = mysqli_query($admin,$sql);
if($resultado)
{
	if(mysqli_num_rows($resultado) == 1)
	{
		$sql_n = "SELECT nivel, nombre, usuario, id from usuarios WHERE usuario = '$usuario' AND password = '$password'";
		$res_n = mysqli_query($admin, $sql_n);
		if(!$res_n)
		  {
		    echo mysqli_error($mysqli);
		    exit();
		  }
		  else
		  {

		    while($row = mysqli_fetch_row($res_n))
		    {
		      $_SESSION['nivel'] = $row[0]; 
	          $_SESSION['nombre'] = $row[1];
	          $_SESSION['usuario'] = $row[2];
	          $_SESSION['id_usuario'] = $row[3];
	        }
	        echo "<script>location.href='../interfaces/dashboard.php'</script>";
		  }
	}
	else
	{
		echo "<script>location.href='../../index.php?error=true'</script>";
		echo mysqli_error($mysqli);
	}

}
else
{
	echo "<script>location.href='../../index.php?error=true'</script>";
	echo mysqli_error($mysqli);
}
?>
