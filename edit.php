<?php
    require('model/Producto.php');
    require('model/BD.php');
    $bd = new BD();
    $ProductoBD = $bd->getProductById($_GET['id']);
    if(
        isset($_POST['nombre']) &&
        isset($_POST['marca']) &&
        isset($_POST['cantidad']) &&
        isset($_POST['carac']) &&
        isset($_POST['precio'])
    ){

        $bd->actualizarProducto(
            $ProductoBD->getId(),
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
    <?php 
        include('navbar.php'); 
        if($ProductoBD){ ?>
            <div class="container-fluid px-1 mt-3 py-2 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                        <h3 style="color:#fff">Editar un producto</h3>
                        <div class="card mt-4">
                            <h5 class="text-center mb-4">Cambie los campos que desea actualizar</h5>
                            <form class="form-card" method="POST" action="">
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex"> 
                                        <label class="form-control-label px-3">Nombre<span class="text-danger"> *</span></label> 
                                        <?php printf('<input autocomplete="off" type="text" id="fname"  name="nombre" value="%s" onblur="validate(1)">', $ProductoBD->getNombre()); ?>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex" > 
                                        <label class="form-control-label px-3">Marca<span class="text-danger"> *</span></label>
                                        <?php printf('<input autocomplete="off" type="text" id="lname" name="marca" value="%s" onblur="validate(2)">', $ProductoBD->getMarca()); ?>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Precio<span class="text-danger"> *</span></label> 
                                        <?php printf('<input autocomplete="off" type="number" id="email" name="precio" value="%d" onblur="validate(3)">', $ProductoBD->getPrecio()); ?>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> 
                                        <label class="form-control-label px-3">Cantidad<span class="text-danger"> *</span></label> 
                                        <?php printf('<input autocomplete="off" type="number" id="mob" name="cantidad" value="%d" onblur="validate(4)">', $ProductoBD->getCantidad()); ?> </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex"> 
                                        <label class="form-control-label px-3">Otras caracteristicas<span class="text-danger"> *</span>
                                        </label> 
                                        <?php printf('<input autocomplete="off" type="text" id="ans" name="carac" value="%s" onblur="validate(6)">', $ProductoBD->getCaract()); ?>
                                    </div>
                                </div>
                                <div class="d-inline mx-auto ">
                                    <div class="form-group mt-2 "> <button type="submit" class="btn-block btn-primary">Guardar</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php   
        }    
    ?>

    <script src="form/form.js"></script>
</body>
</html>