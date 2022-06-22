<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}
?>

<?php
require_once '../librerias/fpdf/fpdf.php';
include_once '../configuraciones/bd.php';

$conexion = BD::crearInstancia();

function agregarTexto(
    $pdf,
    $texto,
    $x,
    $y,
    $alineacion = 'L',
    $fuente = 'Arial',
    $tamanio = 10,
    $rojo = 0,
    $verde = 0,
    $azul = 0
) {
    $pdf->SetFont($fuente, '', $tamanio);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($rojo, $verde, $azul);
    $pdf->Cell(0, 10, $texto, 0, 0, $alineacion);
}

function agregarImagen($pdf, $imagen, $x, $y) {
    $pdf->Image($imagen, $x, $y, 0);
}

// Recupera los datos recibidos a través de una petición GET.
$alumno = isset($_GET['alumno']) ? $_GET['alumno'] : '';
$curso = isset($_GET['curso']) ? $_GET['curso'] : '';

// Recupera los datos de la base de datos.
$sql = 'SELECT alumnos.nombre, alumnos.apellido, cursos.nombre AS nombre_curso
    FROM alumnos, cursos WHERE alumnos.id = :alumno AND cursos.id = :curso';
$consulta = $conexion->prepare($sql);
$consulta->bindParam(':alumno', $alumno);
$consulta->bindParam(':curso', $curso);
$consulta->execute();
$registro = $consulta->fetch(PDO::FETCH_ASSOC);

// Da formato a los datos obtenidos de la base de datos.
$nombre = mb_convert_case($registro['nombre'], MB_CASE_TITLE, 'UTF-8');
$nombre = iconv('UTF-8', 'Windows-1252', $nombre);

$apellido = mb_convert_case($registro['apellido'], MB_CASE_TITLE, 'UTF-8');
$apellido = iconv('UTF-8', 'CP1252', $apellido);

$curso = utf8_decode($registro['nombre_curso']);

// Genera el certificado.
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
agregarImagen($pdf, '../src/certificado.jpg', 0, 0);
agregarTexto($pdf, $nombre . ' ' . $apellido, 125, 90, 'L', 'Helvetica', 30, 0, 84, 115);
agregarTexto($pdf, $curso, 100, 135, 'C', 'Helvetica', 20, 0, 84, 115);
agregarTexto($pdf, date('d/m/Y'), 140, 165, 'L', 'Helvetica', 15, 0, 84, 115);
$pdf->Output();

?>
