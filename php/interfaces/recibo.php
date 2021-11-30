<?php
error_reporting(0);
require("../connections/connection.php");
require("../configuration/config.php");

$id = $_GET['id'];


$query_recibo = "SELECT * FROM efectivo WHERE id = '$id'";
$res_recibo = mysqli_query($mysqli, $query_recibo);
$datos = mysqli_fetch_row($res_recibo);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Recibo</title>
  <meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo $Tienda; ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <script src="../../assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>



  <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;}
    .tg .tg-yw4l{vertical-align:top}
    .tg .tg-b7b8{background-color:#f9f9f9;vertical-align:top}
    @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
  </style>
</head>
<body>
  <div class="navbar-fixed" id="esconder">

    <div class="col s12" style="margin-top: 3%;" id="ckeditor">
      <div class="row">
        <div class="tg-wrap" style="float: left; width: 25%;">
          <table class="tg">
            <tr>
              <th class="tg-yw4l">Fecha:</th>
              <th class="tg-yw4l"><?php echo $datos[3]; ?></th>
            </tr>
          </table>
          <p>&nbsp;</p>

<p>&nbsp;</p>
        </div>
        <div style="width: 70%; float: right;">
          <img src="../../assets/images/logo.jpg" height="65px" style="width: 100%;">
        </div>
      </div>
      <div class="row">
        <div class="tg-wrap">


          <table class="tg"  style="width:100%">
            <tbody>
    <tr>
      <td>Suma:</td>
      <td colspan="3"><?php echo $datos[1]; ?></td>
    </tr>
    <tr>
      <td>Concepto:</td>
      <td colspan="3">Recibo de Dinero</td>
    </tr>
    <tr>
      <td colspan="4"><strong>RECIBI:</strong> <?php echo $datos[7]; ?></td>
    </tr>
    <tr>
      <td colspan="4">
      <p style="text-align:justify">COMPROBANTE NO V&Aacute;LIDO COMO FACTURA</p>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>

<script type="text/javascript">
//window.onload = function () {
  CKEDITOR.replace('ckeditor', { on: { 
    'instanceReady': function (evt) { evt.editor.execCommand('maximize'); }
  }}); 
//} 
</script>

</body>
</html>
