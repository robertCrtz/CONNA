<?php 
	include '../bd/conexion.php';

	//Obtener por su ID asignada
	$id=$_GET['id'];
	$sql="DELETE FROM usuarios WHERE id_usuario='".$id."'";
	mysqli_query($con,$sql);
	header('Location:lista_usuarios.php');
 ?>