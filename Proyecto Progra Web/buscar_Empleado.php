<?php
header('Content-Type: application/json');
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Realiza la conexión a la base de datos (ajusta las credenciales según tu configuración)
        $conexion = new PDO("mysql:host=localhost;dbname=bd_rrhh", "root", "");

        // Configura el PDO para arrojar excepciones en caso de errores
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Valida y sanitiza la entrada (puedes mejorar esto según tus necesidades)
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        // Prepara la consulta SQL para buscar el empleado por ID
        $sql = "SELECT * FROM tbl_empleados em JOIN tbl_area_trabajo ar 
        ON em.ID_Area_Trabajo = ar.ID_Area_Trabajo 
        JOIN tbl_generos gen ON em.ID_Genero = gen.ID_Genero 
        JOIN tbl_departamentos dep ON em.ID_Departamento = dep.ID_Departamento
        JOIN tbl_municipios mun ON em.ID_Municipio = mun.ID_Municipio
        WHERE em.ID_Empleado = :id";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);

        // Ejecuta la consulta
        $consulta->execute();

        // Obtiene los resultados
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        // Devuelve los resultados en formato JSON
        echo json_encode($resultado);
    } catch (PDOException $e) {
        // Manejo de errores: puedes registrar el error o devolver un mensaje de error
        echo json_encode(array('error' => 'Error en la consulta.'));
    }
}
?>

