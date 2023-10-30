<?php

    $id = !empty($_GET['id']) ? $_GET['id'] : 0;

    include('conexion.php');
    $consulta = "DELETE FROM tbl_planillas WHERE ID_planilla = '$id'";

    if(!mysqli_query($conexion, $consulta)){
        echo 'No se pudo Eliminar';
    }

    header('Location: Lista_Planilla.php')

?>