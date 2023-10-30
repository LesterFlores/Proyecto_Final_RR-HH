<?php

    $conexion = mysqli_connect('localhost', 'root', '', 'bd_rrhh');
    if(!$conexion){
        die('No se puede conectar' . mysqli_connect_error());
    }

?>