<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->auditTrail('Print Employee Report');
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(30);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 8, 'EMPLOYEE REPORT', 0, 1, 'C');
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
		$this->Cell(40, 10, 'Employee Name', 'B', 0, 'L');
		$this->Cell(50, 10, 'Address', 'B', 0, 'L');
		$this->Cell(30, 10, 'Contact Details', 'B', 0, 'L');
		$this->Cell(25, 10, 'Birth Date', 'B', 0, 'L');
		$this->Cell(20, 10, 'Position', 'B', 1, 'R');
		//$this->Cell(190,10,'',1,0,'C');

		$sqlStatement = "SELECT * FROM employee_tbl JOIN position_tbl ON pos_id = emp_pos_id WHERE employee_tbl._isdel = 0 AND position_tbl._isdel = 0 ORDER BY emp_id DESC";
		if ($this->selectWithJoin("$sqlStatement") != 0) {
			foreach ($this->selectWithJoin("$sqlStatement") as $value) {
				$this->SetFont('Times', '', 10);
				$this->Cell(20, 8, ' ' . "EMP-".$this->setId($value["emp_id"]), 'B', 0, 'L');
				$this->Cell(40, 8, ' ' . $value["emp_lname"]. ', ' .$value["emp_fname"]. ' ' .$value["emp_mname"], 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["emp_address"], 'B', 0, 'L');
				$this->Cell(30, 8, ' ' . $value["emp_email"], 'B', 0, 'L');
				$this->Cell(25, 8, ' ' . date("d-M-Y", strtotime($value["emp_bdate"])), 'B', 0, 'L');
				$this->Cell(20, 8, ' ' . $value["pos_name"], 'B', 1, 'R');
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
