<?php

    $bd = "inv";
    $host = "localhost";
    $user = "root";
    $password = "";

    $conect = @mysqli_connect($host, $user, $password, $bd);
    if(!$conect) die ( "ERROR");

    $sql = "SELECT usuario, mensaje FROM conversa ORDER BY id ASC";
    $result = mysqli_query($conect, $sql);

    while($data = mysqli_fetch_assoc($result)){
        echo "<p><b>".$data["usuario"]."</b>: ".$data["mensaje"]."</p>";
    }

?>