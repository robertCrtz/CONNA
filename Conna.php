<?php
	class Conna{
		function __construct(){
			try{
				$host="localhost";
				$usuario="root";
				$pass='';
				$db_name="cae_conna";
				//
				$this->con=mysqli_connect($host,$usuario,$pass) or die("Error al conectar al servidor");
				mysqli_select_db($this->con,$db_name) or die("Error al conectarse a la Base");
				//echo "conexion Exitosa";

			}catch(Exception $ex){
				throw $ex;	
			} 
		}

		function contar($sql){
			$reg=$this->con->query($sql);
			$cuantos=$reg->num_rows;
			return $cuantos;
		}

		function agregar($sql,$comprobar){
			$verificar=$this->con->query($comprobar);

			if(($verificar->num_rows)<=0){
				
				mysqli_query($this->con,$sql);
				echo (
                    "<script language='javascript'>
                        alert('OPERACION EXITOSA');
                        window.location='registro_usuario.php';
                </script>");
				die();
			}else{
				echo ("<script>
                        alert('EL REGISTRO YA EXISTE');
                        window.location='registro_usuario.php';
                    </script>");
				die();
			}
			/* if(mysqli_affected_rows($this->con)<=0){
				echo ("<script>alert('LA OPERACION NO SE REALIZO');window.location='listado.php';</script>");
			}else{
				echo ("<script>alert('OPERACION EXITOSA');window.location='listado.php';</script>");	
			} */
		}

        //Solicitar datos de las tablas a especificar 
		function consulta($sql){
			$resultado=$this->con->query($sql);
			//$resultado=mysqli_query($this->con,$sql);

			if($resultado->num_rows > 0){
				$data=NULL;
				while($fila=$resultado->fetch_assoc()){
					$data[]=$fila;
				}
				return $data;

			}else{
				echo ("<script>alert('NO HAY REGISTROS');window.location='inicio.php';</script>");
				die();
			}
		}

		//buscar
		function buscar($sql){
			$resultado=$this->con->query($sql);

			if($resultado->num_rows>0){

				$data=NULL;

				while($fila=$resultado->fetch_assoc()){
					$data[]=$fila;	
				}
				return $data;
			}else {
				echo ("<script>alert('NO SE ENCONTRARON RESULTADOS');window.location='frmBrowse.php';</script>");
				die();
			}
		}

		function modificar($sql){
			mysqli_query($this->con,$sql);

			if(mysqli_affected_rows($this->con)<=0){

				echo ("<script>alert('EL REGISTRO NO SE ACTUALIZO');window.location='listado.php';</script>");

			}else{
				echo ("<script>alert('EL REGISTRO SE ACTUALIZO');window.location='listado.php';</script>");
			}
		}


		function eliminar($sql){
		    mysqli_query($this->con,$sql);
            if(mysqli_affected_rows($this->con)<=0){
                echo ("<script>alert('EL REGISTRO NO SE ELIMINO');window.location='listado.php';</script>");echo "No se Elimino ningun registro";
            }else{
                echo ("<script>alert('EL REGISTRO SE ELIMINO');window.location='listado.php';</script>");
            }
		}



		function login($sql){
			//mysqli_query($this->con,$sql);
			$var=$this->con->query($sql);
			//if(mysqli_affected_rows($this->con)<=0){
			if(($var->num_rows)<=0){
				echo ("<script>alert('LOS DATOS SON INCORRECTOS');window.location='login.php';</script>");
			}else{
				//echo ("<script>alert('BIENVENIDO AL SISTEMA');window.location='index.php';</script>");
				$consulta=$this->con->query($sql);
				$row=$consulta->fetch_assoc();

				session_start();
				$_SESSION['user']=$row['correo'];
				$_SESSION['uid']=$row['idUsuario'];
				$_SESSION['nombreTienda']=$row['detalleTienda'];
				$_SESSION['nombre']=$row['nombres'];
				$_SESSION['apellido']=$row['apellidos'];
				$_SESSION['shop']=$row['idTienda'];
				$_SESSION['nivel']=$row['nivel'];

				if($_SESSION['nivel']==1){
					echo "<script>
							swal({  
								title: 'BIENVENIDO', 
								text: 'KACHADA SYSTEM',
								timer: '1000',   
								},
								function(){
									window.location.href='tienda.php';
								}
							);	
						</script>";
				}elseif ($_SESSION['nivel']==2) {
					# code...
					echo ("<script>alert('BIENVENIDO ADMIN');window.location='stockBodega.php';</script>");
				}
			}
		}

		function multiBorrar($borrar){
			foreach($borrar as $id_borrar){	

				$sql=(" DELETE   from  usuarios where id_usuario='$id_borrar'");	
				$ejecutar=$this->con->query($sql);
			}
			header("location:borrarMulti.php");
		}

		function reservaCreate($sql,$comprobar){
			$verificar=$this->con->query($comprobar);

			if(($verificar->num_rows)<=0){
				mysqli_query($this->con,$sql);
				echo ("<script>alert('OPERACION EXITOSA');window.location='reservaCreate.php';</script>");
				die();

			}else{
				echo ("<script>alert('EL REGISTRO YA EXISTE');window.location='reservaCreate.php';</script>");
				die();
			}
		}
	}
?>
