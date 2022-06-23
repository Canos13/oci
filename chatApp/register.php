<?php
    $bd = "inv";
    $host = "localhost";
    $user = "root";
    $password = "";

    $conect = @mysqli_connect($host, $user, $password, $bd);
    if(!$conect) die ( "ERROR");
    session_start();
    $user = $_SESSION['usuari'];
    $message = $_POST['message'];

    $sql = "INSERT INTO conversa (usuario, mensaje ) VALUES ('$user', '$message')";
    $result = mysqli_query($conect, $sql);

    if($result)
        echo "mensaje registrado";
?>