<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		// Logo
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(25);
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30,8,'Resevation List',0,1,'C');
		// Line break

	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','', 8);
		// Page number
		$this->Cell(0,5,'Page '.$this->PageNo().' - {nb}','T', 0, 'R');
	}

	function Body(){

		$this->SetFont('Times','BI',10);
		$this->Cell(120,10,'As of : __________',0,1,'L');
		$this->Cell(25,10,'Code',1,0,'C');
		$this->Cell(80,10,'Customer Name',1,0,'C');
		$this->Cell(35,10,'date/time',1,0,'C');
		$this->Cell(50,10,'Date Of Resevation',1,1,'C');
		//$this->Cell(190,10,'',1,0,'C');
		$this->Cell(25,10,'',1,0,'C');
		$this->Cell(80,10,'',1,0,'C');
		$this->Cell(35,10,'',1,0,'C');
		$this->Cell(50,10,'',1,1,'C');
		$this->Cell(190,10,'Total# Of Records : ',1,0,'L');



	}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Body();
$pdf->Output();
?>
