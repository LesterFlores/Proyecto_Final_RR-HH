<?php

    $id = !empty($_GET['id']) ? $_GET['id'] : 0;
    include('conexion.php');
    $consulta = "SELECT * FROM tbl_planillas WHERE ID_Empleado = '$id'";
    $resultado = mysqli_query($conexion, $consulta);

    $linea = mysqli_fetch_row($resultado);

    
    $consulta2 = "SELECT * FROM tbl_empleados WHERE ID_Empleado = " . $linea[1];
    $resultado2 = mysqli_query($conexion, $consulta2);

    $linea2 = mysqli_fetch_row($resultado2);

    $consulta3 = "SELECT * FROM  tbl_generos";
    $resultado3 = mysqli_query($conexion, $consulta3);
    $data1 = array();

    if ($resultado3->num_rows > 0) {
        while ($row3 = $resultado3->fetch_assoc()) {
            $data1[] = $row3;
        }
    }

    $consulta4 = "SELECT * FROM  tbl_departamentos";
    $resultado4 = mysqli_query($conexion, $consulta4);
    $data2 = array();

    if ($resultado4->num_rows > 0) {
        while ($row4 = $resultado4->fetch_assoc()) {
            $data2[] = $row4;
        }
    }

    $consulta5 = "SELECT * FROM  tbl_municipios";
    $resultado5 = mysqli_query($conexion, $consulta5);
    $data3 = array();

    if ($resultado5->num_rows > 0) {
        while ($row5 = $resultado5->fetch_assoc()) {
            $data3[] = $row5;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Empleado</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="planilla.css">
</head>
<header>
    <h1>Gestión de Recursos Humanos</h1>
        <p>Tu solución integral para la administración de talento humano.</p>
</header>
<body>
    <div class="container">
        <h1>Actualizar Planilla de Pago</h1>
        <form id="planilla-form" action="ac_actualizar_planilla.php" method="post">

            <div class="form-group">
                <input type="hidden" id="id" name="id" value="<?php echo $linea[0] ?>">
            </div>

            <div class="form-group">
                <label for="id_empleado">Codigo de Empleado:</label>
                <input type="text" id="id_empleado" name="id_empleado" value="<?php echo $linea[1] ?>">
            </div>

            <div class="form-group">
                <label for="salario">Salario del Empleao:</label>
                <input type="text" id="salario" name="salario" value="<?php echo $linea2[6] ?>">
            </div>
            
            <div class="form-group">
                <label for="periodo">Mes:</label>
                <input type="text" id="mes" name="mes" value="<?php echo $linea[2] ?>">
            </div>
            <div class="form-group">
                <label for="dias-trabajados">Días Trabajados:</label>
                <input type="number" id="dias-trabajados" name="dias-trabajados" value="<?php echo $linea[3] ?>">
            </div>
            <div class="form-group">
                <label for="deducciones">Deducciones:</label>
                <input type="floatval" id="deducciones" name="deducciones" value="<?php echo $linea[4] ?>">
            </div>
            <div class="form-group" id="resultado">
                <h2>Resultado</h2>
                <p>El salario neto del empleado es: <span id="salario-neto"></p>
            </div>
            <button type="button" id="actualizar-salario" >Calcular Pago</button>
            <script src="pagoactualizado.js"></script>
        </form>
        
    </div>
    
</body>
</html>