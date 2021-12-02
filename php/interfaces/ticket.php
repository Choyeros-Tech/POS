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
        <title>Ticket</title>

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <style>
            .precio {
                text-align: center;
            }
            .cantidad {
                text-align: center;
            }
        </style>
        
        
    </head>
    <body>
        <div class="w-100">
            <div class="col-12">
                <div class="container">
                    <div class="text-center">
                        <img src="../../assets/images/<?php echo $Logo; ?>" alt="Logotipo" style="height: 60px;max-height: 60px;width: 100px;max-width: 100px;">
                        <p class="centrado"><?php echo $Tienda; ?>
                            <br><?php echo $Eslogan; ?>
                            <br><?php echo $Direccion; ?>
                            <br><?php $date = new DateTime(date('d/m/Y H:i:s'));
                                echo $date->format('d/m/Y h:i:sa') ;?>
                        </p>
                    </div>
                    <div class="row">
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <th class="cantidad">CANT</th>
                                    <th class="articulo">PRODUCTO</th>
                                    <th class="precio">PRECIO</th>
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
                                <tr style="border-bottom: 1px solid;">
                                    <td class="cantidad"></td>
                                    <td class="articulo"></td>
                                    <td class="precio"></td>
                                </tr>
                                <tr>
                                    <td class="cantidad">Total</td>
                                    <td class="articulo"></td>
                                    <td class="precio">$<?php echo $total_ticket; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <p>¡GRACIAS POR SU COMPRA!
                            <br><?php echo $Tienda; ?>
                            <br><?php echo $Direccion; ?>
                            <br><?php echo $Telefono; ?>
                            <br><?php echo $Correo; ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="w-100">
            <button class="float-right" id="print" onclick="imprimir()">Imprimir</button>
        </div>
        
    </body>
</html>
<script type="text/javascript">
	function imprimir() {
		document.getElementById("print").style.display = "none";
  		window.print();
  		document.getElementById("print").style.display = "block";
	}
</script>
