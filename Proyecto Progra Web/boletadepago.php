<?php
require('conexion.php'); // Asegúrate de tener el archivo de conexión.

// Realiza la consulta a la base de datos para obtener la información de las planillas.
$consulta = "SELECT * FROM tbl_planillas";
$resultado = mysqli_query($conexion, $consulta);

require('TCPDF-main/tcpdf.php');; // Asegúrate de cargar la biblioteca TCPDF.

class PDF extends TCPDF {
    public function Header() {
        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(0, 10, 'BOLETA DE PAGO', 0, 1, 'C');
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, 0, 'C');
    }
}

$pdf = new PDF();


while ($registro = mysqli_fetch_assoc($resultado)) {

    // Agrega un salto de página para la próxima boleta de pago.
    $pdf->AddPage();

    $pdf->SetFont('helvetica', '', 12);

    // Construye el contenido de la boleta de pago.
    $content = "ID: {$registro['ID_planilla']}\n";
    $content .= "ID Empleado: {$registro['ID_Empleado']}\n";
    $content .= "Mes: {$registro['Mes']}\n";
    $content .= "Días Trabajados: {$registro['Dias_Trabajados']}\n";
    $content .= "Deducciones: {$registro['Deducciones']}\n";
    $content .= "Total a Pagar: {$registro['Total_Pago']}\n";

    // Agrega el contenido al PDF.
    $pdf->MultiCell(0, 10, $content, 0, 'L');

    // Agrega el ID de la planilla a la lista de planillas a eliminar
    $planillasAEliminar[] = $registro['ID_planilla'];
    
}

    // Salva el PDF en un archivo o muestra en el navegador.
    $pdf->Output('boletas_de_pago.pdf', 'D'); // Cambia 'D' a 'I' para mostrar en el navegador.

    // Una vez que se han impreso todas las boletas, ejecuta el procedimiento almacenado para transferir y eliminar los datos
    foreach ($planillasAEliminar as $planillaID) {
        // Llama al procedimiento almacenado para transferir y eliminar la planilla
        $query = "CALL ImprimirYEliminarPlanilla($planillaID)";
        mysqli_query($conexion, $query);
    }
?>
