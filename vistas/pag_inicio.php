<?php
    session_start();
    include '../bd/conexion.php';

    if($_SESSION["usuario"] === null){
        header("Location: ../index.php");
    }

    $sql="SELECT * FROM control";
    $resultado=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="" />
        <title>Principal</title>
        <link href="../estilos/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">CONNA</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
            <!--Navbar-->
            <?php include '../shared/navbar.php' ?>
        </nav>
        <div id="layoutSidenav">
            <!--sidebar-->
            <?php include '../shared/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Inicio</h1>
                        <!-- grafica -->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i> Ingresos de casos por mes</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <!-- grafica -->
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Ingresos de casos por año</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <!-- tabla -->
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i> Casos actuales</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>N° Expediente</th>
                                                <th>Ingreso</th>
                                                <th>Medida</th>
                                                <th>vencimiento</th>
                                                <th>Notificación</th>
                                                <th>Supervisión</th>
                                                <th>JENA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>N° Expediente</th>
                                                <th>Ingreso</th>
                                                <th>Medida</th>
                                                <th>vencimiento</th>
                                                <th>Notificación</th>
                                                <th>Supervisión</th>
                                                <th>JENA</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?php echo $fila['n_expediente']; ?></td>
                                                    <td><?php echo $fila['fechaIngreso']; ?></td>
                                                    <td><?php echo $fila['fechaMedida']; ?></td>
                                                    <td><?php echo $fila['fechaVencimiento']; ?></td>
                                                    <td><?php echo $fila['fechaNotificacion']; ?></td>
                                                    <td><?php echo $fila['fechaSupervision']; ?></td>
                                                    <td><?php echo $fila['JENA']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include '../shared/footer.php' ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../codigo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../estilos/demo/chart-area-demo.js"></script>
        <script src="../estilos/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../estilos/demo/datatables-demo.js"></script>
    </body>
</html>
