<?php

    $id = !empty($_GET['id']) ? $_GET['id'] : 0;
    include('conexion.php');
    $consulta = "SELECT * FROM tbl_empleados WHERE ID_Empleado = '$id'";
    $resultado = mysqli_query($conexion, $consulta);

    $linea = mysqli_fetch_row($resultado);

        $consulta2 = "SELECT * FROM  tbl_area_trabajo";
        $resultado2 = mysqli_query($conexion, $consulta2);
        $data = array();

        if ($resultado2->num_rows > 0) {
            while ($row2 = $resultado2->fetch_assoc()) {
                $data[] = $row2;
            }
        }

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
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <h1>Gestión de Recursos Humanos</h1>
        <p>Tu solución integral para la administración de talento humano.</p>
</header>
<body>
    <div class="container">
        <h1><center>Formulario de Actualizacion de Empleados</center></h1>
        <form action="ac_actualizar.php" id="employee-form" method="post">

            <div class="form-group">
            <input type="hidden" id="id" name="id" value="<?php echo $linea[0] ?>">
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $linea[1] ?>">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo $linea[2] ?>">
            </div>

            <div class="form-group">
                <label for="dpi">DPI:</label>
                <input type="text" id="dpi" name="dpi" value="<?php echo $linea[3] ?>">
            </div>

            <div class="form-group">
                <label for="igss">No. IGSS:</label>
                <input type="text" id="igss" name="igss" value="<?php echo $linea[4] ?>">
            </div>

            <div class="form-group">
                <label for="area">Area Trabajo:</label>
                <select id="area" name="area" style="width: 705px;">
                    <?php foreach ($data as $row2): ?>
                        <option value="<?php echo $row2['ID_Area_Trabajo']; ?>"><?php echo $row2['Nombre_Area']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="number" id="salario" name="salario" value="<?php echo $linea[6] ?>">
            </div>

            <div class="form-group">
                <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" value="<?php echo $linea[7] ?>">
            </div>

            <div class="form-group">
                <label for="genero">Genero:</label>
                <select id="genero" name="genero" style="width: 705px;">
                    <?php foreach ($data1 as $row3): ?>
                        <option value="<?php echo $row3['ID_Genero']; ?>"><?php echo $row3['Nombre_Genero']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento:</label>
                <select id="departamento" name="departamento" style="width: 705px;" value="<?php echo $linea[10] ?>">
                    <?php foreach ($data2 as $row4): ?>
                        <option value="<?php echo $row4['ID_Departamento']; ?>"><?php echo $row4['Nombre_Departamento']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="municipio">Municipio:</label>
                <select id="municipio" name="municipio" style="width: 705px;">
                    <?php foreach ($data3 as $row5): ?>
                        <option value="<?php echo $row5['ID_Municipio']; ?>"><?php echo $row5['Nombre_Municipio']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $linea[12] ?>">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="<?php echo $linea[13] ?>">
            </div>

            <div class="form-group">
                <label for="fecha-ingreso">Fecha de Ingreso:</label>
                <input type="date" id="fecha-ingreso" name="fecha-ingreso" value="<?php echo $linea[14] ?>">
            </div>

            <center><button type="submit">Enviar</button></center>
        </form>
    </div>
</body>
</html>