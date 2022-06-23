<?php 
    /* require('model/BD.php');
    require('model/Usuario.php');

    $bd = new BD(); */
    session_start();
    if(!isset($_SESSION['usuari'])){
        header('Location: index.html');
    } else {
        
        $usuario=$_SESSION['usuari'];
    }
   /*  $user = $bd->consultarROl($usuario); */

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <img class="w-25 mx-auto pt-5 d-block" src="images/Control-de-Inventario.jpg" alt="Control-de-Inventario">
    <p class="h3 mt-5 text-center font-italic">Bienvenido <?php echo $usuario ?>, a tu Inventario InvCno</p>
</body>
</html>