<?php
    session_start();
    require('model/Producto.php');
    require('model/BD.php');
    $bd = new BD();
    $productos = $bd->consultarProducto();

    /* $ProductoBD = $bd->getProductById(); */
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/inv.css">
    <link rel="stylesheet" href="styles/popup.css">
    <title>Inventario</title>
</head>
<body>
    
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Inventario de productos</h2>
					</div>
					<div class="col-sm-6">
                        <?php if($_SESSION['rol'] == 'Administrador') {?>
                            <a href="alta.php" class="btn btn-success">
                                <i class="material-icons">&#xE147;</i> 
                                <span>Dar de alta un producto</span>
                            </a>
                        <?php } ?>
					</div>
                </div>
            </div>

            <?php if($productos){?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Caracteristicas</th>
                            <?php if($_SESSION['rol'] == 'Administrador') {?>
                                <th>Editar/Eliminar</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php      
                            $cont = 1;
                            foreach($productos as $producto){
                                printf('<tr>');
                                    printf('<th> %d </th>', $cont);
                                    printf('<td> %s </td>', $producto->getNombre());
                                    printf('<td> %s </td>',  $producto->getMarca());
                                    printf('<td> %d </td>',  $producto->getPrecio());
                                    printf('<td> %d </td>',  $producto->getCantidad());
                                    printf('<td> %s </td>',  $producto->getCaract());
                                    if($_SESSION['rol'] == 'Administrador'){
                                        printf('<td class="text-center">');
                                            printf('<a href="edit.php?id=%d" class="edit mr-3"">
                                                        <i class="material-icons">&#xE254;</i>
                                                    </a>', $producto->getId(),$producto->getId());    
                                            printf('<a href="#popupDelete" class="delete" onclick="delet(%d)">
                                                        <i class="material-icons">&#xE872;</i>
                                                    </a>', $producto->getId());
                                        printf('</td>');
                                    }
                                    
                                printf('</tr>');
                                $cont++;
                            }   
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <h3 class="text-center mt-3">No hay inventario</h3>
            <?php } ?>
        </div>
    </div>

    <div id="popupDelete" class="overlay">
        <div class="popup">
            <h2 class="headerCategory">¿Desea eliminar este producto?</h2>
            <a class="close" href="#">&times;</a>
            <a class="text-decoration-none btn btn-success mx-5" href="#">No, conservar</a>
            <div class="content d-inline ">
                <form class="d-inline" action="controller/deleteProduct.php" method="POST">
                    <input type="number" id="deleteProduct" name="deleteProduct" style="display:none">
                    <input class="btn btn-danger" type="submit" value="Si, eliminar">
                </form>
            </div>
        </div>
    </div>
    
    <script>
        /**
         * When the delete button is clicked, the index of the product is passed to the deleteProduct
         * input field.
         */
        function delet(index){
            console.log(index);
            var deleteProduct = document.getElementById('deleteProduct');
            deleteProduct.setAttribute("value", index);
        }
    </script>
</body>
</html>