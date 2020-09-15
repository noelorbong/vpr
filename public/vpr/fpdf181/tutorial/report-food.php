<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->auditTrail('Print Food Report');
		// Logo
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(30);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 8, 'FOOD REPORT', 0, 1, 'C');
		// Line break
		$this->Ln(10);

	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', '', 8);
		// Page number
		$this->Cell(0, 5, 'Page ' . $this->PageNo() . ' - {nb}', 'T', 0, 'R');
	}

	function Body()
	{
		$this->SetFont('Times', 'UI', 10);
		$this->Cell(150, 6, 'As of : ' . date("F j, Y"), 0, 1, 'L');
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(20, 10, 'ID', 'B', 0, 'L');
		$this->Cell(45, 10, 'Food Category', 'B', 0, 'L');
		$this->Cell(50, 10, 'Food Name', 'B', 0, 'L');
		$this->Cell(50, 10, 'Description', 'B', 0, 'L');
		$this->Cell(30, 10, 'Amount', 'B', 1, 'R');

		//$this->Cell(190,10,'',1,0,'C');
		$sqlStatement = "SELECT * FROM foods_tbl JOIN category_tbl ON cat_id = food_cat_id WHERE foods_tbl._isdel = 0 AND category_tbl._isdel = 0 ORDER BY food_id DESC";
		if ($this->selectWithJoin("$sqlStatement") != 0) {
			foreach ($this->selectWithJoin("$sqlStatement") as $value) {
				$this->SetFont('Times', '', 10);
				$this->Cell(20, 8, ' ' . "FOOD-".$this->setId($value["food_id"]), 'B', 0, 'L');
				$this->Cell(45, 8, ' ' . $value["cat_name"], 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["food_name"], 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["food_desc"], 'B', 0, 'L');
				$this->Cell(30, 8, ' ' . $value["food_amount"],'B', 1, 'R');
			}
		}
		$this->Ln(2);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(190, 10, 'Total # Of Records : ' . count($this->selectWithJoin("$sqlStatement")), 0, 0, 'R');
		$this->Ln();
		$this->Cell(190, 10, 'Printed by : ' . @$_SESSION["employeeName"], 0, 0, 'R');
	}
}

// Instanciation of inherited class
$pdf = new PDF("P", "mm", "Letter");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Body();
$pdf->Output();
?>
