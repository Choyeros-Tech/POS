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
                        <li class="active">
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
                        <h4 class="page-title pull-left">Ventas</h4>
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
        <!-- page title area end -->
        <div class="main-content-inner">
            <br><br>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="header-title mb-0" id="leyenda">Registro de Venta</h4>
                                <select class="custome-select border-0 pr-3" id="listaver">
                                    <option selected>Venta</option>
                                    <option>Tickets</option>
                                </select>
                            </div>
                            <div id="divventa">
                                <div class="card-body">
                                    <div class="form-row mb-2">
                                        <div class="col-md-11">
                                            <input class="form-control" type="text" name="codigo" id="codigo" placeholder="Codigo del producto">
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-primary pull-right" onclick="buscarArt()">Buscar</button>
                                        </div>
                                    </div>
                                    <h5>Articulos para buscar</h5>
                                    <div class="form-row mt-2">
                                        <div class="col-md-6 mb-6">
                                            <label for="validationCustom01">Articulo:</label>
                                            <br>
                                            <select class="selectpicker" data-live-search="true" name="articulo" id="articulo">
                                                <option selected disabled>Seleccione</option>
                                                <?php require("../obtain/articulos.php"); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label for="validationCustom01">Cantidad:</label>
                                            <input min="1" type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value="1" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Venta:</label>
                                            <select class="form-control" name="tipocobro" id="tipocobro">
                                                <option selected>Normal</option>
                                                <option>Mayoreo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 mb-1">
                                         <button class="btn btn-primary pull-right" id="agregar" style="margin-top: 2rem;"><i class="ti-plus"></i></button>
                                     </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <button class="btn btn-primary pull-right" id="finalizar">Finalizar Venta</button>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row" id="lista" style="display: none;">
                                    <div class="col-md-12 mb-12">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table text-center">
                                                    <thead class="text-uppercase bg-info">
                                                        <tr class="text-white">
                                                            <th scope="col">Articulo</th>
                                                            <th scope="col">Cantidad</th>
                                                            <th scope="col">Precio</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="productos">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="divtickets" style="display: none;">
                            <br>
                            <div class="form-row" id="lista">
                                <div class="col-md-12 mb-12">
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead class="text-uppercase bg-info">
                                                    <tr class="text-white">
                                                        <th scope="col">Ticket</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Hora</th>
                                                        <th scope="col">Empleado</th>
                                                        <th scope="col">Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php require("../obtain/lista_tickets.php"); ?>
                                                </tbody>
                                            </table>
                                        </div>
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
<div id="modalfondo" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="float: right;">
                <h4 class="modal-title">Fondo de Caja</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form class="needs-validation" id="efectivoForm" method="POST">
                    <div class="form-row">
                        <div class="col-md-11 mb-11">
                            <label for="validationCustom01">Cantidad:</label>
                            <input min=".01" type="number" step="0.01" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad Exacta Que Ingresa a Caja" required="">
                            <input type="hidden" name="tipo" value="Fondo de Caja">
                            <input type="hidden" name="inicial" value="true">
                        </div>
                        <div class="col-md-1 mb-1">
                            <label for="validationCustom01">.</label>
                             <button class="btn btn-primary pull-right" type="button" onclick="ingresoEfect()">Registrar</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="modalpago" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="float: right;">
                <h4 class="modal-title">Cobro de Venta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Total a Pagar:</label>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Metodo de Pago:</label>
                            <select name="mpago" id="mpago" class="form-control">
                                <option selected disabled>Seleccione</option>
                                <option>Efectivo</option>
                                <option>Tarjeta</option>
                                <option>Mixto</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="divefectivo" style="display: none;">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Efectivo:</label>
                            <input min="1" type="number" step="0.01" name="dinero" id="dinero" class="form-control">
                        </div>
                    </div>
                    <div class="row" id="divtarjeta" style="display: none;">
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom01">Cantidad:</label>
                            <input type="number" name="tarjeta" id="tarjeta" class="form-control">
                            <label for="validationCustom01">Referencia:</label>
                            <input type="text" name="referencia" id="referencia" class="form-control">
                            <small>En pagos con tarjeta se ingresa la cantidad exacta y añada la referencia</small>
                        </div>
                    </div>
                    <div class="row" id="divmixto" style="display: none;">
                        <br>
                        <div class="col-md-12 mb-12">
                            <div class="row">
                                <div class="col-md-6 mb-6">
                                    <label for="validationCustom01">Cantidad en Efectivo:</label>
                                    <input min= "1" type="number" name="cefectivo" id="cefectivo" class="form-control">
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationCustom01">Cantidad en Tarjeta:</label>
                                    <input min= "1" type="number" name="cefectivo" id="ctarjeta" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12 mb-12">
                            <br>
                            <label for="validationCustom01">.</label>
                             <button class="btn btn-primary pull-right" id="terminarventa">Finalizar</button>
                        </div>
                    </div>
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
<!-- others plugins -->
<script src="../../assets/js/plugins.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="../../assets/js/qs.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/localization/messages_es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    var elementos = new Array();
    var elementos_visuales = new Array();
    var contador = 0;
    //PRESIONAR ENTER EN EL BUSCADOR
    $('#codigo').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            if ($('#codigo').val()!="") {
                buscarArt()
            }
        }
    }); 
    function buscarArt() {
        axios.post('../request/buscarArticulo.php', Qs.stringify({'codigo':$('#codigo').val()}))
        .then(
            resp => {
                let texto;
                if(resp.data.status){
                    let articuloBuscado = resp.data.message;
                    texto = `
                        Articulo: ${articuloBuscado.nombre} 
                        <br>Precio: $${articuloBuscado.costo_venta}
                        <br>Tipo de compra: <select id="tipocobroModal" class="form-control"><option>Normal</option><option>Mayoreo</option></select>
                        <br>Cantidad: <input min="1" value="1" type="number" class="form-control" id="cantidadModal" placeholder="Cantidad" required="">
                        <input id="articuloModal" value="${articuloBuscado.id}" type="number" hidden>
                    `;
                    alertHTML(((resp.data.status)?'RESULTADO':'ERROR'),`${texto}`,((resp.data.status)?'success':'error'))
                }else{
                    texto = resp.data.message;
                    alert(((resp.data.status)?'RESULTADO':'ERROR'),`${texto}`,((resp.data.status)?'success':'error'))
                }
                
                $('#codigo').val('')
            }
        ).catch(error => {
            if (error.response.status === 422) {
                console.log(error);
            }
        })
    }
    function ingresoEfect() {
        if ($("#efectivoForm").valid()) {
            axios.post('../request/agregar_ingreso.php', $('#efectivoForm').serialize())
            .then(
                resp => {
                    alert(((resp.data.status)?'Guardado correcto':'Error al guardar'),`${resp.data.message}`,((resp.data.status)?'success':'error'))
                    if (resp.data.status) {
                        $("#efectivoForm")[0].reset();
                        $('#modalfondo').modal('hide');
                    }
                }
            ).catch(error => {
                if (error.response.status === 422) {
                    console.log(error);
                }
            })
        }
        
    };
    function alert(title,text,tipo) {
        Swal.fire({
            icon: tipo,
            title: title,
            text: text,
        })
    }
    function alertHTML(title,text,tipo) {
        Swal.fire({
            icon: tipo,
            title: title,
            html: text,
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText:'Agregar',
            cancelButtonText:'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                $("#articulo").val($("#articuloModal").val());
                $("#cantidad").val($("#cantidadModal").val());
                $("#tipocobro").val($("#tipocobroModal").val());
                $("#agregar").click();
                $('#articulo').prop('selectedIndex',0)
                $('#articulo').selectpicker('refresh')
                $("#cantidad").val('1');
                $('#tipocobro').prop('selectedIndex',0)
                $('#tipocobro').selectpicker('refresh')

                Swal.fire('Agregado', '', 'success')
            }
        })
    }
    $("#agregar").click(function () {
        var articulo = $("#articulo").val();
        var cantidad = $("#cantidad").val();
        var tipocobro = $("#tipocobro").val();
        if (articulo == null) {
            alert('Oops...','Seleccione Un artículo','error')
            return true;
        }
        if (cantidad < 1) {
            alert('Oops...','Cantidad no puede ser menos de 1','error')
            return true;
        }
        if (tipocobro == null) {
            alert('Oops...','Favor de seleccionar una opción en tipo de venta','error')
            return true;
        }
        $.ajax({
            type: "POST",
            url: "../request/precios.php",
            data: {
                'articulo': articulo,
                'tipocobro': tipocobro,
                'cantidad': cantidad
            },
            success: function (data) {
                if (data == "stock") {
                    alert("sin stock suficiente");
                } else {
                    var temp = new Array();
                    temp = data.split(",");

                    var precio = temp[1];
                    var nombre = temp[0];

                    var total = cantidad * precio;
                    elementos[contador] = {
                        articulo,
                        cantidad,
                        precio,
                        total
                    }; //articulo = id articulo
                    elementos_visuales[contador] = {
                        contador,
                        nombre,
                        cantidad,
                        precio,
                        total
                    }; //articulo = id articulo
                    console.log(elementos[contador]);
                    $("#lista").fadeIn();
                    $("#lista").fadeIn("slow");
                    $("#lista").fadeIn(3000);
                    actualizar_elementos(); // se usa nombre por cuestiones de estetica
                    contador++;
                    $('#articulo').prop('selectedIndex',0)
                    $('#articulo').selectpicker('refresh')
                    $("#cantidad").val('1');
                    $('#tipocobro').prop('selectedIndex',0)
                    $('#tipocobro').selectpicker('refresh')
                }

            }
        });
    });

    function agregar(id, nombre, cantidad, precio, total) {
        var renglon = "<tr><td>" + nombre + "</td><td>" + cantidad + "</td><td>$" + precio + "</td><td>$" + total + "</td><td><i onclick=\"eliminar(" + id + ");\" class=\"ti-trash\"></i></td></tr>";
        $("#productos").append(renglon);
    }

    function eliminar(id) {
        delete elementos[id];
        delete elementos_visuales[id];
        actualizar_elementos();
    }

    function actualizar_elementos() {
        $("#productos").empty();
        var renglon = "";
        elementos_visuales.forEach(function (elemento_visual, index) {
            console.log("id " + index + "Nombre " + elemento_visual.nombre);
            var renglon = renglon + "<tr><td>" + elemento_visual.nombre + "</td><td>" + elemento_visual.cantidad + "</td><td>$" + elemento_visual.precio + "</td><td>$" + elemento_visual.total + "</td><td><i onclick=\"eliminar(" + elemento_visual.contador + ");\" class=\"ti-trash\"></i></td></tr>";
            $("#productos").append(renglon);
        });
        var total_compra = Contar_Total();
        var renglon = renglon + "<tr><td>TOTAL</td><td></td><td></td><td></td><td><b>$" + total_compra + "</b></td></tr>";
        $("#productos").append(renglon);

    }

    $("#mpago").change(function () {
        var mpago = $("#mpago").val();
        if (mpago == "Efectivo") {
            $("#divefectivo").css('display', 'block');
            $("#divtarjeta").css('display', 'none');
            $("#divmixto").css('display', 'none');
        } else if (mpago == "Tarjeta") {
            $("#divefectivo").css('display', 'none');
            $("#divtarjeta").css('display', 'block');
            $("#divmixto").css('display', 'none');
        } else {
            $("#divefectivo").css('display', 'none');
            $("#divtarjeta").css('display', 'none');
            $("#divmixto").css('display', 'block');
        }

    });



    function Contar_Total() {
        var total_de_venta = 0;

        elementos.forEach(function (elemento, index) {
            console.log("id " + index + "Cantidad " + elemento.cantidad + " Precio: " + elemento.precio);
            var total_articulo = elemento.cantidad * elemento.precio;
            total_de_venta = total_de_venta + total_articulo;
            console.log("Total->" + total_de_venta);
        });

        return total_de_venta;

    }


    $("#finalizar").click(function () {
        $('#modalpago').modal('show');
    });

    $("#terminarventa").click(function () {

        var total_de_venta = Contar_Total();

        var mpago = $("#mpago").val();
        var dinero = $("#dinero").val();
        var tarjeta = $("#tarjeta").val();
        var referencia = $("#referencia").val();
        var cefectivo = $("#cefectivo").val();
        var ctarjeta = $("#ctarjeta").val();
        var cliente = $("#cliente").val();

        if (articulo == null) {
            alert('Oops...','Seleccione Un artículo','error')
            return true;
        }
        if (parseInt(dinero) < 1 || parseInt(tarjeta) < 1 || parseInt(cefectivo) < 1 || parseInt(ctarjeta) < 1) {
            alert('Oops...','Cantidad no puede ser menos de 1','error')
            return true;
        }

        var total_ingreso = 0;

        if (mpago == "Efectivo") {
            total_ingreso = 0;
            total_ingreso = parseInt(dinero);
        } else if (mpago == "Tarjeta") {
            total_ingreso = 0;
            total_ingreso = parseInt(tarjeta);
        } else {
            total_ingreso = 0;
            total_ingreso = parseInt(cefectivo) + parseInt(ctarjeta);
        }

        console.log("ingreso->" + total_ingreso);

        if (total_de_venta <= total_ingreso) {
            var cambio = total_ingreso - total_de_venta;
            Swal.fire({
                icon: 'info',
                title: 'Cambio',
                text: "El cambio es de: $"+ cambio,
                showConfirmButton: true,
                confirmButtonText:'Cambio devuelto',
            }).then((result) => {
                location.reload();
            })

            $.ajax({
                type: "POST",
                url: "../request/venta.php",
                data: {
                    'array': JSON.stringify(elementos),
                    'cliente': cliente,
                    'mpago': mpago,
                    'referencia': referencia,
                    'cambio': cambio,
                    'efectivo':(parseInt(cefectivo))?parseInt(cefectivo):0,
                    'tarjeta':(parseInt(ctarjeta))?parseInt(ctarjeta):0,
                    'pago':(parseInt(total_ingreso))?parseInt(total_ingreso):0
                }, //capturo array     
                success: function (data) {
                    if (data != "error") {
                        ticket(data,cambio);

                    } else {
                        alert(data);
                    }

                }
            });
        } else {
            var cambio = total_de_venta - total_ingreso;
            alert("falta la cantidad de: $" + cambio);
        }

    });

    function ticket(id,cambio) {
        url = "ticket.php?ticket=" + id+"&cambio="+cambio;
        window.open(url, '_blank', 'width=600,height=650');
        return false;

    }

    function ticket2(id) {
        url = "ticket.php?ticket=" + id;
        window.open(url, '_blank', 'width=600,height=650');
        return false;

    }

    $("#listaver").change(function () {
        var listaver = $("#listaver").val();
        if (listaver == "Venta") {
            $("#divtickets").fadeOut(300);
            $("#divventa").fadeIn(1000);
            $('#leyenda').text('Registro de Venta');
        } else {
            $("#divventa").fadeOut(300);
            $("#divtickets").fadeIn(1000);
            $('#leyenda').text('Lista de Tickets');

        }
    });
</script>
<?php
$hoy = date("Y-m-d");
$validar_fondo_caja = "SELECT * FROM efectivo WHERE usuario = '$Nombre' AND fecha = '$hoy' AND concepto = 'Fondo de Caja'";
$validar_res = mysqli_query($mysqli, $validar_fondo_caja);
if($validar_fondo_caja)
{
    $fondo = mysqli_fetch_assoc($validar_res);
    if($fondo['concepto'] == "Fondo de Caja")
    {
        //echo '<script>alert("ya hay fondo");</script>';
    }
    else
    {
        echo "<script>$('#modalfondo').modal('show'); </script>";
    }
}

?>


</body>

</html>
