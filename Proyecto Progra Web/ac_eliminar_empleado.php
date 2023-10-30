<?php

    $id = !empty($_GET['id']) ? $_GET['id'] : 0;

    include('conexion.php');
    $consulta = "DELETE FROM tbl_empleados WHERE ID_Empleado = '$id'";

    if(!mysqli_query($conexion, $consulta)){
        echo 'No se pudo Eliminar';
    }

    header('Location: Lista_Empleados.php')

?>