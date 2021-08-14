<?php
    session_start();
    require_once'../Conna.php';

	$conn = new Conna();
	$sql=("SELECT * FROM control");
	$datos=$conn->consulta($sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="" />
        <title>Principal</title>
        <link rel="stylesheet" href="../estilos.css">
        <link rel="stylesheet" href="../estilos/styles.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">CONNA</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="m-auto text-white navbar-brand">INICIO</h1>
            <!--Navbar-->
            <?php include '../shared/navbar.php' ?>
        </nav>
        <div id="layoutSidenav">
            <!--sidebar-->
            <?php include '../shared/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <!-- Buscador -->
                        <div class="form-group mt-3">
                            <div class="col-6 col-md-4">
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="lupa"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Buscar" type="text" id="busqueda" aria-label="Buscar" aria-describedby="lupa">
                                </div>
                            </div>
                        </div>
                        <!-- tabla -->
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i> Casos actuales</div>
                            <div class="card-body">
                                <div class="table-responsive table-hover">
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="bg-dark text-white">
                                                <th>N° Expediente</th>
                                                <th>Ingreso</th>
                                                <th>Medida</th>
                                                <th>Vencimiento</th>
                                                <th>Notificación</th>
                                                <th>Supervisión</th>
                                                <th>Tipo Acogimiento</th>
                                                <th>JENA</th>
                                                <th>Psicologia</th>
                                                <th>Procuradoria</th>
                                                <th>Trabajo Social</th>
                                                <th>Escucha</th>
                                            </tr>
                                        </thead>
                                        <tbody class="busquedatabla">
                                            <?php foreach ($datos as $fila){  ?>
                                                <tr>
                                                    <td align="center"><?php echo $fila['n_expediente']; ?></td>
                                                    <td align="center"><?php echo $fila['fechaIngreso']; ?></td>
                                                    <td align="center"><?php echo $fila['fechaMedida']; ?></td>
                                                    <td align="center"><?php echo $fila['fechaVencimiento']; ?></td>
                                                    <td align="center"><?php echo $fila['fechaNotificacion']; ?></td>
                                                    <td align="center"><?php echo $fila['fechaSupervision']; ?></td>
                                                    <td align="center"><?php echo $fila['id_tipoAcogimiento']; ?></td>
                                                    <td align="center"><?php echo $fila['JENA']; ?></td>
                                                    <td align="center"><?php echo $fila['psicologia']; ?></td>
                                                    <td align="center"><?php echo $fila['procuradoria']; ?></td>
                                                    <td align="center"><?php echo $fila['trabajoSocial']; ?></td>
                                                    <td align="center"><?php echo $fila['escucha']; ?></td>
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../estilos/demo/datatables-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </body>
</html>
