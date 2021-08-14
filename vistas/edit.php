<?php 
    session_start();
	/* SELECCIONAR LOS DATOS A MOSTRAR*/
    include '../bd/conexion.php';
	$id=$_GET['id'];
	$sql="SELECT * FROM usuarios WHERE id_usuario = '".$id."'";
	$resultado = mysqli_query($con, $sql);
	while($row=mysqli_fetch_assoc($resultado)) {
	/*ACTUALIZAR LOS DATOS*/
	if(isset($_POST['actualizar'])){ 
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$usuario=$_POST['usuario'];
		$contrasena=$_POST['contrasena'];
		$id_rol=$_POST['id_rol'];
		if ($nombre!=null || $usuario!=null) {
			$sql2="UPDATE usuarios SET 
			nombre='".$nombre."',
			apellido='".$apellido."',
			usuario='".$usuario."',
			contrasena='".$contrasena."',
			id_rol='".$id_rol."'
			WHERE 
			id_usuario='".$id."'";
			mysqli_query($con, $sql2);
			if ($nombre=1){
				header('location:lista_usuarios.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="styles/img/MIDORI.ico">
		<title>Editar Usuarios</title>
		<link rel="stylesheet" href="../estilos/styles.css">
		<link rel="stylesheet" href="../estilos.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<!-- Bootstrap -->
	</head>
	<body class="sb-nav-fixed">
		<header>
			<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
				<a class="navbar-brand text-center" href="index.php">MIDORI</a>
				<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
					<i class="fas fa-bars"></i>
				</button>  
				<!--Navbar-->
				<?php include '../shared/navbar.php' ?>
			</nav>
		</header>
		<div id="layoutSidenav">
			<!--sidebar-->
			<?php include '../shared/sidebar.php' ?>
			<div id="layoutSidenav_content" style="margin-top: 85px;">
				<main>
					<div class="container">
						<h2 class="text-center">Editar usuarios</h2>
                        <form class="login-form validate-form" method="POST">

						<label class="form-label text-dark badge bg-info mt-3">Nombres:</label>
                            <div class="wrap-input100">
                                <input class="mb-2 input100" type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'] ?>" placeholder="Nombre">
                                <span class="focus-efecto"></span>
                            </div>

							<label class="form-label text-dark badge bg-info mt-3">Apellidos:</label>
                            <div class="wrap-input100">
                                <input class="mb-2 input100" type="text" id="apellido" name="apellido" value="<?php echo $row['apellido'] ?>" placeholder="Apellido">
                                <span class="focus-efecto"></span>
                            </div>
                            
							<label class="form-label text-dark badge bg-info mt-3">Usuario:</label>
                            <div class="wrap-input100">
                                <input class="mb-2 input100" type="text" id="usuario" name="usuario" value="<?php echo $row['usuario'] ?>" placeholder="Correo electrónico">
                                <span class="focus-efecto"></span>
                            </div>
                            
							<label class="form-label text-dark badge bg-info mt-3">Contraseña:</label>
							<div class="wrap-input100">
								<input class="mb-2 input100" type="text" id="contrasena" value="<?php echo $row['contrasena'] ?>" name="contrasena" placeholder="Contraseña">
								<span class="focus-efecto"></span>
							</div>

                            <!--<div class="wrap-input100" data-validate="Seleccione un rol">
                                <select class="form-control mb-2 input100" id="id_rol" name="id_rol" placeholder="Rol">
                                    <option disabled selected>Seleccionar rol</option>
                                    <option value="1">Visualizador</option>
                                    <option value="2">Administrador</option>
                                </select>
                                <span class="focus-efecto"></span>
                            </div>-->
                            
                            <div class="container">
                                <div class="col-12">
                                    <button type="submit" name="actualizar" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                        </form>
						<?php } ?>
					</div>
				</main>
			</div>
		</div>
		<!--Jquery, Popper & Bootstrap JS-->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<script src="../codigo.js"></script>
	</body>
</html>