<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->auditTrail('Print Card List');
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(30);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title

		if(isset($_GET["x"])) {
			$status = $_GET["x"];
			if ($status == 0) {
				$title = "INACTIVE CARD LIST";
			} else if ($status == 1) {
				$title = "ACTIVE CARD LIST";
			}
			else if ($status == 2){
				$title = "ALL CARD LIST";
			}
		}
		$this->Cell(30, 8, $title, 0, 1, 'C');
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
		//$this->Cell(30, 10, 'ID', 'B', 0, 'L');
		$this->Cell(50, 10, 'File Name', 'B', 0, 'L');
		$this->Cell(50, 10, 'Card Code', 'B', 0, 'L');
		$this->Cell(50, 10, 'Card Point/s', 'B', 0, 'L');
		$this->Cell(45, 10, 'Date Created', 'B', 1, 'L');
		//$this->Cell(190,10,'',1,0,'C');
		if($_GET["x"] != 2) {
			$status = $_GET["x"];
			if(($_GET["start"] != "")  && ($_GET["end"] != "")){
				$startdate = $_GET["start"];
				$enddate = $_GET["end"];

				$sqlStatement = "SELECT * FROM card_tbl WHERE (card_activation BETWEEN '$startdate' AND '$enddate') AND _isdel = $status";
			}
			else{
				$sqlStatement = "SELECT * FROM card_tbl WHERE _isdel = $status";
			}
		}
		else{
			if(($_GET["start"] != "")  && ($_GET["end"] != "")){
				$startdate = $_GET["start"];
				$enddate = $_GET["end"];

				$sqlStatement = "SELECT * FROM card_tbl WHERE card_activation BETWEEN '$startdate' AND '$enddate'";
			}
			else{
				$sqlStatement = "SELECT * FROM card_tbl";
			}
		}

		if ($this->selectWithJoin($sqlStatement) != 0) {
			foreach ($this->selectWithJoin($sqlStatement) as $value) {
				$this->SetFont('Times', '', 10);
				//$this->Cell(30, 8, ' ' . "CARD-".$this->setId($value["card_id"]), 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["card_img"], 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["card_code"], 'B', 0, 'L');
				$this->Cell(50, 8, ' ' . $value["card_points"], 'B', 0, 'L');
				$this->Cell(45, 8, ' ' . date("d-M-Y", strtotime($value["card_activation"])), 'B', 1, 'L');
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
