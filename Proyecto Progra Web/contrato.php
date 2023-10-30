<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="jsPDF-1.3.2/dist/jspdf.min.js"></script>
    

    <link rel="stylesheet" href="contrato.js">
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
  <a href="contrato.php" class="active">Contrato</a>
  <a href="Lista_Planillas_Pagadas.php">Lista de Planilla Pagadas</a>
  <a href="Lista_Empleados_Antiguos.php">Lista de Empleados Antiguos</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<a href="salir.php"><button style="background-color: red; margin-left: 1379px;"> Cerrar Sesion</button></a>
  <div class="form-group">
      <input type="text" id="id" name="id" required style="margin-left: 1250px; width: 150px;" placeholder="Codigo Empleado">
      <button type="button" id="cargar-datos">Cargar</button>
  </div>


<center>
  <div style="width: 700px; text-align: justify;" id="pdf">
  <center><h6>MINISTERIO DE TRABAJO Y PREVISIÓN SOCIAL</h4></center>
  <center><h6>DIRECCIÓN GENERAL DE TRABAJO</h4></center>
  <center><h5>CONTRATO INDIVIDUAL DE TRABAJO</h3></center>
    <p><b>Germán Cerezo Casaso</b> de <b>45 años</b> de edad, estado civil <b>casado</b> de nacionalidad 
    <b>guatemalteca</b> vecino de <b>Estanzuela</b> con Documento Personal de Identificación número 
    <b>1234 12345 1903</b> extendido por el Registro Nacional de las Personas de <b>Estanzuela Zacapa</b> 
    actuando en representacion de <b>Entre Ríos Sustainable Woods, Sociedad Anónima</b> y <b><span id="nombre"></span> 
    <span id="apellido"></span></b> de <b><span id="edad"></span></b> años de edad, <b><span id="sexo"></span></b>
    , de nacionalidad <b>guatemalteca</b>, vecino de <b><span id="departamento"></span></b>, con Documento Personal 
    de Identificación número <b><span id="dpi"></span></b> extendido por el Registro Nacional de las Personas de 
    <b><span id="municipio"></span></b>, con residencia en:  <b><span id="direccion"></span></b>
    Quienes en lo sucesivo nos denominaremos <b>EMPLEADOR Y TRABAJADOR</b>, respectivamente, consentimos
    en celebrar el presente <b>CONTRATO INDIVIDUAL DE TRABAJO</b>, contenido en las siguientes cláusulas:
    <b>PRIMERA:</b> La relación de trabajo inicia el día <b><span id="dia"></span></b>, del mes de <b><span id="mes"></span></b>
    , del año <b><span id="anio"></span></b></p>
    <p><b>SEGUNDA:</b> El trabajador prestará los servicios siguientes: <b><span id="puesto"></span></b>.</p>
    <p>TERCERA: Los servicios serán prestados en <b>La Empresa Entre Ríos Sustainable Woods, S.A.</b> ubicada en la 
    Aldea <b>Chispan, Estanzuela, Zacapa</b>.</p>
    <p><b>CUARTA:</b> La duración del presente contrato es: INDEFINIDO.</p>
    <p><b>QUINTA:</b> La jornada ordinaria de trabajo será de <b>9.5</b> horas diarias de Lunes a Jueves y de <b>44</b>
    horas a la semana así: En jornada <b>DIURNA:</b> de las <b>7:00 am</b> a las <b>12:00 pm</b> horas y de las <b>13:00 pm</b>
    horas a las <b>5:30 pm</b> horas, excepto el día <b>Viernes</b> que será de las <b>7:00 am</b> horas a las <b>13:00 pm</b>
    horas, para completar las <b>44</b> horas de la semana. En Jornada <b>NOCTURNA:</b> de las <b>21:00 pm</b> horas a la 
    <b>3:00 am</b> horas de Lunes a Sábado. En Jornada <b>MIXTA:</b> de las <b>14:00 pm</b> a las <b>21:00 pm</b> horas de 
    Lunes a Sábado. En jornada <b>CONTINUA DIURNA:</b> de las <b>7:00 am</b> a las <b>16:00 pm</b> horas de Lunes a Viernes 
    excepto el día Sábado que será de las <b>7:00 am</b> a las <b>11:00 am</b>. en ésta jornada el trabajador tiene derecho a un descanso
    mínimo de media hora dentro de esa jornada el que debe computarse como tiempo de trabajo efectivo.</p>
    <p><b>SEXTA:</b> el salario será de <b>Q.<span id="salario"></span>.00</b> más Bonificación Incentivo de 
    <b>Q.500.00</b> y le será pagada en efectivo cada <b>quincena</b> en <b>La Empresa Entre Ríos Sustainable Woods, S.A.</b> 
    ubicada en la Aldea <b>Chispan, Estanzuela, Zacapa.</b></p>
    <p><b>SEPTIMA:</b> Las horas extras, el séptimo y los días de asueto, le serán pagados de conformidad con los artículos
    121, 126, 127 del Código de Trabajo.</p>
    <p><b>OCTAVA:</b> Es entendido que de conformidad con el artículo 122 del Código de Trabajo, la jornada ordinaria y
    extraordinaria no puede exceder de una suma total de 12 horas diarias.</p>
    <p><b>NOVENA:</b> El presente contrato se suscribe en <b>Aldea Chispan, Estanzuela, Zacapa</b> el día 
    <b><span id="diactual"></span></b> del mes de <b><span id="mesactual"></span></b> del año <b><span id="anioactual"></span></b></p>
    <br><br>

    <p>__________________________________&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      &emsp;__________________________________
      &emsp;&emsp; Firma del Trabajador &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Firma del Empleador</p>
      <p></p>

  </div>
</center>
    <script>
      function capturarYGenerarPDF() {
        console.log("Botón clickeado");
    // Selecciona el elemento HTML que deseas capturar
    const elementoCapturar = document.getElementById('pdf');

    // Usa html2canvas para tomar una captura de pantalla
    html2canvas(elementoCapturar).then(function(canvas) {
        // Crea un objeto jsPDF
        const pdf = new jsPDF('p', 'mm', 'a4');

        // Convierte el canvas en una imagen de datos URL
        const imageData = canvas.toDataURL('image/png');

        // Agrega la imagen al PDF
        pdf.addImage(imageData, 'PNG', 10, 10, 180, 0);

        // Guarda o muestra el PDF
        pdf.save('captura.pdf');
    });
}

    </script>
    <button onclick="capturarYGenerarPDF()">Generar Contrato PDF</button>
    <script src="contrato.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
</body>
</html>