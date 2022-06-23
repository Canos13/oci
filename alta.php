<?php

    if(
        isset($_POST['nombre']) &&
        isset($_POST['marca']) &&
        isset($_POST['cantidad']) &&
        isset($_POST['precio']) &&
        isset($_POST['carac'])
    ){
        require('model/BD.php');
        $bd = new BD(); 

        $bd->insertarProducto(
            $_POST['nombre'],
            $_POST['marca'],
            $_POST['precio'],
            $_POST['cantidad'],
            $_POST['carac']
        );

        header("Location: inventario.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/form.css">
    <title>Inventario</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container-fluid px-1 mt-3 py-2 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 style="color:#fff">Dar de alta un producto</h3>
                <div class="card mt-4">
                    <h5 class="text-center mb-4">Rellena los siguientes campos con los datos correctos</h5>
                    <form class="form-card" method="POST" action="">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nombre<span class="text-danger"> *</span></label> <input autocomplete="off" type="text" id="fname" name="nombre"  required onblur="validate(1)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Marca<span class="text-danger"> *</span></label> <input autocomplete="off" type="text" id="lname" name="marca" required onblur="validate(2)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Precio<span class="text-danger"> *</span></label> <input autocomplete="off" type="number" id="email" name="precio" placeholder="" required onblur="validate(3)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Cantidad<span class="text-danger"> *</span></label> 
                                <input autocomplete="off" type="number" id="mob" name="cantidad" placeholder="" required onblur="validate(4)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3">Otras caracteristicas<span class="text-danger"> *</span>
                                </label> <input autocomplete="off" type="text" id="ans" name="carac" required onblur="validate(6)"> </div>
                        </div>
                        <div class="d-inline mx-auto ">
                            <div class="form-group mt-2 "> <button type="submit" class="btn-block btn-primary">Guardar</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="form/form.js"></script>
</body>
</html>