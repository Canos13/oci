<?php 
    
    session_start();

    if(isset($_SESSION['usuari']) && isset($_POST['actividad'])){
        require('model/BD.php');
        $usuario=$_SESSION['usuari'];
        $actividad=$_POST['actividad'];
        $hora=$_POST['hora'];
        $user_id=$_SESSION['id'];

        $_SESSION[$entrada] = $hora ;
        $bd = new BD();
        $bd->registrarAct($usuario, $actividad, $hora, $user_id);

        header("location: dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/login.ico" type="image/x-icon">
    <title>Crear Cuenta</title>
</head>
<body>
    <header>
        <h1 class="text-center">Inventario de Hardware</h1>
    </header>
    <div class="container p-4 ">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Registra tu actividad</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label><em>Hora:</em></label> 
                            <div class="form-group mb-1"> 
                            <?php 
                                date_default_timezone_set('America/Mexico_City');
                                $DateAndTime = date('m/d/Y h:i:s a', time()); 
                            ?>                               
                                <input type="text" name="hora" value="<?php echo $DateAndTime ?>." class="form-control item" readonly >
                            </div>
                            <label><em>¿Qué realizará en el sistema?</em></label> 
                            <div class="form-group mb-3">
                                <textarea  placeholder="Escriba lo que hará" autofocus name="actividad" class="form-control item" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-success item" value="Registrar y comenzar">                     
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>