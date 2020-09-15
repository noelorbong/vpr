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
		$this->Cell(30, 8, 'FOOD MENU', 0, 1, 'C');
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
		$sqlStatement = "SELECT * FROM category_tbl WHERE _isdel = 0";
		if ($this->selectWithJoin("$sqlStatement") != 0) {
			foreach ($this->selectWithJoin("$sqlStatement") as $value) {
				$foocatid = $value["cat_id"];

				$this->SetFont('Times', 'UI', 10);
				//$this->Cell(150, 6, 'As of : ' . date("F j, Y"), 0, 1, 'L');
				$this->SetFont('Arial', 'B', 20);
				//$this->Cell(20, 10, 'ID', 'B', 0, 'L');
				$this->Cell(190, 10, $value["cat_name"], 'B', 0, 'C');
				$this->Ln(10);
				//$this->Cell(150, 6, 'As of : ' . date("F j, Y"), 0, 1, 'L');
				$sqlStatement1 = "SELECT * FROM foods_tbl WHERE food_cat_id = $foocatid AND _isdel = 0";
				$x = 1;
				if ($this->selectWithJoin("$sqlStatement1") != 0) {
					foreach ($this->selectWithJoin("$sqlStatement1") as $value) {
						$this->SetFont('Times', 'UI', 10);
						//$this->Cell(150, 6, 'As of : ' . date("F j, Y"), 0, 1, 'L');
						$this->SetFont('Arial', 'B', 10);
						$this->Cell(50, 10, $value["food_name"], 0, 0, 'L');
						$this->Cell(45, 10, "PHP ".$value["food_amount"], 0, 0, 'L');

						if($x % 2 == 0){
							$this->Ln();
							$x++;
						}
						else{
							$x++;
						}
					}
				}
				$this->Ln();
			}
		}
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
