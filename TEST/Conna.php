<?php
	class Conexion{

		private $connection;

		public function __construct(){
			$this->connection = new mysqli("localhost", "root", "", "cae_conna");
		} 


		public function login($usuario, $contrasena){
			$mysqli = $this->init();
			$q = 'SELECT id_usuario FROM usuarios WHERE usuario = "'.$usuario.'" AND contrasena = "'.$contrasena.'";';
			if($result = $this->connection->query($q)) {
				if($result->num_rows >= 1 ){
					$usrID = $result->fetch_object();
					$result->close();
					return $usrID->id_usuario;
				} else {
					return null;
				}
			}
		}
		

		public function add($usuario, $contrasena){
			$res = $this->connection->query("INSERT INTO `usuarios` (`usuario`,`contrasena`) VALUES ('$usuario', '$contrasena')");
			if($this->connection->affected_rows == 1 ){
				return true;
			}else{
				return false;
			}
		}
	}
?>
