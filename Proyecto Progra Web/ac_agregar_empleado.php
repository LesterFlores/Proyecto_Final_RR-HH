<?php
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
        $consulta = "INSERT INTO tbl_empleados (Nombres_Empleado, Apellidos_Empleado, DPI_Empleado, Numero_IGSS, ID_Area_Trabajo, Sueldo, Fecha_Nacimiento, Edad, ID_Genero, ID_Departamento, ID_Municipio, Direccion, Telefono, Fecha_Ingreso) VALUES ('$nombre', '$apellido', '$dpi', '$igss', '$area', '$salario', '$Nac', '$Edad', '$genero', '$departamento', '$municipio', '$direccion', '$telefono', '$ingreso')";
        $resultado = mysqli_query($conexion, $consulta);

        if(!$resultado){
            echo 'Error al Guardar Empleado';
        }
    }

    header('Location: Lista_Empleados.php')
?>