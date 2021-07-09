<?php
    session_start();
    include '../bd/conexion.php';

    if($_SESSION["usuario"] === null){
        header("Location: ../index.php");
    }
    $nombre = $_SESSION['nombre'];

    $sql="SELECT * FROM usuarios";
    $resultado=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registrar Usuario</title>
        <link href="../estilos/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../estilos.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body  class="sb-nav-fixed">
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
                    <div class="container ">
                        <h1 class="text-center mt-2 mb-2">Listado de Usuarios</h1>
                        <label for="busqueda" class="form-label"><i class="fas fa-search"></i></label>
                                <input class="form-control mb-2" placeholder="Buscar" type="text" id="busqueda" style="width: 30%;">
                            <div class="card">
                                <div class="card-header text-center">
                                    Tipos de acogimiento registrados
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                            <table class="table"  width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Usuario</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-dark text-white">
                                    <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Usuario</th>
                                    </tr>
                                </tfoot>
                                <tbody class="busquedatabla">
                                    <?php
                                        $sql="SELECT * FROM usuarios";
                                        $resultado=mysqli_query($con,$sql);
                                        while($fila = mysqli_fetch_array($resultado)) {
                                            $id_usuario=$fila['id_usuario'];
                                            $nombre=$fila['nombre'];
                                            $apellido=$fila['apellido'];
                                            $usuario=$fila['usuario'];
                                        echo "<tr>";
                                            echo '<td>'.$id_usuario.'</td>';
                                            echo '<td>'.$nombre.'</td>';
                                            echo '<td>'.$apellido.'</td>';
                                            echo '<td>'.$usuario.'</td>';
                                        echo "</tr>";
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>     
                </main>
                <?php include '../shared/footer.php' ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../codigo.js"></script>     
        <script src="../estilos/dist/swettalert2.all.min.js"></script>
    </body>
</html>