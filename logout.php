<?php
  session_start();
  require('model/BD.php');
  
  date_default_timezone_set('America/Mexico_City');
  $DateAndTime = date('m/d/Y h:i:s a', time()); 

  $entrada=$_SESSION[$entrada];
  
  $bd = new BD(); 
  $bd->horaSalida($DateAndTime, $entrada);
  
  /* 
  * Destroying the session and redirecting to the index.html page. 
  */
  session_unset();
  session_destroy();
  header('Location: index.html');
?>