<?php
include '../bd/conexion.php';
session_start();

if($_SESSION["usuario"] === null){
    header("Location: ../index.php");
}

	if(isset($_POST['guardar'])){
		$n_expediente=$_POST['n_expediente'];
		$fechaIngreso=$_POST['fechaIngreso'];
		$fechaMedida=$_POST['fechaMedida'];
		$fechaVencimiento=$_POST['fechaVencimiento'];
		$fechaNotificacion=$_POST['fechaNotificacion'];
        $fechaSupervision=$_POST['fechaSupervision'];
        $JENA=$_POST['JENA'];

		if($n_expediente!=null || $fechaIngreso!=null || $fechaMedida!=null || $fechaVencimiento!=null || $fechaNotificacion!=null || $fechaSupervision!=null ||
			$JENA!=null){

			$sql="INSERT INTO control(
                n_expediente, 
                fechaIngreso, 
                fechaMedida, 
                fechaVencimiento, 
                fechaNotificacion, 
                fechaSupervision, 
                JENA)
			VALUES('".$n_expediente."',
                '".$fechaIngreso."',
                '".$fechaMedida."',
                '".$fechaVencimiento."',
                '".$fechaNotificacion."',
                '".$fechaSupervision."',
                '".$JENA."'
            )";
        mysqli_query($con,$sql);
        if($n_expediente=1){
            header('Location: pag_inicio.php');
        }
		}else{
			echo '<script language="javascript">alert("Alerta: Los campos estan vacios");</script>'; 
        
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
        <title>Agregar caso</title>
        <link href="../estilos/styles.css" rel="stylesheet" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../estilos.css">
        <link rel="stylesheet" href="vista.css">  
        <link href="../estilos/styles.css" rel="stylesheet" />         
    </head>    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../">CONNA</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!--Navbar-->
            <?php include '../shared/navbar.php' ?>
        </nav>
        <div id="layoutSidenav">
            <!--sidebar-->
            <?php include '../shared/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <div class="container">
                    <h1 class="text-center">Nuevo caso</h1>
                    <form class="login-form" method="post">
                        <div class="wrap-input100 mb-3" data-validate = "Usuario incorrecto">
                            <input type="text" name="n_expediente" class="input100" placeholder="N° Expediente">
                            <span class="focus-efecto"></span>
                        </div>
                        <div class="wrap-input100">
                            <label class="form-label">Fecha de Ingreso:</label>
                            <input type="date" name="fechaIngreso" class="input100">
                            <span class="focus-efecto"></span>
                        </div>
                        <div class="wrap-input100">
                            <label for="exampleInputPassword1" class="form-label">Fecha de Medida</label>
                            <input type="date" name="fechaMedida" class="input100">
                            <span class="focus-efecto"></span>
                        </div>
                        <div class="wrap-input100  mt-2">
                            <label for="exampleInputPassword1" class="form-label">Fecha de Vencimiento</label>
                            <input type="date" name="fechaVencimiento" class="input100">
                            <span class="focus-efecto"></span>
                        </div>
                        <div class="wrap-input100  mt-2">
                            <label for="exampleInputPassword1" class="form-label">Fecha de Notificación</label>
                            <input type="date" name="fechaNotificacion" class="input100">
                            <span class="focus-efecto"></span>
                        </div>
                        <div class="wrap-input100  mt-2">
                            <label class="form-label">Fecha de Supervisión</label>
                            <input type="date" name="fechaSupervision" class="input100">
                            <span class="focus-efecto"></span>
                        </div>
                        <div class="wrap-input100 mt-2">
                            <input type="text" name="JENA" class="input100" placeholder="JENA">
                            <span class="focus-efecto"></span>
                        </div>
                        <button type="submit" name="guardar" class="btn btn-primary">Guardar Caso</button>
                    </form>
                </div>
                <?php include '../shared/footer.php' ?>
            </div>     
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
        <script src="../codigo.js"></script>    
    </body>
</html>