<?php
require('../fpdf.php');

class PDF extends FPDF
{

	// Page header
	function Header()
	{
		$this->auditTrail('Print Announcement Report');
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(30);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 8, 'ANNOUNCEMENT REPORT', 0, 1, 'C');
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
		$this->Cell(85, 10, 'Title', 'B', 0, 'L');
		$this->Cell(30, 10, 'Start Date', 'B', 0, 'L');
		$this->Cell(30, 10, 'End Date', 'B', 0, 'L');
		$this->Cell(30, 10, 'Date Created', 'B', 1, 'L');
		//$this->Cell(190,10,'',1,0,'C');

		if(isset($_GET["startDate"]) && isset($_GET["endDate"])){
			$startdate = $_GET["startDate"];
			$enddate = $_GET["endDate"];

			$sqlStatement = "SELECT * FROM announcement_tbl WHERE ann_date_start BETWEEN '$startdate' AND '$enddate'";
		}
		else{
			$sqlStatement = "SELECT * FROM announcement_tbl WHERE _isdel = 0 ORDER BY ann_id DESC";
		}
		if ($this->selectWithJoin($sqlStatement) != 0) {
			foreach ($this->selectWithJoin($sqlStatement) as $value) {
				$this->SetFont('Times', '', 10);
				$this->Cell(20, 8, ' ' ."ANN-".$this->setId($value["ann_id"]), 'B', 0, 'L');
				$this->cell(85, 8, ' ' .$value["ann_title"], 'B', 0, 'L');
				$this->Cell(30, 8, ' ' . date("d-M-Y", strtotime($value["ann_date_start"])), 'B', 0, 'L');
				$this->Cell(30, 8, ' ' . date("d-M-Y", strtotime($value["ann_date_end"])), 'B', 0, 'L');
				$this->Cell(30, 8, ' ' . date("d-M-Y", strtotime($value["ann_date_created"])), 'B', 1, 'L');
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
