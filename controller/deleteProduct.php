<?php

    if(isset($_POST['deleteProduct'])){
        require('../model/BD.php');
        $bd = new BD(); 

        $bd->deleteProduct($_POST['deleteProduct']);
        header("Location: ../inventario.php");
    }

?>