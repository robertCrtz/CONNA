<?php
    session_start();
    include '../bd/conexion.php';

    if($_SESSION["usuario"] === null){
        header("Location: ../index.php");
    }
    $nombre = $_SESSION['nombre'];

    $sql="SELECT * FROM tipo_acogimiento";
    $resultado=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="" />
        <title>Tipo de Acogimiento</title>
        <link rel="stylesheet" href="../estilos.css">
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
            <h2 class="m-auto text-center text-white">Tipo de acogimiento</h2>
            <!--Navbar-->
            <?php include '../shared/navbar.php' ?>
        </nav>
        <div id="layoutSidenav">
            <!--sidebar-->
            <?php include '../shared/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <div class="container">
                    <form class="login-form validate-form" action="registro_usuario.php" method="POST">
                        <div class="row mt-5">
                            <div class="col-md-6">                     
                                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                                    <input class="mb-2 input100" type="text" id="usuario" name="usuario" placeholder="Ingresar nuevo tipo de acogimiento">
                                    <span class="focus-efecto"></span>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Tipos de acogimiento registrados
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                <thead>
                                                    <tr class="bg-dark text-white">
                                                        <th>#</th>
                                                        <th>Tipo de acogimiento</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-dark text-white">
                                                        <th>#</th>
                                                        <th>Tipo de acogimiento</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody class="busquedatabla">
                                                    <?php
                                                        $sql="SELECT * FROM tipo_acogimiento";
                                                        $resultado=mysqli_query($con,$sql);
                                                            while($fila = mysqli_fetch_array($resultado)) {
                                                        $id_tipoAcogimiento=$fila['id_tipoAcogimiento'];
                                                        $nombreAcogimiento=$fila['nombreAcogimiento'];
                                                        echo "<tr>";
                                                            echo '<td>'.$id_tipoAcogimiento.'</td>';
                                                            echo '<td>'.$nombreAcogimiento.'</td>';
                                                        echo "</tr>";
                                                        } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php include '../shared/footer.php' ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../codigo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../estilos/demo/datatables-demo.js"></script>
    </body>
</html>
