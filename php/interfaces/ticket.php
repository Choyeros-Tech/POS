<?php
error_reporting(0);
require("../configuration/config.php");
require("../connections/connection.php");

$ticket = base64_decode($_GET['ticket']);
$datos_ticket = "SELECT v.cantidad as cantidad, v.precio as precio, a.nombre as articulo FROM ventas v INNER JOIN articulos a ON a.id = v.articulo  WHERE id_venta = '$ticket'";
$res_ticket = mysqli_query($mysqli, $datos_ticket);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="ticket">
        	<div style="text-align: center;">
            <img src="https://yt3.ggpht.com/-3BKTe8YFlbA/AAAAAAAAAAI/AAAAAAAAAAA/ad0jqQ4IkGE/s900-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="Logotipo" style="height: 60px;max-height: 60px;width: 100px;max-width: 100px;">
            <p class="centrado"><?php echo $Tienda; ?>
                <br><?php echo $Eslogan; ?>
                <br><?php echo $Direccion; ?>
                <br>23/08/2017 08:22 a.m.</p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="cantidad">CANT</th>
                        <th class="articulo">PRODUCTO</th>
                        <th class="precio">PREC</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($res_ticket)
                    {
                        $total_ticket = 0;
                    	while($datos = mysqli_fetch_assoc($res_ticket))
                    	{
                    		echo '<tr>';
                    		echo '<td class="cantidad">'.$datos['cantidad'].'</td>';
                    		echo '<td class="articulo">'.$datos['articulo'].'</td>';
                    		echo '<td class="precio">$'.$datos['precio'].'</td>';
                    		echo '</tr>';

                            $total_ticket = $datos['cantidad'] * $datos['precio'];
                    	}

                    }  

                    ?>
                    <tr>
                        <td class="cantidad"></td>';
                        <td class="articulo"></td>';
                        <td class="precio">________</td>';
                    </tr>
                    <tr>
                        <td class="cantidad">Total</td>';
                        <td class="articulo"></td>';
                        <td class="precio">$<?php echo $total_ticket; ?></td>';
                    </tr>
                </tbody>
            </table>
            <p class="centrado">¡GRACIAS POR SU COMPRA!
                <br><?php echo $Tienda; ?>
            	<br><?php echo $Direccion; ?>
            	<br><?php echo $Telefono; ?>
            	<br><?php echo $Correo; ?></p>
        </div>
        <button id="print" onclick="imprimir()">Imprimir</button>
    </body>
</html>
<script type="text/javascript">
	function imprimir() {
		document.getElementById("print").style.display = "none";
  		window.print();
  		document.getElementById("print").style.display = "block";
	}
</script>
