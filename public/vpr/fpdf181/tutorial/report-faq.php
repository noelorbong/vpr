<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		//$this->auditTrail('Print FAQ Report');
		//$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(5);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 8, 'LIST OF VEHICLE', 0, 1, 'C');
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

		$this->SetFont('Arial', 'B', 10);
		$this->Cell(20, 10, 'Plate #', 'B', 0, 'L');
		$this->Cell(60, 10, 'Model', 'B', 0, 'L');
		$this->Cell(40, 10, 'Owner Name', 'B', 0, 'L');
		$this->Cell(55, 10, 'Address', 'B', 0, 'L');
		$this->Cell(20, 10, 'Contact', 'B', 1, 'L');

		//$this->Cell(190,10,'',1,0,'C');
		$sqlStatement = "SELECT tbl_vehicle.id AS 'id', tbl_vehicle.plate_number AS 'platenumber', tbl_vehicle.vehicle_model AS 'model', tbl_owner.owner_name AS 'ownername', tbl_owner.owner_contact AS 'contact', tbl_owner.owner_address AS 'address'  FROM tbl_vehicle join tbl_owner ON tbl_owner.id = tbl_vehicle.owner_id";
		if ($this->selectWithJoin($sqlStatement) != 0) {
			foreach ($this->selectWithJoin($sqlStatement) as $value) {
				$this->SetFont('Times', '', 10);

				$this->Cell(20, 8, ' ' . $value["platenumber"], 'B', 0, 'L');
				$this->Cell(60, 8, ' ' . $value["model"], 'B', 0, 'L');
				$this->Cell(40, 8, ' ' . $value["ownername"], 'B', 0, 'L');
				$this->Cell(55, 8, ' ' . $value["address"], 'B', 0, 'L');
				$this->Cell(20, 8, ' ' . $value["contact"], 'B', 1, 'L');
			}
		}
		$this->Ln(2);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(190, 10, 'Total # Of Records : ' . count($this->selectWithJoin($sqlStatement)), 0, 0, 'R');
		$this->Ln();
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
