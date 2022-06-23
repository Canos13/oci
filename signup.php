<?php 
    session_start();
    if(isset($_SESSION['usuari'])){
        header("location: dashboard.php");
    }

    if( isset($_POST['usuari']) && isset($_POST['con']) && isset($_POST['flexRadioDefault'])){
        require 'model/BD.php';
        require 'model/Usuario.php';

        $usuario = $_POST['usuari'];
        $con = $_POST['con'];
        $rol = $_POST['flexRadioDefault'];
        
        $bd = new BD();
        $bd->insertarUsuario($usuario,$con,$rol);
        
        $userCurrent = $bd->verifyPASS($usuario,$con);
        $_SESSION['usuari']=$userCurrent->getUsername();
        $_SESSION['rol']=$userCurrent->getRol();
        $_SESSION['id']=$userCurrent->getId();
        header("location: actividad.php");
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
        <?php if(isset($_SESSION['usuari'])){?>
            <div class="alert alert-info h3 text-center">  <?php echo $_SESSION['usuari']?> tu cuenta se ha creado correctamente</div>
        <?php } ?>
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="form-icon">
                        <span><i class="icon icon-user"></i></span>
                    </div>
                    <div class="card-header text-center">
                        <h3>Crear Cuenta</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label > <em>Usuario:</em> </label> 
                            <div class="form-group mb-1">                                 
                                <input type="text" name="usuari" autocomplete="off" autofocus placeholder="Nombre de usuario" class="form-control item">
                            </div>
                            <label > <em>Contraseña:</em> </label> 
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Contraseña" name="con" class="form-control item">
                            </div>
                            <label > <em>Escoje un rol:</em> </label> 
                            <div name="radios" class="my-3">
                                <div class="form-check">
                                    <input class="form-check-input" value="Administrador" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Administrador
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Usuario" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Usuario
                                    </label>
                                </div>
                            </div>
                            <!-- <div class="form-group field image">
                                <label>Image</label>
                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                            </div> -->
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-success item" value="Crear mi cuenta">                     
                            </div>
                        </form>
                    </div>
                    <a href="index.html" class="text-decoration-none mb-3 mx-3" >Inicia Sesión</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>