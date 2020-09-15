<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->auditTrail('Print Category Report');
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(30);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 8, 'INQUIRY REPORT', 0, 1, 'C');
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
		$this->Cell(40, 10, 'Name', 'B', 0, 'L');
		$this->Cell(30, 10, 'Email', 'B', 0, 'L');
		$this->Cell(50, 10, 'Message', 'B', 0, 'L');
		$this->Cell(50, 10, 'Reply', 'B', 0, 'L');
		$this->Cell(25, 10, 'Date', 'B', 1, 'L');

		if(isset($_GET["startDate"]) && isset($_GET["endDate"])){
			$startdate = $_GET["startDate"];
			$enddate = $_GET["endDate"];

			$sqlStatement = "SELECT * FROM inquiry_tbl WHERE inq_date BETWEEN '$startdate' AND '$enddate'";
		}
		else{
			$sqlStatement = "SELECT * FROM inquiry_tbl WHERE _isdel = 0 ORDER BY inq_id DESC";
		}
		//$this->Cell(190,10,'',1,0,'C');
		if ($this->selectWithJoin($sqlStatement) != 0) {
			foreach ($this->selectWithJoin($sqlStatement) as $value) {
				$this->SetFont('Times', '', 10);
				$this->Cell(40, 8, ' ' . $value["inq_name"], 'B', 0, 'L');
				$this->Cell(30, 8, ' ' . $value["inq_email"], 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["inq_msg"], 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["inq_reply"], 'B', 0, 'L');
				$this->Cell(25, 8, ' ' . $value["inq_date"], 'B', 1, 'L');
			}
		}
		$this->Ln(2);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(190, 10, 'Total # Of Records : ' . count($this->selectWithJoin($sqlStatement)), 0, 0, 'R');
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
