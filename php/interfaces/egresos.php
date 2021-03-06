<?php
require("../configuration/config.php");
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
                        <li class="active">
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
                        <li>
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
                            <input type="text" name="search" placeholder="B??scar" required>
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
                        <h4 class="page-title pull-left">Egresos</h4>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="../../assets/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $Nombre; ?> <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../request/logout.php">Cerrar Sesi??n</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page title area end -->
        <div class="main-content-inner">
            <br><br><br>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="header-title mb-0">Registro de Egresos</h4>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#efectivo">Efectivo</button>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#articulos">Articulos</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div id="efectivo" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="float: right;">
                <h4 class="modal-title">Efectivo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form class="needs-validation" id="egreEfect" action="../request/agregar_egreso.php" method="POST">
                    <div class="form-row">
                        <div class="col-md-6 mb-6">
                            <label for="validationCustom01">Cantidad:</label>
                            <input min="1" type="number" step="0.01" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad Exacta Que Egresa de Caja" required>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="validationCustom01">Tipo Egreso:</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option>Pago a Proveedor</option>
                                <option>Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" style="display: none;" id="comentario">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Tipo de Egreso:</label>
                            <textarea class="form-control" rows="3" name="otro" id="otro" placeholder="Especifique el tipo de ingreso" required></textarea>
                        </div>
                    </div>
                    <div class="form-row" id="proveedorpago">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Proveedor:</label>
                            <select class="selectpicker" data-live-search="true" name="proveedor" id="proveedor">
                                <option value="" selected disabled>Seleccione</option>
                                <?php require("../obtain/proveedor.php"); ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary pull-right" type="button" onclick="sendEfect()">Registrar</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="articulos" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="float: right;">
                <h4 class="modal-title">Articulos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="egresArticulos" class="needs-validation" action="../request/egreso_articulos.php" method="POST">
                    <div class="form-row">
                        <div class="col-md-10 mb-10">
                            <label for="validationCustom01">Articulo:</label>
                            <select class="selectpicker" data-live-search="true" onchange="getMaxCant(this)" name="articulo" id="articulo">
                                <option selected disabled>Seleccione</option>
                                <?php require("../obtain/articulos.php"); ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="validationCustom01">Cantidad:</label>
                            <input min="1" type="number" name="cantidad" id="cantidad" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Raz??n:</label>
                            <textarea value="" name="razon" id="razon" class="form-control" rows="3" required></textarea required>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary pull-right" type="button" onclick="sendArticulo()">Registrar</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<!-- all line chart activation -->
<script src="../../assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="../../assets/js/pie-chart.js"></script>
<script src="../../assets/js/bootstrap-select.min.js"></script>
<script src="../../assets/js/plugins.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/localization/messages_es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    function alert(title,text,tipo) {
        Swal.fire({
            icon: tipo,
            title: title,
            text: text,
        })
    }
    function sendEfect() {
        // $("#egreEfect").valid();
        if ($("#egreEfect").valid()) {
            if ($("#egreEfect #proveedor").val() == null) {
                alert('Oops...','Seleccione Un Proveedor','error')
                return true;
            }
            axios.post('../request/agregar_egreso.php', $('#egreEfect').serialize())
            .then(
                resp => {
                    alert(((resp.data.status)?'Guardado correcto':'Error al guardar'),`${resp.data.message}`,((resp.data.status)?'success':'error'))
                    if (resp.data.status) {
                        $("#egreEfect")[0].reset();
                        $('#efectivo').modal('hide');
                    }
                }
            ).catch(error => {
                if (error.response.status === 422) {
                    console.log(error);
                }
            })
        }
        
    };
    function sendArticulo() {
        // $("#egreEfect").valid();
        if ($("#egresArticulos").valid()) {
            if ($("#egresArticulos #articulo").val() == null) {
                alert('Oops...','Seleccione Un Articulo','error')
                return true;
            }
            axios.post('../request/egreso_articulos.php', $('#egresArticulos').serialize())
            .then(
                resp => {
                    alert(((resp.data.status)?'Guardado correcto':'Error al guardar'),`${resp.data.message}`,((resp.data.status)?'success':'error'))
                    if (resp.data.status) {
                        $("#egresArticulos")[0].reset();
                        $('#articulos').modal('hide');
                    }
                }
            ).catch(error => {
                if (error.response.status === 422) {
                    console.log(error);
                }
            })
        }
        
    };
    function getMaxCant(params) {
        console.log(params.value)
        axios.post('../request/getStockArticulo.php', 'idArticulo='+params.value)
        .then(
            resp => {
                if (resp.data.status) {
                    $('#egresArticulos #cantidad').prop('max',resp.data.message)
                }
            }
        ).catch(error => {
            if (error.response.status === 422) {
                console.log(error);
            }
        })
    }
    $("#egresArticulos").one('submit',function(event){
        event.preventDefault();
        if ($("#egresArticulos #proveedor").val() == null) {
            alert('Oops...','Seleccione Un Articulo','error')
            return false;
        } else if ($("#egresArticulos #razon").val() == '') {
            alert('Oops...','Raz??n debe tener algun dato','error')
            return false;
        } else if ($("#egresArticulos #cantidad").val() < 1 ){
            alert('Oops...','Cantidad no puede ser menos de 1','error')
            return false;
        }else{
            $(this).submit();
        }
         
    });
    $("#tipo").change(function() {
        var tipo = $("#tipo").val();
        if(tipo == "Otro")
        {
            $("#proveedorpago").fadeOut(300);
            $("#comentario").fadeIn(300);
            
        }
        else
        {
            $("#comentario").fadeOut(300);
            $("#proveedorpago").fadeIn(300);
        }
    });
</script>
<?php
if(isset($_GET['registrado']))
{
    echo '<script>alert("Registrado!", "Lo podr??s ver en tu lista!", "success");</script>';
}
?>
</body>

</html>
