<?php
require('../fpdf.php');

class PDF extends FPDF
{

	// Page header
	function Header()
	{
		$this->auditTrail('Print Food Served Report');
		$this->Image('header3.jpg', 0, 0, 210);
		// Arial bold 15
		$this->Ln(30);
		$this->SetFont('Helvetica', 'B', 25);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 8, 'FOOD SERVED REPORT', 0, 1, 'C');
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
		$this->Cell(20, 10, 'Food Name', 'B', 0, 'L');
		$this->Cell(70, 10, 'Qty Served', 'B', 0, 'R');
		$this->Cell(15);
		$this->Cell(20, 10, 'Food Name', 'B', 0, 'L');
		$this->Cell(70, 10, 'Qty Served', 'B', 1, 'R');
		//$this->Cell(190,10,'',1,0,'C');

		if(isset($_GET["startDate"]) && isset($_GET["endDate"])){
			$startdate = $_GET["startDate"];
			$enddate = $_GET["endDate"];

			$sqlStatement = "SELECT food_name, SUM(cart_qty) AS 'SumQty' FROM cart_tbl JOIN foods_tbl ON food_id = cart_food_id WHERE cart_Date BETWEEN '$startdate' AND '$enddate' GROUP BY cart_food_id";
		}
		else{
			$sqlStatement = "SELECT food_name, SUM(cart_qty) AS 'SumQty' FROM cart_tbl JOIN foods_tbl ON food_id = cart_food_id GROUP BY cart_food_id";
		}

		if ($this->selectWithJoin($sqlStatement) != 0) {
			$x = 1;
			foreach ($this->selectWithJoin($sqlStatement) as $value) {
				$this->SetFont('Times', '', 10);
				$this->Cell(20, 8, ' ' .$value["food_name"], 0, 0, 'L');
				$this->Cell(70, 8, ' ' .$value["SumQty"], 0, 0, 'R');
				$this->Cell(15, 8);
				if($x % 2 == 0){
					$this->Ln();
					$x++;
				}
				else{
					$x++;
				}

			}
			$this->Ln();
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
