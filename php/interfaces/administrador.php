<?php
require("../configuration/config.php");
require("../obtain/graficas.php");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $Tienda; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="../../assets/css/typography.css">
    <link rel="stylesheet" href="../../assets/css/default-css.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.css">
    <link rel="stylesheet" href="../../assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        label.error { float: none; color: red; padding-left: .5em; vertical-align: middle; font-size: 12px; }
        .listCaja li { background: lightgray; }
        .listCaja li:nth-child(odd) { background: white; }
    </style>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="index.html"><h3 style="color: white;"><?php echo $Tienda; ?></h3></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="dashboard.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Venta</span></a>
                        </li>
                        <li>
                            <a href="ingresos.php" aria-expanded="true"><i class="ti-arrow-down"></i><span>Ingresos</span></a>
                        </li>
                        <li>
                            <a href="egresos.php" aria-expanded="true"><i class="ti-arrow-up"></i><span>Egresos</span></a>
                        </li>
                        <li>
                            <a href="clientes.php" aria-expanded="true"><i class="ti-user"></i><span>Clientes</span></a>
                        </li>
                        <li>
                            <a href="proveedores.php" aria-expanded="true"><i class="ti-truck"></i><span>Proveedores</span></a>
                        </li>
                        <li>
                            <a href="inventarios.php" aria-expanded="true"><i class="ti-package"></i><span>Inventarios</span></a>
                        </li>
                        <li>
                            <a href="reportes.php" aria-expanded="true"><i class="ti-stats-up"></i><span>Reportes</span></a>
                        </li>
                        <li class="active">
                            <a href="administrador.php" aria-expanded="true"><i class="ti-eye"></i><span>Administrador</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="search-box pull-left">
                        <form action="#">
                            <input type="text" name="search" placeholder="Búscar" required>
                            <i class="ti-search"></i>
                        </form>
                    </div>
                </div>
                <!-- profile info & task notification -->
                <div class="col-md-6 col-sm-4 clearfix">
                    <ul class="notification-area pull-right">
                        <li id="full-view"><i class="ti-fullscreen"></i></li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Administrador</h4>
                        <?php if ($_SESSION['nivel'] == 1) {?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Crear Usario</button>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="../../assets/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $Nombre; ?> <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../request/logout.php">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- p
        <div class="main-content-inner">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background: green;"><i class="fa fa-calendar-check-o"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Ventas Diarias</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>$<?php //echo $total_ventas;?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background: green;"><i class="fa fa-calendar-o"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Ventas Semanales</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>$<?php //echo $total_ventas;?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background: green;"><i class="fa fa-calendar"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Ventas Mensual</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>$<?php //echo $total_ventas;?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background: red;"><i class="fa fa-calendar-check-o"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Gastos Diarios</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>$<?php //echo $egreso_dinero;?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background: red;"><i class="fa fa-calendar-o"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Gastos Semanales</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>$<?php //echo $egreso_dinero;?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background: red;"><i class="fa fa-calendar"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Gastos Mensual</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>$<?php //echo $egreso_dinero;?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>age title area end -->
        <div class="main-content-inner">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Generar corte</h4>
                            </div>
                            <div class="form-row">
                                <div class="col-md-11 mb-11">
                                    <form  method="POST" target="_blank">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="validationCustom01">Tipo de corte:</label>
                                                <select name="tipo" class="form-control" id="tipoCorte" onchange="checkOption(this)">
                                                    <option value="1">Turno</option>
                                                    <option value="2">Del Dia</option>
                                                </select>
                                                
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-end">
                                                <button type="button" onclick="getCorte()" class="btn btn-primary">Generar</button>
                                            </div>

                                            <!-- <div class="col-lg-3" id="divUser">
                                                <label for="validationCustom01">Empleado:</label>
                                                <select name="empleado" id="empleado" class="form-control">
                                                    <option selected disabled>Seleccione</option>
                                                    <?php //require("../obtain/empleados.php");?>
                                                </select>
                                            </div> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="form-row mt-4" id="showCorte" style="display: none;">
                                <div class="col-md-11 mb-11">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5><i class="fa-duotone fa-dollar-sign"></i>Ventas totales: $<span id="ventasTotatles">0</span></h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5><i class="fa-solid fa-chart-column"></i>Ganancias: $<span id="ganancias">0</span></h5>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5><i class="fa-solid fa-cash-register"></i>Dinero en caja</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 listCaja">
                                                    <ul>
                                                        <li class="d-flex justify-content-between">
                                                            <div class="d-inline">Fondo de caja inicial</div>
                                                            <div class="d-inline" style="color:green;">+ $<span id="fondoInicial">0</span> </div>
                                                        </li>
                                                        <li class="d-flex justify-content-between">
                                                            <div class="d-inline">Efectivo recibido por ventas</div>
                                                            <div class="d-inline" style="color:green;">+ $<span id="ventasEfectivo">0</span> </div>
                                                        </li>
                                                        <li class="d-flex justify-content-between">
                                                            <div class="d-inline">Entradas</div>
                                                            <div class="d-inline" style="color:green;">+ $<span id="entradasEfectivo">0</span> </div>
                                                        </li>
                                                        <li class="d-flex justify-content-between">
                                                            <div class="d-inline">Salidas</div>
                                                            <div class="d-inline" style="color:red;">- $<span id="salidaEfectivo">0</span> </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-12 d-flex justify-content-between">
                                                    <div class="d-inline"></div>
                                                    <div id="colorDineroCaja" class="d-inline" style="color: black;min-width: 8%;border-top: 1px solid black;"><div class="d-flex justify-content-end">$<span id="totalDineroCaja">0</span></div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5><i class="fa-solid fa-bag-shopping"></i>Ventas</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 listCaja">
                                                    <ul>
                                                        <li class="d-flex justify-content-between">
                                                            <div class="d-inline">En efectivo</div>
                                                            <div class="d-inline" style="color:green;">+ $<span id="ventasTotalesEfectivo">0</span> </div>
                                                        </li>
                                                        <li class="d-flex justify-content-between">
                                                            <div class="d-inline">Con tarjeta</div>
                                                            <div class="d-inline" style="color:green;">+ $<span id="ventasTotalesTarjeta">0</span> </div>
                                                        </li>
                                                        <li class="d-flex justify-content-between">
                                                            <div class="d-inline">Mixto</div>
                                                            <div class="d-inline" style="color:green;">+ $<span id="ventasTotalesMixto">0</span> </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 d-flex justify-content-end">
                                        <form action="../request/generar_corte.php" method="post">
                                            <input type="text" name="tipo" id="tipoImprimir" hidden>
                                            <button class="btn btn-secondary" type="submit">Imprimir</button>
                                        </form>
                                        <button class="btn btn-danger ml-1" type="button" onclick="modalCant()">Hacer corte</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Cancelar Ticket</h4>
                            </div>
                            <div class="form-row">
                                    <div class="col-md-11 mb-11">
                                        <form action="../request/cancelar_ticket.php" method="POST">
                                        <label for="validationCustom01">Numero de ticket:</label>
                                        <input type="number" class="form-control" name="nticket">
                                    </div>
                                    <div class="col-md-1 mb-1">
                                        <label for="validationCustom01">.</label><br>
                                        <input type="submit" class="btn btn-danger" value="Cancelar">
                                    </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="addUser" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="float: right;">
                <h4 class="modal-title">Crear Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="formArticulo" class="needs-validation" action="../request/agregar_articulo.php" method="POST">
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Nombre:</label>
                            <input maxlength="150" type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-6 mb-6">
                            <label for="validationCustom01">Usuario:</label>
                            <input maxlength="50" type="text" name="usuario" id="usuario" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="validationCustom01">Contraseña:</label>
                            <input maxlength="32" type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationCustom01">Dirección:</label>
                            <input maxlength="50" type="text" name="direccion" id="direccion" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationCustom01">Telefono:</label>
                            <input maxlength="10" type="number" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationCustom01">Correo:</label>
                            <input maxlength="150" type="email" name="correo" id="correo" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Tipo empleado:</label>
                            <select class="form-control" name="nivel" id="">
                                <option value="1">Administrador</option>
                                <option value="2">Cajero</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary pull-right" onclick="addUser()" type="button">Registrar</button>
                </form>
            </div>
        </div>

    </div>
</div>
<div id="modalCantCaja" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="float: right;">
                <h4 class="modal-title">Cantidad en caja</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="../request/cerrarCorte.php" onsubmit="return confirmCorte();" method="post" id="formCerrarCorte">
                    <div class="form-row">
                    <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Cantidad:</label>
                            <input type="number" class="form-control" name="cantidad_caja" id="cantidad_caja" required>
                            <input type="number" name="cantidad_total" id="cantidad_total" hidden>
                            <input type="text" name="tipoCorteSend" id="tipoCorteSend" hidden>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary pull-right" type="submit">Registrar</button>
                </form>
            </div>
        </div>

    </div>
</div>

<script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="../../assets/js/metisMenu.min.js"></script>
<script src="../../assets/js/jquery.slimscroll.min.js"></script>
<script src="../../assets/js/jquery.slicknav.min.js"></script>
<!-- all line chart activation -->
<script src="../../assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="../../assets/js/pie-chart.js"></script>
<script src="../../assets/js/bootstrap-select.min.js"></script>
<script src="../../assets/js/plugins.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/localization/messages_es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    function modalCant() {
        $("#modalCantCaja").modal('show')
    }
    function alert(title,text,tipo) {
        Swal.fire({
            icon: tipo,
            title: title,
            text: text,
        })
    }
    function checkOption(params) {
        $("#showCorte").hide()
        if($(params).val() == 2){
            $('#divUser').hide();
            $('#empleado').attr('hidden');
        }else{
            $('#divUser').show();
            $('#empleado').attr('hidden');
        }
    }
    function addUser() {
        // $("#egreEfect").valid();
        if ($("#formArticulo").valid()) {
            axios.post('../request/addUser.php', $('#formArticulo').serialize())
            .then(
                resp => {
                    alert(((resp.data.status)?'Guardado correcto':'Error al guardar'),`${resp.data.message}`,((resp.data.status)?'success':'error'))
                    if (resp.data.status) {
                        $("#formArticulo")[0].reset();
                        $('#addUser').modal('hide');
                    }
                }
            ).catch(error => {
                if (error.response.status === 422) {
                    console.log(error);
                }
            })
        }
        
    };
    function getCorte() {
        $("#showCorte").show()
        $("#tipoImprimir").val($('#tipoCorte option:selected').text())
        $("#tipoCorteSend").val($('#tipoCorte option:selected').text())
        axios.post('../request/getCorte.php', 'option='+$('#tipoCorte option:selected').text())
        .then(
            resp => {
                $('#totalDineroCaja').text((resp.data.message.fondoInicial+resp.data.message.ventasEfectivo+resp.data.message.entradasEfectivo)-resp.data.message.salidaEfectivo)
                $('#cantidad_total').val((resp.data.message.fondoInicial+resp.data.message.ventasEfectivo+resp.data.message.entradasEfectivo)-resp.data.message.salidaEfectivo)
                $('#colorDineroCaja').css('color',((((resp.data.message.fondoInicial+resp.data.message.ventasEfectivo+resp.data.message.entradasEfectivo)-resp.data.message.salidaEfectivo)>=0)?'green':'red'))
                $('#fondoInicial').text(resp.data.message.fondoInicial)
                $('#ventasEfectivo').text(resp.data.message.ventasEfectivo)
                $('#entradasEfectivo').text(resp.data.message.entradasEfectivo)
                $('#salidaEfectivo').text(resp.data.message.salidaEfectivo)
                $('#ventasTotatles').text(resp.data.message.ventasTotatles)
                $('#ganancias').text(resp.data.message.ganancias)
                $('#ventasTotalesEfectivo').text(resp.data.message.ventasTotalesEfectivo)
                $('#ventasTotalesTarjeta').text(resp.data.message.ventasTotalesTarjeta)
                $('#ventasTotalesMixto').text(resp.data.message.ventasTotalesMixto)
            }
        ).catch(error => {
            if (error.response.status === 422) {
                console.log(error);
            }
        })
    }
    function confirmCorte() {
        
        
        
    }
    var form1 = document.getElementById('formCerrarCorte');
    form1.onsubmit = function(e){
        var form = this;
        let text
        if($("#cantidad_caja").val()<$("#cantidad_total").val()){
           text = '¿Estats seguro de hacer el corte? Con una cantidad faltante de: '+ ($("#cantidad_caja").val() - $("#cantidad_total").val())
        }else{
            text = '¿Estas seguro de hacer el corte?'
        }
        e.preventDefault();
        Swal.fire({
            icon: 'info',
            title: 'Confirmación',
            text: text,
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText:'Cancelar',
            confirmButtonText:'Confirmar',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }else{
                return false;
            }
        })
    }
</script>

<?php
if(isset($_GET['registrado']))
{
    echo '<script>swal("Registrado!", "Lo podrás ver en tu lista!", "success");</script>';
}
?>
</body>

</html>
