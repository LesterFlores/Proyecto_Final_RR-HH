<?php
    include('conexion.php');
    $consulta = "SELECT * FROM tbl_empleados_antiguos em JOIN tbl_area_trabajo ar 
    ON em.ID_Area_Trabajo = ar.ID_Area_Trabajo 
    JOIN tbl_generos gen ON em.ID_Genero = gen.ID_Genero 
    JOIN tbl_departamentos dep ON em.ID_Departamento = dep.ID_Departamento
    JOIN tbl_municipios mun ON em.ID_Municipio = mun.ID_Municipio";
    $resultado = mysqli_query($conexion, $consulta);
    $tabla = "<table id='example' class='cell-border display nowrap' style='width:100%'>
    <thead>
    <tr>
        <th>ID</th>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>DPI</th>
        <th>NUMERO IGSS</th>
        <th>AREA DE TRABAJO</th>
        <th>SUELDO</th>
        <th>FECHA DE NACIMIENTO</th>
        <th>EDAD</th>
        <th>GENERO</th>
        <th>DEPARTAMENTO</th>
        <th>MUNICIPIO</th>
        <th>DIRECCION</th>
        <th>TELEFONO</th>
        <th>FECHA DE INGRESO</th>
    </tr>
    </thead>
    <tbody>";
    while($registro=mysqli_fetch_assoc($resultado)){
        $tabla.= "<tr>";
        $tabla.= "<td>{$registro['ID_Empleado']}</td>";
        $tabla.= "<td>{$registro['Nombres_Empleado']}</td>";
        $tabla.= "<td>{$registro['Apellidos_Empleado']}</td>";
        $tabla.= "<td>{$registro['DPI_Empleado']}</td>";
        $tabla.= "<td>{$registro['Numero_IGSS']}</td>";
        $tabla.= "<td>{$registro['Nombre_Area']}</td>";
        $tabla.= "<td>{$registro['Sueldo']}</td>";
        $tabla.= "<td>{$registro['Fecha_Nacimiento']}</td>";
        $tabla.= "<td>{$registro['Edad']}</td>";
        $tabla.= "<td>{$registro['Nombre_Genero']}</td>";
        $tabla.= "<td>{$registro['Nombre_Departamento']}</td>";
        $tabla.= "<td>{$registro['Nombre_Municipio']}</td>";
        $tabla.= "<td>{$registro['DIreccion']}</td>";
        $tabla.= "<td>{$registro['Telefono']}</td>";
        $tabla.= "<td>{$registro['Fecha_Ingreso']}</td>";
        $tabla.= "</tr>";
    }
    $tabla.="<tbody>";
    $tabla.="<tfoot>";
    $tabla.="<tr>";
    $tabla.="<th>ID</th>";
    $tabla.="<th>NOMBRES</th>";
    $tabla.="<th>APELLIDOS</th>";
    $tabla.="<th>DPI</th>";
    $tabla.="<th>NUMERO IGSS</th>";
    $tabla.="<th>AREA DE TRABAJO</th>";
    $tabla.="<th>SUELDO</th>";
    $tabla.="<th>FECHA DE NACIMIENTO</th>";
    $tabla.="<th>EDAD</th>";
    $tabla.="<th>GENERO</th>";
    $tabla.="<th>DEPARTAMENTO</th>";
    $tabla.="<th>MUNICIPIO</th>";
    $tabla.="<th>DIRECCION</th>";
    $tabla.="<th>TELEFONO</th>";
    $tabla.="<th>FECHA DE INGRESO</th>";
    $tabla.="</tr>";
    $tabla.="</tfoot>";
    $tabla.= "</table>";

    
session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php"); // Redirige a la página de inicio de sesión si no hay sesión activa
    exit();
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Empleados Antiguos</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
</head>
<header>
    <h1>Gestión de Recursos Humanos</h1>
        <p>Tu solución integral para la administración de talento humano.</p>
        
</header>
<body>
<div class="topnav" id="myTopnav">
  <a href="Lista_Empleados.php">Lista de Empleados</a>
  <a href="planilla.php">Planilla</a>
  <a href="Lista_Planilla.php">Lista de Planilla</a>
  <a href="contrato.php">Contrato</a>
  <a href="Lista_Planillas_Pagadas.php">Lista de Planilla Pagadas</a>
  <a href="Lista_Empleados_Antiguos.php" class="active">Lista de Empleados Antiguos</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<a href="salir.php"><button style="background-color: red; margin-left: 1379px;"> Cerrar Sesion</button></a>


 
    <center><h1>Lista de Empleados Antiguos</h1></center> 
    <a href="Agregar_Empleado.php"><button style="margin-left: 1350px;">Ingresar Nuevo</button></a>
    <hr>
    
    <?php
       echo $tabla 
    ?>
    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="lista_empleado.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>
</html>