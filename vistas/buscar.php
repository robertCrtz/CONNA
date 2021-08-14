<?php 
    include '../bd/conexion.php';

    $busqueda = $_REQUEST['busqueda'];
    if(empty($busqueda))
    {
        echo 'No se encontró el dato';
        header("Location: header pag_inicio.php");
    }
?>