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
    <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
    label.error { float: none; color: red; padding-left: .5em; vertical-align: middle; font-size: 12px; }
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
                                <h4 class="page-title pull-left">Corte del día</h4>
                            </div>
                            <div class="form-row">
                                    <div class="col-md-11 mb-11">
                                        <form action="../request/generar_corte.php" method="POST" target="_blank">
                                        <label for="validationCustom01">Empleado:</label>
                                        <select name="empleado" id="empleado" class="form-control">
                                            <option selected disabled>Seleccione</option>
                                            <?php require("../obtain/empleados.php");?>
                                        </select>
                                    </div>
                                    <div class="col-md-1 mb-1">
                                        <label for="validationCustom01">.</label><br>
                                        <input type="submit" class="btn btn-primary" value="Generar">
                                    </div>
                                    </form>
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
    function alert(title,text,tipo) {
        Swal.fire({
            icon: tipo,
            title: title,
            text: text,
        })
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
</script>

<?php
if(isset($_GET['registrado']))
{
    echo '<script>swal("Registrado!", "Lo podrás ver en tu lista!", "success");</script>';
}
?>
</body>

</html>
