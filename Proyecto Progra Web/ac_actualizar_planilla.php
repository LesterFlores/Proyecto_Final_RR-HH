<?php
    $id = !empty($_POST['id']) ? $_POST['id'] : '';
    $id_Empleado = !empty($_POST['id_empleado']) ? $_POST['id_empleado'] : '';
    $dias = !empty($_POST['dias_trabajados']) ? $_POST['dias_trabajados'] : '';
    $deduccion = !empty($_POST['deducciones']) ? $_POST['deducciones'] : '';
    $salario = !empty($_POST['salario-neto']) ? $_POST['salario-neto'] : '';
    $mes = !empty($_POST['mes']) ? $_POST['mes'] : '';

    $response = array(); // Creamos un array para la respuesta

    if ($id && $id_Empleado && $dias && $deduccion && $salario && $mes) {
        include('conexion.php');
        $consulta = "UPDATE tbl_planillas SET ID_Empleado = '$id_Empleado', Mes = '$mes', Dias_Trabajados = '$dias', Deducciones = '$deduccion', Total_Pago = '$salario' WHERE ID_planilla = '$id'";
        $resultado = mysqli_query($conexion, $consulta);
    
        if ($resultado) {
            $response["success"] = true;
            $response["message"] = "Datos actualizados correctamente";
        } else {
            $response["success"] = false;
            $response["message"] = "Error al actualizar los datos: " . mysqli_error($conexion);
        }
    } else {
        $response["success"] = false;
        $response["message"] = "Faltan datos en la solicitud";
    }

    // Enviamos la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
?>