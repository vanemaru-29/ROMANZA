<?php

    $conn = new mysqli('localhost', 'root', '', 'romanza', '3306');
    if (mysqli_connect_errno()) {
        echo "La conexion a la base de datos Mysql ha fallado: ".mysqli_connect_errno();
    } else {
        echo "Conexion realizada correctamente";
    }

    mysqli_query($conn, "SET NAMES 'utf8'")
?>
