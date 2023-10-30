<?php

    include('conexion.php');
    $consulta = "SELECT * FROM  tbl_area_trabajo";
    $resultado = mysqli_query($conexion, $consulta);
    $data = array();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $consulta2 = "SELECT * FROM  tbl_generos";
    $resultado2 = mysqli_query($conexion, $consulta2);
    $data2 = array();

    if ($resultado2->num_rows > 0) {
        while ($row2 = $resultado2->fetch_assoc()) {
            $data2[] = $row2;
        }
    }

    $consulta3 = "SELECT * FROM  tbl_departamentos";
    $resultado3 = mysqli_query($conexion, $consulta3);
    $data3 = array();

    if ($resultado3->num_rows > 0) {
        while ($row3 = $resultado3->fetch_assoc()) {
            $data3[] = $row3;
        }
    }

    $consulta4 = "SELECT * FROM  tbl_municipios";
    $resultado4 = mysqli_query($conexion, $consulta4);
    $data4 = array();

    if ($resultado4->num_rows > 0) {
        while ($row4 = $resultado4->fetch_assoc()) {
            $data4[] = $row4;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <h1>Gestión de Recursos Humanos</h1>
        <p>Tu solución integral para la administración de talento humano.</p>
</header>
<body>
    <div class="container">
        <h1><center>Formulario de Ingreso de Empleados</center></h1>
        <form action="ac_agregar_empleado.php" id="employee-form" method="post">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>

            <div class="form-group">
                <label for="dpi">DPI:</label>
                <input type="text" id="dpi" name="dpi" required>
            </div>

            <div class="form-group">
                <label for="igss">No. IGSS:</label>
                <input type="text" id="igss" name="igss" required>
            </div>

            <div class="form-group">
                <label for="area">Area Trabajo:</label>
                <select id="area" name="area" style="width: 705px;">
                    <?php foreach ($data as $row): ?>
                    <option value="<?php echo $row['ID_Area_Trabajo']; ?>"><?php echo $row['Nombre_Area']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="number" id="salario" name="salario">
            </div>

            <div class="form-group">
                <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha-nacimiento" name="fecha-nacimiento">
            </div>

            <div class="form-group">
                <label for="genero">Genero:</label>
                <select id="genero" name="genero" style="width: 705px;">
                    <?php foreach ($data2 as $row2): ?>
                        <option value="<?php echo $row2['ID_Genero']; ?>"><?php echo $row2['Nombre_Genero']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento:</label>
                <select id="departamento" name="departamento" style="width: 705px;">
                    <?php foreach ($data3 as $row3): ?>
                        <option value="<?php echo $row3['ID_Departamento']; ?>"><?php echo $row3['Nombre_Departamento']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="municipio">Municipio:</label>
                <select id="municipio" name="municipio" style="width: 705px;">
                    <?php foreach ($data4 as $row4): ?>
                        <option value="<?php echo $row4['ID_Municipio']; ?>"><?php echo $row4['Nombre_Municipio']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono">
            </div>

            <div class="form-group">
                <label for="fecha-ingreso">Fecha de Ingreso:</label>
                <input type="date" id="fecha-ingreso" name="fecha-ingreso">
            </div>

            <center><button type="submit">Enviar</button></center>
        </form>
    </div>
</body>
</html>