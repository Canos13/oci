<?php

    session_start();
    require('../model/BD.php');
    require('../model/Agenda.php');
    $agenda = new Agenda();
    $bd = new BD();
    $user_id=$_SESSION['id'];

    if(
        isset($_POST['nombre']) &&
        isset($_POST['fecha']) &&
        isset($_POST['motivo'])
    ){ 
        $consulta = $bd->insertarCita($_POST['nombre'],$_POST['fecha'],$_POST['motivo'], $user_id);
    }
    
    if($_SESSION['rol'] == 'Administrador'){
        $citas = $bd->obtenerAgendas();
    } else {
        $citas = $bd->obtenerAgendasUsuario($user_id);
    }
    
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/agenda.css">
    <title>Soporte</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-4 mb-1 d-flex justify-content-center">

        <?php if($_SESSION['rol'] != 'Administrador'){ ?>
            <div class="card border-secondary me-5 w-25">
                <form action="" method="POST" class="card-body">
                    <h4 class="information mb-2 text-center">Agendar una Cita</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label >Nombre completo: </label> 
                                <input class="form-control" autofocus required type="text" name="nombre" placeholder="nombre">
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label >Escoge una fecha: </label>
                                <input name="fecha" required class="form-control" type="date">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label >Razones de la cita: </label>
                                <textarea required class="form-control" name="motivo" type="text"></textarea> 
                            </div>
                        </div>
                    </div>
                    <input value="Agendar" type="submit" class="mt-3 d-block mx-auto text-center btn btn-primary">
                </form>
            </div>
        <?php } ?>

        <div class="card px-1 w-75">     
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-4">
                            </div>
                            <div class="mt-2 text-center col-sm-4">
                                <h4 class="information">Mis citas</h4>
                            </div>
                        </div>
                    </div>

                    <?php  if($citas){  ?>
                    
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Motivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach($citas as $cita){
                                        printf('<tr>');
                                            printf('<th>%d</th>', $i);
                                            printf('<td>%s</td>', $cita->getNombre());
                                            printf('<td>%s</td>', $cita->getFecha());
                                            printf('<td>%s</td>', $cita->getMotivo());
                                        printf('</tr>');
                                        $i++;
                                    }
                                ?>     
                            </tbody>
                        </table>

                    <?php  } else { ?>
                        <h3 class="text-center my-4">No hay citas agendadas</h3>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</body>
</html>