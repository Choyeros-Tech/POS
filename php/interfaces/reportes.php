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
    <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
  #backButton {
    border-radius: 4px;
    padding: 8px;
    border: none;
    font-size: 16px;
    background-color: #2eacd1;
    color: white;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
  }
  .invisible {
    display: none;
  }
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
                        <li class="active">
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
                        <h4 class="page-title pull-left">Ingresos</h4>
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
            <br><br><br>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <div class="form-row">
                                <div class="col-md-12 mb-12">
                                    <div id="cortecontainer" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="main-content-inner">
            <br><br><br>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <div id="ingresoscontainer" style="height: 300px; width: 100%;"></div>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <div id="egresoscontainer" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
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
<script src="../../assets/js/plugins.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("cortecontainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "$<?php $cash = $total_ventas-$egreso_dinero; echo $cash;?>"
    },
    axisY: {
        title: "Dinero en Caja"
    },
    data: [{        
        type: "column",  
        legendMarkerColor: "grey",
        dataPoints: [      
            { y: <?php echo $total_ventas;?>, label: "Ingresos" },
            { y: <?php echo $egreso_dinero;?>, label: "Egresos" },
            //{ y: <?php //echo $egreso_dinero;?>, label: "Salidas" },
           // { y: <?php //echo "0"?>, label: "En Caja" },
           <?php echo $totales_por_usuario;?>
        ]
    }]
});
chart.render();

/////////////

var totalVisitors = 883000;
var visitorsData = {
    "Ingresos y Egresos": [{
        cursor: "pointer",
        explodeOnClick: false,
        innerRadius: "75%",
        legendMarkerType: "square",
        name: "Ingresos y Egresos",
        radius: "100%",
        showInLegend: true,
        startAngle: 90,
        type: "doughnut",
        dataPoints: [
            { y: <?php echo $ingreso_dinero; ?>, name: "Ingresos", color: "#E7823A" },
            { y: <?php echo $egreso_dinero; ?>, name: "Egresos", color: "#546BC1" }
        ]
    }]
};

var newVSReturningVisitorsOptions = {
    animationEnabled: true,
    theme: "light2",
    title: {
        text: "Ingresos y Egresos"
    },
    legend: {
        fontFamily: "calibri",
        fontSize: 14,
        itemTextFormatter: function (e) {
            return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / <?php echo $ingresos_egresos; ?> * 100) + "%";  
        }
    },
    data: []
};

var visitorsDrilldownedChartOptions = {
    animationEnabled: true,
    theme: "light2",
    axisX: {
        labelFontColor: "#717171",
        lineColor: "#a2a2a2",
        tickColor: "#a2a2a2"
    },
    axisY: {
        gridThickness: 0,
        includeZero: false,
        labelFontColor: "#717171",
        lineColor: "#a2a2a2",
        tickColor: "#a2a2a2",
        lineThickness: 1
    },
    data: []
};

var chart = new CanvasJS.Chart("ingresoscontainer", newVSReturningVisitorsOptions);
chart.options.data = visitorsData["Ingresos y Egresos"];
chart.render();

function visitorsChartDrilldownHandler(e) {
    chart = new CanvasJS.Chart("ingresoscontainer", visitorsDrilldownedChartOptions);
    chart.options.data = visitorsData[e.dataPoint.name];
    chart.options.title = { text: e.dataPoint.name }
    chart.render();
    $("#backButton").toggleClass("invisible");
}

}

<?php
if(isset($_GET['registrado']))
{
    echo '<script>swal("Registrado!", "Lo podrás ver en tu lista!", "success");</script>';
}
?>
</script>
</body>

</html>
