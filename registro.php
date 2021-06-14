<?php 
    if(!empty($_POST))
    {
        $alert = '';
        if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['usuario']) || empty($_POST['contrasena']))
        {
            $alert='<p>Todos los campos osn obligatorios</p>';
        }else{

            include 'bd/conexion.php';

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];

            $query = mysqli_query($con,"SELECT * FROM usuarios WHERE nombre = '$nombre' OR usuario = '$usuario'");
            $resultado = mysqli_fetch_array($query);

            if($resultado > 0){
                $alert = '<p>El correo o el usuario ya existe</p>';
            }else{
                $query_insert = mysqli_query($con, "INSERT INTO usuarios(usuario, contrasena, nombre, apellido)
                VALUES('$usuario','$contrasena','$nombre','$apellido')");

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

<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registrar Usuario</title>

        <link rel="stylesheet" href="estilos/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
    </head>
    
    <body>
     
      <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="registro.php" method="POST">
                <span class="login-form-title">REGISTRATE</span>

                <div class="wrap-input100" data-validate="Campo incorrecto">
                    <input class="input100" type="text" id="nombre" name="nombre" placeholder="Nombre">
                    <span class="focus-efecto"></span>
                </div>

                <div class="wrap-input100" data-validate="Campo incorrecto">
                    <input class="input100" type="text" id="apellido" name="apellido" placeholder="Apellido">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Correo electrónico">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="contrasena" name="contrasena" placeholder="Contraseña">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">Agregar</button>
                    </div>
                    <div class="mt-3">¿Ya tienes cuenta?<a href="index.php"> Inicia sesión</a></div>
                </div>
            </form>
        </div>
    </div>     
        
         
     <script src="estilos/bootstrap/js/bootstrap.min.js"></script>    
     <script src="estilos/popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="codigo.js"></script>    
    </body>
</html>