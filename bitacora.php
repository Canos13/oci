<?php 
    session_start();
    if(isset($_SESSION['usuari'])){
        $usuario=$_SESSION['usuari'];
    }

    require('model/Bitacora.php');
    require('model/BD.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bitacora</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <p class="text-center h3 mt-3">Registro de actividades en los usuarios</p>

    <table class="table mt-3 mx-auto w-75">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Usuario</th>
            <th scope="col">Actividad</th>
            <th scope="col" class="text-center">Hora de inicio</th>
            <th scope="col" class="text-center">Hora de Fin</th>
        </tr>
    </thead>
    <tbody>
        <?php     
            $bd = new BD();
            
            if($_SESSION['rol'] == 'Administrador'){
                $actividad = $bd->consultarActividad();
            } else {
                $actividad = $bd->consultarActividadId($_SESSION['id']);
            }
                
            if($actividad){
                $count= 1;
                foreach($actividad as $act){                  
                    printf('<tr>');
                        printf('<th scope="row"> %d </th>', $count);
                        printf('<td> %s </td>', $act->getUsuario());
                        printf('<td> %s </td>',  $act->getActividad());
                        printf('<td class="text-center"> %s </td>', $act->getHora());
                        if($act->getFin()){
                            printf('<td class="text-center"> %s </td>', $act->getFin());    
                        } else {
                            printf('<td class="text-center"> <img class="formato" src="images/active.ico" /> Activo </td>'); 
                        }
                    printf('</tr>');
                    $count++;
                }
            } 
        ?>
    </tbody>
    </table>
</body>
</html>