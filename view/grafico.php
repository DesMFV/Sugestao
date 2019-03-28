<!DOCTYPE html>
<html lang="en">
<?php



?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>SB Admin - Tables</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="https://www.urcamp.edu.br/"><img class="logo-home" src="../img/logo-branco.png"></a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form action="" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            <input type="text" name="texto-pesquisa" class="form-control" placeholder="Procurar por..." aria-label="Search" aria-describedby="basic-addon2">

            <input type="submit" class="btn btn-primary" value="Procurar">


        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">

                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <div class="admin-perfil">
                    <div class="box-ft">
                    </div>
                    <div class="admin-descricao">
                        <span class="des-nome">
                            Nome teste
                        </span>
                    </div>
                </div>
                <a class="nav-link" href="https://www.urcamp.edu.br/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <!--  
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
      -->
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Login Screens:</h6>
                    <a class="dropdown-item" href="login.html">Login</a>
                    <a class="dropdown-item" href="register.html">Register</a>
                    <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Other Pages:</h6>
                    <a class="dropdown-item" href="404.html">404 Page</a>
                    <a class="dropdown-item" href="blank.html">Blank Page</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span class="">Sugestões</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="grafico.php">
                    <i class="tab-selected"></i>
                    <span class="tab-selected">Aval Central</span></a>
            </li>

        </ul>

        <div id="content-wrapper">


        <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            
                            <div class="card-header">
                                
                            <?php

if(isset($_GET["texto-pesquisa"])) { 
    echo "<a href=\"admin.php\">Sair da pesquisa</a>";
} 

else {

    $selecionado = $_GET["filtro"];

    if ($selecionado == 'Entrada') {
        echo "<form class=\"form-header-filter\" action=\"\" mathod=\"get\">
    <input type=\"submit\" value=\"Filtrar\">
    <select class=\"select-filter\" id=\"asdf\" name=\"filtro\" requrired>
        <option selected=\"selected\" value=\"Entrada\">Entrada</option>
        <option value=\"Arquivadas\">Arquivadas</option>
        <option value=\"Excluidas\">Excluidas</option>
    </select>
    </form>";
    } else if ($selecionado == 'Arquivadas') {
        echo "<form class=\"form-header-filter\" action=\"\" mathod=\"get\">
    <input type=\"submit\" value=\"Filtrar\">
    <select class=\"select-filter\" id=\"asdf\" name=\"filtro\" requrired>
        <option value=\"Entrada\">Entrada</option>
        <option selected=\"selected\" value=\"Arquivadas\">Arquivadas</option>
        <option value=\"Excluidas\">Excluidas</option>
    </select>
    </form>";
    } else if ($selecionado == 'Excluidas') {
        echo "<form class=\"form-header-filter\" action=\"\" mathod=\"get\">
    <input type=\"submit\" value=\"Filtrar\">
    <select class=\"select-filter\" id=\"asdf\" name=\"filtro\" requrired>
        <option value=\"Entrada\">Entrada</option>
        <option value=\"Arquivadas\">Arquivadas</option>
        <option selected=\"selected\" value=\"Excluidas\">Excluidas</option>
    </select>
    </form>";
    } else {
        echo "<form class=\"form-header-filter\" action=\"\" mathod=\"get\">
    <input type=\"submit\" value=\"Filtrar\">
    <select class=\"select-filter\" id=\"asdf\" name=\"filtro\" requrired>
        <option selected=\"selected\" value=\"Entrada\">Entrada</option>
        <option value=\"Arquivadas\">Arquivadas</option>
        <option value=\"Excluidas\">Excluidas</option>
    </select>
    </form>";
    }
}
?>
                            </div>
                            <div class="card-body">
                                <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="myBarChart" width="837" height="418" style="display: block; width: 837px; height: 418px;" class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

                    <?php

                    $qArray;

                    
                        require '../vendor/autoload.php';
                        $q  = new Matheus\Models\Respostas();

                        $qArray = array(
                            1 => $q->resultSearch(1), $q->resultSearch(2), $q->resultSearch(3), $q->resultSearch(4)
                        );

                        echo "<script>
            var ctx = document.getElementById('myBarChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                    datasets: [{
                        label: '# of Votes',
                        data: [" . $qArray[1] . "," . $qArray[2] . "," . $qArray[3] . "," . $qArray[4] . ", 0, 5],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            barPercentage: 10,
                            barThickness: 100,
                            maxBarThickness: 500,
                            minBarLength: 500,
                            gridLines: {
                                offsetGridLines: true
                            }
                        }]
                    }
                }
            });
        </script>";



                        ?>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2019</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html> 
