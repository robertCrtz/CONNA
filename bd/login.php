<?php
include 'conexion.php';
session_start();

//recepción de datos enviados mediante POST
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$pass = md5($contrasena); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$query = "SELECT COUNT (*) AS contar FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena' ";
$consulta = mysqli_query($con, $query);
$array = mysqli_fetch_array($con, $consulta);

if($array['contar']>0){
    $_SESSION['usuario'] = $usuario;
    header("location: ../dashbord.php/index.php");
}else{
    echo "Datos incorrectos";
}