<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script src="planilla.js"></script>
    
    <link rel="stylesheet" href="planilla.css">
</head>

<header>
    <h1>Gestión de Recursos Humanos</h1>
        <p>Tu solución integral para la administración de talento humano.</p>
</header>
<body>
<div class="topnav" id="myTopnav">
  <a href="Lista_Empleados.php">Lista de Empleados</a>
  <a href="planilla.php" class="active">Planilla</a>
  <a href="Lista_Planilla.php">Lista de Planilla</a>
  <a href="contrato.php">Contrato</a>
  <a href="Lista_Planillas_Pagadas.php">Lista de Planilla Pagadas</a>
  <a href="Lista_Empleados_Antiguos.php">Lista de Empleados Antiguos</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<a href="salir.php"><button style="background-color: red; margin-left: 1379px;"> Cerrar Sesion</button></a>
    <div class="container">
        <h1>Planilla de Pago</h1>
        <form id="planilla-form" action="guardar_planilla.php" method="post">
            <div class="form-group">
                <label for="id">Codigo de Empleado:</label>
                <input type="text" id="id" name="id" required>
                <button type="button" id="cargar-datos">Cargar</button>
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre del Empleado:</label>
                <input type="text" id="nombre" name="nombre" readonly>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <input type="text" id="puesto" name="puesto" readonly>
            </div>
            <div class="form-group">
                <label for="salario">Salario Mensual:</label>
                <input type="number" id="salario" name="salario" readonly>
            </div>
            <div class="form-group">
                <label for="periodo">Mes:</label>
                <input type="text" id="mes" name="mes">
            </div>
            <div class="form-group">
                <label for="dias-trabajados">Días Trabajados:</label>
                <input type="number" id="dias-trabajados" name="dias-trabajados">
            </div>
            <div class="form-group">
                <label for="deducciones">Deducciones:</label>
                <input type="floatval" id="deducciones" name="deducciones">
            </div>
            <div class="form-group" id="resultado">
                <h2>Resultado</h2>
                <p>El salario neto del empleado es: <span id="salario-neto"></p>
            </div>
            <button type="button" id="calcular-salario" >Calcular Pago</button>
            <script src="pago.js"></script>
        </form>
        
    </div>
    
</body>
</html>