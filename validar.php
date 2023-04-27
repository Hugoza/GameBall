<?php
include('db.php');
$usuario=$_POST['usuario'];
$password=$_POST['password'];


$consulta="SELECT*FROM usuarios where usuario='$usuario' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas ['id_cargo']==1){  
    header("location: administrador.html");

}else
if($filas['id_cargo']==2){  
  header("location:home copy.php");

}
else{
    ?>
    <?php
    include("login.html");
  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);