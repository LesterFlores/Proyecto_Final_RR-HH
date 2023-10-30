<?php
    
    $id = !empty($_POST['id']) ? $_POST['id'] : '';
    $dias = !empty($_POST['dias_trabajados']) ? $_POST['dias_trabajados'] : '';
    $deduccion = !empty($_POST['deducciones']) ? $_POST['deducciones'] : '';
    $salario = !empty($_POST['salario-neto']) ? $_POST['salario-neto'] : '';
    $mes = !empty($_POST['mes']) ? $_POST['mes'] : '';
    

    if($id && $dias && $deduccion && $salario && $mes)
    {
        include('conexion.php');
        $consulta = "INSERT INTO tbl_planillas (ID_Empleado, Mes, Dias_Trabajados, Deducciones, Total_Pago) VALUES ('$id', '$mes', '$dias', '$deduccion', '$salario')";
        $resultado = mysqli_query($conexion, $consulta);

        if(!$resultado){
            echo 'Error al Guardar Empleado';
        }
    }

    header('Location: Lista_Planilla.php')
?>