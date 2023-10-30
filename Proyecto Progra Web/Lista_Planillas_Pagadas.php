<?php
    include('conexion.php');
    $consulta = "SELECT * FROM  tbl_planilla_pagada";
    $resultado = mysqli_query($conexion, $consulta);
    $pago = 0;
    $tabla = "<table id='example' class='cell-border display' style='width:100%'>
    <thead>
    <tr>
        <th>ID</th>
        <th>ID_EMPLEADO</th>
        <th>MES</th>
        <th>DIAS TRABAJADOS</th>
        <th>DEDUCCIONES</th>
        <th>TOTAL A PAGAR</th>
    </tr>
    </thead>
    <tbody>";
    while($registro=mysqli_fetch_assoc($resultado)){
        $tabla.= "<tr>";
        $tabla.= "<td>{$registro['ID_planilla']}</td>";
        $tabla.= "<td>{$registro['ID_Empleado']}</td>";
        $tabla.= "<td>{$registro['Mes']}</td>";
        $tabla.= "<td>{$registro['Dias_Trabajados']}</td>";
        $tabla.= "<td>{$registro['Deducciones']}</td>";
        $tabla.= "<td>{$registro['Total_Pago']}</td>";
        $tabla.= "</tr>";
        $pago = $pago+$registro['Total_Pago'];
    }
    $tabla.= "</tbody>";
    $tabla.= "<tfoot>";
    $tabla.= "<tr>";
    $tabla.= "<th colspan='5' style='text-align:right'>Total:</th>";
    $tabla.= "<th></th>";
    $tabla.= "</tr>";
    $tabla.= "</tfoot>";
    $tabla.= "</table>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
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
  <a href="Lista_Planillas_Pagadas.php"  class="active">Lista de Planilla Pagadas</a>
  <a href="Lista_Empleados_Antiguos.php">Lista de Empleados Antiguos</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<a href="salir.php"><button style="background-color: red; margin-left: 1379px;"> Cerrar Sesion</button></a>

    <center><h1>Lista de Planilla Pagadas</h1></center>
    <a href="boletadepago.php"><button style="position: fixed; margin-left: 1100px;">Imprimir Boletas de pago</button></a>
    <a href="planilla.php"><button style="margin-left: 1350px;">Ingresar Nuevo</button></a>
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
    <script src="lista_planilla.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>
</html>