<?php
  include 'conexion.php';

  $usuario=$_POST['usuario'];
  $contrasena=$_POST['contrasena'];
  session_start();
  $_SESSION['usuario']=$usuario;
  $_SESSION['id_rol']=$id_rol;

  $consulta="SELECT*FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'";
  $resultado=mysqli_query($con,$consulta);

  $filas=mysqli_num_rows($resultado);

  if($filas){
      header("location:../vistas/pag_inicio.php");
  }else{
  ?>
    <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($con);