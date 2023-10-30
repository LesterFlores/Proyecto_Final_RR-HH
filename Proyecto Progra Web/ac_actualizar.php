<?php
    $id = !empty($_POST['id']) ? $_POST['id'] : '';
    $naci = date("Y/m/d", strtotime($_POST['fecha-nacimiento']));
    $Nac = $naci;
    function obtener_edad_segun_fecha($Nac)
    {
        $nacimiento = new DateTime($Nac);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");
    }    

    $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : '';
    $dpi = !empty($_POST['dpi']) ? $_POST['dpi'] : '';
    $igss = !empty($_POST['igss']) ? $_POST['igss'] : '';
    $area = !empty($_POST['area']) ? $_POST['area'] : '';
    $salario = !empty($_POST['salario']) ? $_POST['salario'] : '';
    $Edad = obtener_edad_segun_fecha($naci);
    $genero = !empty($_POST['genero']) ? $_POST['genero'] : '';
    $departamento = !empty($_POST['departamento']) ? $_POST['departamento'] : '';
    $municipio = !empty($_POST['municipio']) ? $_POST['municipio'] : '';
    $direccion = !empty($_POST['direccion']) ? $_POST['direccion'] : '';
    $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : '';
    $fech = date("Y/m/d", strtotime($_POST['fecha-ingreso']));
    $ingreso = $fech;


    if($nombre && $apellido && $dpi && $igss && $area && $salario && $Edad && $genero && $departamento && $municipio && $direccion && $telefono && $ingreso)
    {
        include('conexion.php');
        $consulta = "UPDATE tbl_empleados SET Nombres_Empleado = '$nombre', Apellidos_Empleado = '$apellido', DPI_Empleado = '$dpi', Numero_IGSS = '$igss', ID_Area_Trabajo = '$area', Sueldo = '$salario', Fecha_Nacimiento = '$Nac', Edad = '$Edad', ID_Genero = '$genero', ID_Departamento = '$departamento', ID_Municipio = '$municipio', Direccion = '$direccion', Telefono = '$telefono', Fecha_Ingreso = '$ingreso' WHERE ID_Empleado = '$id'";
        $resultado = mysqli_query($conexion, $consulta);

        if(!$resultado){
            echo 'Error al Actualizar Empleado';
        }
    }

    header('Location: Lista_Empleados.php')
?>