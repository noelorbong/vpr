<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->auditTrail('Print Sales Report');
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(30);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 8, 'SALES REPORT', 0, 1, 'C');
		// Line break
		$this->Ln(10);

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
		$this->SetFont('Times', 'UI', 10);
		$this->Cell(110, 6, 'As of : ' . date("F j, Y"), 0, 0, 'L');
		if(isset($_GET["startDate"]) && isset($_GET["endDate"])) {
			$startdate = $_GET["startDate"];
			$enddate = $_GET["endDate"];

			$this->Cell(80,6,'Covered Period : ' . date("F j, Y", strtotime($startdate))." - ".date("F j, Y", strtotime($enddate)),0,0,'R');
		}
		$this->Ln();
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(90,10,'Code','B',0,'L');
		$this->Cell(50,10,'Date','B',0,'L');
		$this->Cell(50,10,'Amount','B',1,'R');
		//$this->Cell(190,10,'',1,0,'C');
		if(isset($_GET["startDate"]) && isset($_GET["endDate"])) {
			$startdate = $_GET["startDate"];
			$enddate = $_GET["endDate"];

			$SqlStatement = "SELECT * FROM transaction_tbl WHERE trans_date BETWEEN '$startdate' AND '$enddate'";
			$SqlStatementTotal = "SELECT SUM(trans_food_amount) AS 'Total' FROM transaction_tbl WHERE trans_date BETWEEN '$startdate' AND '$enddate'";
		}
		else{
			$SqlStatement = "SELECT * FROM transaction_tbl";
			$SqlStatementTotal = "SELECT SUM(trans_food_amount) AS 'Total' FROM transaction_tbl";
		}
		$this->SetFont('Arial', '', 10);
		if ($this->selectWithJoin($SqlStatement) != 0) {
			foreach ($this->selectWithJoin($SqlStatement) as $value) {
				$this->Cell(90,10,$value["trans_cart_code"],'B',0,'L');
				$this->Cell(50,10,date("d-M-Y", strtotime($value["trans_date"])),'B',0,'L');
				$this->Cell(50,10,number_format($value["trans_food_amount"], 2),'B',1,'R');
			}

		}


		if ($this->selectWithJoin($SqlStatementTotal) != 0) {
			foreach ($this->selectWithJoin($SqlStatementTotal) as $value) {
				$this->SetFont('Arial', 'B', 10);
				$this->Cell(90,10,'TOTAL SALES: ','B',0,'L');
				$this->Cell(50,10,'','B',0,'L');
				$this->Cell(50,10,'PHP '.number_format($value["Total"], 2),'B',1,'R');
			}

		}
		$this->Ln(2);
		$this->Cell(190, 10, 'Total # Of Records : ' . count($this->selectWithJoin($SqlStatement)), 0, 0, 'R');
		$this->Ln();
		$this->Cell(190, 10, 'Printed by : ' . @$_SESSION["employeeName"], 0, 0, 'R');

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
