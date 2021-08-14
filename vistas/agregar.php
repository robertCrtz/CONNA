<?php
    include '../bd/conexion.php';
    session_start();

    if($_SESSION["usuario"] === null){
        header("Location: ../index.php");
    }
	if(isset($_POST['guardar'])){
        $id_persona=$_POST['id_persona'];
		$n_expediente=$_POST['n_expediente'];
		$fechaIngreso=$_POST['fechaIngreso'];
		$fechaMedida=$_POST['fechaMedida'];
		$fechaVencimiento=$_POST['fechaVencimiento'];
		$fechaNotificacion=$_POST['fechaNotificacion'];
        $fechaSupervision=$_POST['fechaSupervision'];
        $trabajoSocial=$_POST['trabajoSocial'];
        $psicologia=$_POST['psicologia'];
        $escucha=$_POST['escucha'];
        $JENA=$_POST['JENA'];
        $id_tipoAcogimiento=$_POST['id_tipoAcogimiento'];
        $id_centroAcogimiento=$_POST['id_centroAcogimiento'];
        $descripAcogimiento=$_POST['descripAcogimiento'];
        $procuradoria=$_POST['procuradoria'];
        $descripProcurador=$_POST['descripProcurador'];
        $id_usuario=$_POST['id_usuario'];

		if($n_expediente!=null || $fechaIngreso!=null || $fechaMedida!=null || $fechaVencimiento!=null || $fechaNotificacion!=null || $fechaSupervision!=null || $id_tipoAcogimiento!=null || $JENA!=null){

			$sql="INSERT INTO control(
                id_persona, 
                n_expediente, 
                fechaIngreso, 
                fechaMedida, 
                fechaVencimiento, 
                fechaNotificacion, 
                fechaSupervision,
                trabajoSocial,
                psicologia,
                escucha,
                JENA,
                id_tipoAcogimiento, 
                id_centroAcogimiento,
                descripAcogimiento,
                procuradoria,
                descripProcurador,
                id_usuario)
			VALUES('".$id_persona."',
                '".$n_expediente."',
                '".$fechaIngreso."',
                '".$fechaMedida."',
                '".$fechaVencimiento."',
                '".$fechaNotificacion."',
                '".$fechaSupervision."',
                '".$trabajoSocial."',
                '".$psicologia."',
                '".$escucha."',
                '".$JENA."',
                '".$id_tipoAcogimiento."',
                '".$id_centroAcogimiento."',
                '".$descripAcogimiento."',
                '".$procuradoria."',
                '".$descripProcurador."',
                '".$id_usuario."'
            )";
        mysqli_query($con,$sql);
        if($n_expediente=1){
            header('Location: pag_inicio.php');
        }
		}else{
			echo '<script>alert("Alerta: Los campos estan vacios");</script>'; 
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
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../estilos.css">
        <link rel="stylesheet" href="../estilos/styles.css">       
    </head>    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../">CONNA</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
            <h2 class="m-auto text-white text-center">Nuevo caso</h2>
            <!--Navbar-->
            <?php include '../shared/navbar.php' ?>
        </nav>
        <div id="layoutSidenav">
            <!--sidebar-->
            <?php include '../shared/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <div class="container">
                    <form class="login-form" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wrap-input100 mb-3" data-validate = "Usuario incorrecto">
                                    <input type="number" name="n_expediente" class="input100" placeholder="N° Expediente">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100">
                                    <label class="form-label badge bg-info mt-3">Fecha de Ingreso:</label>
                                    <input type="date" name="fechaIngreso" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100">
                                    <label class="form-label badge bg-info mt-3">Fecha de Medida</label>
                                    <input type="date" name="fechaMedida" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100 mt-2">
                                    <input type="text" name="JENA" class="input100" placeholder="JENA">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100">
                                    <label class="form-label badge bg-info">Fecha de Notificación</label>
                                    <input type="date" name="fechaNotificacion" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100  mt-2">
                                    <label class="form-label badge bg-info mt-3">Fecha de Supervisión</label>
                                    <input type="date" name="fechaSupervision" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100  mt-2">
                                    <label class="form-label badge bg-info mt-3">Trabajo social</label>
                                    <input type="date" name="trabajoSocial" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100  mt-2">
                                    <label class="form-label badge bg-info mt-3">Psicología</label>
                                    <input type="date" name="psicologia" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wrap-input100 mb-3">
                                    <input type="text" name="escucha" class="input100" placeholder="Escucha">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100">
                                    <label class="form-label badge bg-info mt-3">Fecha de Vencimiento</label>
                                    <input type="date" name="fechaVencimiento" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100" data-validate="Tipo de Acogimiento">
                                    <select class="form-control mb-2 input100" id="id_tipoAcogimiento" name="id_tipoAcogimiento" placeholder="Tipo de Acogimiento">
                                        <option disabled selected>Seleccionar el tipo de Acogimiento</option>
                                        <option value="1">Familiar</option>
                                        <option value="2">Institucional</option>
                                    </select>
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100" data-validate="Tipo de Acogimiento">
                                    <select class="form-control mb-2 input100" id="id_centroAcogimiento" name="id_centroAcogimiento" placeholder="Tipo de Acogimiento">
                                        <option disabled selected>Seleccionar el Centro del Acogimiento</option>
                                        <option value="1">San Salvador</option>
                                        <option value="2">Santa Ana</option>
                                    </select>
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100  mt-2">
                                    <input type="text" name="descripAcogimiento" class="input100" placeholder="Descripción del Acogimiento">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100  mt-2">
                                    <input type="text" name="procuradoria" class="input100" placeholder="Procuradoría">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100  mt-2">
                                    <input type="text" name="descripProcurador" class="input100" placeholder="Descripción del Procurador">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100  mt-2">
                                    <label class="form-label badge bg-info mt-3">Usuario</label>
                                    <input type="number" name="id_usuario" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                                <div class="wrap-input100  mt-2">
                                    <label class="form-label badge bg-info mt-3">Persona</label>
                                    <input type="number" name="id_persona" class="input100">
                                    <span class="focus-efecto"></span>
                                </div>
                                <button type="submit" name="guardar" class="btn btn-primary ml-5">Guardar Caso</button>
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
    </body>
</html>