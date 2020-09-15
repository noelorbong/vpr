<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->auditTrail('Print Audit Trail Report');
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(30);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 8, 'AUDIT TRAIL REPORT', 0, 1, 'C');
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
		$this->Cell(110, 6, 'As of : ' . date("F j, Y"), 0, 0, 'L');
		$this->Cell(80,6,'Covered Period : ' . date("F j, Y"),0,1,'R');
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(20, 10, 'ID', 'B', 0, 'L');
		$this->Cell(70, 10, 'User', 'B', 0, 'L');
		$this->Cell(50, 10, 'Action', 'B', 0, 'L');
		$this->Cell(35, 10, 'Date', 'B', 0, 'L');
		$this->Cell(20, 10, 'Time', 'B', 1, 'L');
		//$this->Cell(190,10,'',1,0,'C');
		if (isset($_GET["start"]) && isset($_GET["end"])) {
			$txtStart = $_GET["start"];
			$txtEnd = $_GET["end"];
			$sqlStatement = "SELECT * FROM  audit_tbl JOIN user_tbl ON user_id = audit_user_id JOIN employee_tbl ON emp_id = user_emp_id WHERE audit_date BETWEEN '$txtStart' AND '$txtEnd' ORDER BY audit_id DESC";
		} else {
			$sqlStatement = "SELECT * FROM audit_tbl JOIN user_tbl ON user_id = audit_user_id JOIN employee_tbl ON emp_id = user_emp_id ORDER BY audit_id DESC";
		}
		if ($this->selectWithJoin($sqlStatement) != 0) {
			foreach ($this->selectWithJoin($sqlStatement) as $value) {
				$this->SetFont('Times', '', 10);
				$this->Cell(20, 8, ' ' . "AUDIT-".$this->setId($value["audit_id"]), 'B', 0, 'L');
				$this->Cell(70, 8, ' ' . $value["emp_lname"] . ", " . $value["emp_fname"] . " " . $value["emp_mname"], 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["audit_action"], 'B', 0, 'L');
				$this->Cell(35, 8, ' ' . date("d-M-Y", strtotime($value["audit_date"])), 'B', 0, 'L');
				$this->Cell(20, 8, ' ' . date("h:i A", strtotime($value["audit_time"])), 'B', 1, 'L');
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
