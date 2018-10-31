<?php 
require 'assets/fpdf181/fpdf.php';
class PDF extends FPDF
{
	function Header()
	{
		// Logo
		$this->Image('assets/imagenes/municipalidad.jpg', 180, 5, 20);
		$this->Image('assets/imagenes/planificacion.jpg', 8, 5, 20);
		$this->SetFont('Arial', 'B', 11);
		// Mueve a la derecha
		$this->Cell(0);
		// Titulo
		$this->Cell(-280, 10, utf8_decode('MUNICIPALIDAD DE NICOYA'), 0, 0, 'C');
		// Subtitulo
		$this->Cell(363, 20, utf8_decode('DIRECCIÓN: PLANIFICACIÓN TERRITORIAL Y SERVICIOS AMBIENTALES'), 0, 0, 'C');
		// Contenido
		$this->Cell(-451, 30, utf8_decode('PLANIFICACIÓN URBANA '), 0, 0, 'C');
		$this->SetFont('Arial', 'B', 5);
		$this->Cell(547, 40, '=====================================================================================================================================================================================================', 0, 0, 'C');
		$this->Ln(25);
	}

 
	function Footer()
	
	{
		$this->SetY(-25);
		$this->SetFont('Arial', 'B', 5);
		$this->Cell(0, 5, '========================================================================================================================================================================================================', 0, 0, 'C');
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(-190, 10, utf8_decode('NICOYA, GUANACASTE TELÉFONO: 2685-8793'), 0, 0, 'C');
		$this->Cell(190, 20, 'EMAIL: planificacionurbana@municoya.go.cr', 0, 0, 'C');
		$this->SetFont('Arial', 'I', 8);
		$this->Cell(-190, 30, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');
	}
}
 ?>
