<?php
  session_start();
  if(isset($_SESSION['usuari'])){
    header("location: dashboard.php");
  }

  $usuario=$_POST['usuari'];
  $contrasena=$_POST['con'];
  
  
  require 'model/BD.php';
  require 'model/Usuario.php';

  $bd = new BD();
  $userCurrent = $bd->verifyPASS($usuario,$contrasena);
  if($userCurrent){
    $_SESSION['usuari']=$userCurrent->getUsername();
    $_SESSION['rol']=$userCurrent->getRol();
    $_SESSION['id']=$userCurrent->getId();

    header("location: actividad.php");
  } else { 
      include("index.html"); ?>
      <h1 class="alert alert-danger text-center p-3">ERROR DE AUTENTIFICACION</h1>
<?php }

?>
 
