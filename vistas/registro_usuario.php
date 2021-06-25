<?php 
    session_start();
    if($_SESSION["usuario"] === null){
        header("Location: ../index.php");
    }
    if(!empty($_POST))
    {
        $alert = '';
        if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['usuario']) || empty($_POST['contrasena']))
        {
            $alert='<p>Todos los campos son obligatorios</p>';
        }else{

            include '../bd/conexion.php';

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $id_rol = $_POST['id_rol'];

            $query = mysqli_query($con,"SELECT * FROM usuarios WHERE nombre = '$nombre' OR usuario = '$usuario'");
            $resultado = mysqli_fetch_array($query);

            if($resultado > 0){
                $alert = '<p>El correo o el usuario ya existe</p>';
            }else{
                $query_insert = mysqli_query($con, "INSERT INTO usuarios(usuario, contrasena, nombre, apellido, id_rol)
                VALUES('$usuario','$contrasena','$nombre','$apellido','$id_rol')");

                //Si los datos enviados son TRUE...
                if($query_insert){ 
                    $alert='<p>Usuario creado correctamente</p>';
                }else{
                    $alert='<p>Error al crear el usuario</p>';
                }
            }
        }
    }
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
        <!-- Sweet Alert -->
        <link rel="stylesheet" href="../estilos/package/dist/sweetalert2.min.css">
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
                        <h1 class="text-center mt-2 mb-2">Registro de Usuarios</h1>
                        <form class="login-form validate-form" action="registro_usuario.php" method="POST">

                            <div class="wrap-input100" data-validate="Campo incorrecto">
                                <input class="mb-2 input100" type="text" id="nombre" name="nombre" placeholder="Nombre">
                                <span class="focus-efecto"></span>
                            </div>

                            <div class="wrap-input100" data-validate="Campo incorrecto">
                                <input class="mb-2 input100" type="text" id="apellido" name="apellido" placeholder="Apellido">
                                <span class="focus-efecto"></span>
                            </div>
                            
                            <div class="wrap-input100" data-validate = "Usuario incorrecto">
                                <input class="mb-2 input100" type="text" id="usuario" name="usuario" placeholder="Correo electrónico">
                                <span class="focus-efecto"></span>
                            </div>
                            
                            <div class="wrap-input100" data-validate="Contraseña incorrecta">
                                <input class="mb-2 input100" type="password" id="contrasena" name="contrasena" placeholder="Contraseña">
                                <span class="focus-efecto"></span>
                            </div>
                            <div class="wrap-input100" data-validate="Seleccione un rol">
                                <select class="form-control mb-2 input100" id="id_rol" name="id_rol" placeholder="Rol">
                                    <option disabled selected>Seleccionar rol</option>
                                    <option value="1">Visualizador</option>
                                    <option value="2">Administrador</option>
                                </select>
                                <span class="focus-efecto"></span>
                            </div>
                            
                            <div class="container">
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                        </form>
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