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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
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
                                <li class="active">
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
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                                <li class="dropdown">
                                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                        <span>2</span>
                                    </i>
                                    <div class="dropdown-menu bell-notify-box notify-box">
                                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                        <div class="nofity-list">
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                                <div class="notify-text">
                                                    <p>You have Changed Your Password</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                                <div class="notify-text">
                                                    <p>New Commetns On Post</p>
                                                    <span>30 Seconds ago</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                                <div class="notify-text">
                                                    <p>Some special like you</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                                <div class="notify-text">
                                                    <p>New Commetns On Post</p>
                                                    <span>30 Seconds ago</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                                <div class="notify-text">
                                                    <p>Some special like you</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                                <div class="notify-text">
                                                    <p>You have Changed Your Password</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                                <div class="notify-text">
                                                    <p>You have Changed Your Password</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                                    <div class="dropdown-menu notify-box nt-enveloper-box">
                                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                        <div class="nofity-list">
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="../../assets/images/author/author-img1.jpg" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="../../assets/images/author/author-img2.jpg" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">When you can connect with me...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="../../assets/images/author/author-img3.jpg" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">I missed you so much...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="../../assets/images/author/author-img4.jpg" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Your product is completely Ready...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="../../assets/images/author/author-img2.jpg" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="../../assets/images/author/author-img1.jpg" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="../../assets/images/author/author-img3.jpg" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="settings-btn">
                                    <i class="ti-settings"></i>
                                </li>
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
                                <h4 class="page-title pull-left">Inventarios</h4>
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
                                        <h4 class="header-title mb-0">Inventario de Art??culos</h4>
                                    </div>
                                    <br>
                                    <div class="data-tables">
                                    <table id="tablaarticulos" class="text-center" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Codigo</th>
                                                <th>Cantidad</th>
                                                <th>Venta</th>
                                                <th>Compra</th>
                                                <th>Mayoreo</th>
                                                <th>Marca</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php require("../obtain/inventarios.php");?>
                                        </tbody>
                                    </table>
                                </div>
                                    
                                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#addArticulos" onclick="script:$('#formArticulo')[0].reset();">Agregar art??culo</button>
                                    <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#listaMarcas">Marcas</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Articulos -->
        <div id="addArticulos" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="float: right;">
                        <h4 class="modal-title">Agregar Articulos</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="header-title mb-0">Registro de Art??culos</h4>
                                        </div>
                                        <br>
                                        <form id="formArticulo" class="needs-validation" action="../request/agregar_articulo.php" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-10 mb-10">
                                                    <label for="validationCustom01">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Art??culo" required>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <label for="validationCustom01">Codigo:</label>
                                                    <input maxlength="45" type="text" name="codigo" id="codigo" class="form-control" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-row align-items-baseline">
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom01">Cantidad de producto:</label>
                                                    <input min="1" type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad del producto" required>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom01">Costo Venta:</label>
                                                    <input min=".1" type="number" step=".01" class="form-control" id="venta" name="venta" placeholder="Costo de Venta" required>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom01">Costo Compra:</label>
                                                    <input min=".1" type="number" step=".01" class="form-control" id="compra" name="compra" placeholder="Costo de Compra" required>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom01">Costo Mayoreo:</label>
                                                    <input min=".1" type="number" step=".01" class="form-control" id="mayoreo" name="mayoreo" placeholder="Costo de Mayoreo" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Marca:</label>
                                                    <select class="custom-select" id="marca" name="marca" required>
                                                        <?php require("../obtain/option_marcas.php"); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <button id="buttonSendRegist" class="btn btn-primary pull-right" onclick="sendArticle()" type="button" >Registrar</button>
                                            <button id="buttonSendEdit" class="btn btn-primary pull-right" onclick="updateArticle(this)" type="button" style="display: none;">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal Marcas-->
        <div id="listaMarcas" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="float: right;">
                        <h4 class="modal-title">Marcas</h4>
                        <button type="button" class="close" data-dismiss="modal" onclick="addMarca(false)">&times;</button>

                    </div>
                    <div class="modal-body">
                        <div class="data-tables" id="marcasdiv">
                            <table id="tablamarcas" class="text-center" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php require("../obtain/marcas.php");?>
                                </tbody>
                            </table>
                        </div>
                        <div id="marcasagregar" style="display: none;">
                            <div class="form-row">
                                <div class="col-md-12 mb-12">
                                    <form action="../request/guardar_marca.php" method="POST">
                                    <label for="validationCustom01">Nombre:</label>
                                    <input type="text"  class="form-control" id="nombre" name="nombre" placeholder="Nombre de la marca" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success pull-right" type="submit" style="display: none;" id="agregarbtn">Agregar</button>
                        </form>
                        <button class="btn btn-danger pull-right" id="cancelarmarca" style="display: none;" onclick="addMarca(false)">Cancelar</button>
                        <button class="btn btn-danger pull-right" id="agregarmarca" onclick="addMarca(true)">Agregar</button>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
        </script>
        <!-- all line chart activation -->
        <script src="../../assets/js/line-chart.js"></script>
        <!-- all pie chart -->
        <script src="../../assets/js/pie-chart.js"></script>
        <!-- others plugins -->
            <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/localization/messages_es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script type="text/javascript">
        $( document ).ready(function() {
            articulos = $('#tablaarticulos').DataTable({
                responsive: true,
                "language": {
                    url: '../../assets/plugins/spanishDataTable.json'
                }
            });
            $('#tablaarticulosModal').DataTable( {
                responsive: true,
                "language": {
                    url: '../../assets/plugins/spanishDataTable.json'
                }
            } );
            $('#tablamarcas').DataTable( {
                responsive: true,
                "language": {
                    url: '../../assets/plugins/spanishDataTable.json'
                }
            } );
        });
        function addMarca(check) {
            if (check) {
                $("#marcasdiv").css('display', 'none');
                $("#marcasagregar").css('display', 'block');
                $("#agregarbtn").css('display', 'block');
                $("#cancelarmarca").css('display', 'block');
                $("#agregarmarca").css('display', 'none');
            }else{
                $("#marcasdiv").css('display', 'block');
                $("#marcasagregar").css('display', 'none');
                $("#cancelarmarca").css('display', 'none');
                $("#agregarbtn").css('display', 'none');
                $("#agregarmarca").css('display', 'block');
            }
        };
        
        

        function alert(title,text,tipo) {
            Swal.fire({
                icon: tipo,
                title: title,
                text: text,
            })
        }
        function sendArticle() {
            // $("#egreEfect").valid();
            if ($("#formArticulo").valid()) {
                axios.post('../request/agregar_articulo.php', $('#formArticulo').serialize())
                .then(
                    resp => {
                        alert(((resp.data.status)?'Guardado correcto':'Error al guardar'),`${resp.data.message}`,((resp.data.status)?'success':'error'))
                        if (resp.data.status) {
                            articulos.row.add( [
                                $("#nombre").val(),
                                $("#codigo").val(),
                                $("#cantidad").val(),
                                $("#venta").val(),
                                $("#compra").val(),
                                $("#mayoreo").val(),
                                $("#marca option:selected").text()
                            ] ).draw( false );
                            $("#formArticulo")[0].reset();
                            $("#addArticulos").modal('hide');
                        }
                    }
                ).catch(error => {
                    if (error.response.status === 422) {
                        console.log(error);
                    }
                })
            }
            
        };
        function edit(params) {
            $("#addArticulos").modal('show');
            $("#buttonSendEdit").show();
            $("#buttonSendEdit").attr('idArt',params);
            $("#buttonSendRegist").hide();

            axios.post('../request/get_articulo.php', 'id='+params)
            .then(
                resp => {
                    $("#nombre").val(resp.data.message.nombre)
                    $("#codigo").val(resp.data.message.codigo)
                    $("#cantidad").val(resp.data.message.cantidad)
                    $("#venta").val(resp.data.message.costo_venta)
                    $("#compra").val(resp.data.message.costo_compra)
                    $("#mayoreo").val(resp.data.message.costo_mayoreo)
                    $("#marca").val(resp.data.message.marca)
                    
                }
            ).catch(error => {
                if (error.response.status === 422) {
                    console.log(error);
                }
            })
        }
        function updateArticle(params) {

            let datos= $("#formArticulo").serialize()
            datos += "&idArt="+$(params).attr('idArt');
            axios.post('../request/update_articulo.php', datos)
            .then(
                resp => {
                    Swal.fire({
                        icon: ((resp.data.status)?'success':'error'),
                        title: ((resp.data.status)?'Guardado correcto':'Error al guardar'),
                        text: `${resp.data.message}`,
                    }).then((result) => {
                        location.reload();
                    })
                }
            ).catch(error => {
                if (error.response.status === 422) {
                    console.log(error);
                }
            })
            
        }
    </script>
    </body>

    </html>
