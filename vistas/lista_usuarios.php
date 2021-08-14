<?php
    session_start();
    require_once'../Conna.php';
    include '../bd/conexion.php';

	$conn = new Conna();
	$sql=("SELECT * FROM usuarios");
	$datos=$conn->consulta($sql);
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
            <h1 class="text-center m-auto mt-2 mb-2 text-white">Listado de Usuarios</h1>
            <!--Navbar-->
            <?php include '../shared/navbar.php' ?>
        </nav>
        <div id="layoutSidenav">
            <!--sidebar-->
            <?php include '../shared/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container ">
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
                            <div class="card">
                                <div class="card-header text-center">
                                    
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                            <table class="table"  width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Rol</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="busquedatabla">
                                    <?php foreach ($datos as $fila){  ?>
                                        <tr>
                                            <td><?php echo $fila['nombre']; ?></td>
                                            <td><?php echo $fila['apellido']; ?></td>
                                            <td><?php echo $fila['usuario']; ?></td>
                                            <td><?php echo $fila['contrasena']; ?></td>
                                            <td><?php echo $fila['id_rol']; ?></td>
                                            <td><a href="edit.php?id=<?php echo $fila['id_usuario'];?>" class="btn btn-sm btn-warning">Edit</a></td>
                                            <td><a href="delete.php?id=<?php echo $fila['id_usuario'];?>" class="btn btn-sm btn-danger">Delete</a></td>
                                        </tr>
                                    <?php } ?>
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
    </body>
</html>