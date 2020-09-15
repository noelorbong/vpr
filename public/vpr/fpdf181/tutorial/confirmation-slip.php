<?php
require('../fpdf.php');

$objectMaintenance = new Maintenance();

//$_SESSION["fullname"];
//$_SESSION["datearrival"];
//$_SESSION["timearrival"];
//$_SESSION["guest"];

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->SetFont('Arial','B',9);
		$this->Cell(60, 4, 'ERWINS SISIGAN & NINGNANGAN', 0, 1, 'C');
		$this->SetFont('Arial', '', 9);
		$this->Cell(60, 4, 'Plazang Luma, Arayat, Pampanga', 0, 1, 'C');
		$this->Cell(60, 4, 'VAT Reg TIN: 009-217-708-000', 0, 1, 'C');
		$this->Ln(9);
		$this->SetFont('Arial','B',13);
		$this->Cell(60, 4, 'CONFIRMATION SLIP', 0, 1, 'C');
		$this->Ln(9);
	}

	// Page footer
	//function Footer()
	//{
//		// Position at 1.5 cm from bottom
//		$this->SetY(-15);
//		// Arial italic 8
//		$this->SetFont('Arial','', 8);
//		// Page number
//		$this->Cell(0,5,'Page '.$this->PageNo().' - {nb}','T', 0, 'R');
//	}

	function Body()
	{
		$this->SetFont('Arial', '', 9);
		//$this->Cell(60, 4, 'Cashier: ', 0, 1, 'L');
		$this->Cell(60, 4, '===============================', 0, 1, 'L');
		$this->Cell(40, 4, "Reservation Code", 0, 0, 'L');
		$this->Cell(20, 4, @$_SESSION["code"], 0, 1, 'R');
		$this->Cell(60, 4, '================================', 0, 1, 'L');
		$this->SetFont('Arial', '', 9);
		$this->Cell(20, 4, 'Customer Name', 0, 0, 'L');
		$this->Cell(40, 4, @$_SESSION["fullname"], 0, 1, 'R');

		$currentDate = date("Y-m-d");
		$rescode = $_SESSION["code"];
		$sqlStatement = "SELECT res_id, res_arrival_date, res_arrival_time, res_guest FROM reservation_tbl JOIN customer_tbl ON cust_id = res_cust_id WHERE res_code = '$rescode' AND res_date = '$currentDate' ORDER BY res_id DESC";
		if ($this->selectWithJoin($sqlStatement) != 0) {
			foreach ($this->selectWithJoin($sqlStatement) as $value) {
				$this->Cell(20, 4, '# of Guests', 0, 0, 'L');
				$this->Cell(40, 4, $value["res_guest"], 0, 1, 'R');
				$this->Cell(20, 4, 'Dine in Date', 0, 0, 'L');
				$this->Cell(40, 4, date("d-M-Y", strtotime($value["res_arrival_date"])), 0, 1, 'R');
				$this->Cell(20, 4, 'ETA', 0, 0, 'L');
				$this->Cell(40, 4, date("h:i A", strtotime($value["res_arrival_time"])), 0, 1, 'R');
				$this->Ln(5);
			}
		}


		$this->Cell(20, 4, 'Total', 0, 0, 'L');
		$this->Cell(40, 4, number_format(@$_SESSION["restotal"], 2), 0, 1, 'R');

		$this->Cell(20, 4, 'Cash', 0, 0, 'L');
		$this->Cell(40, 4, number_format(@$_SESSION["rescash"], 2), 0, 1, 'R');
		$this->Cell(20, 4, 'Change', 0, 0, 'L');
		$this->Cell(40, 4, number_format(@$_SESSION["reschange"], 2), 0, 1, 'R');
		$this->Ln(5);
	}
}

// Instanciation of inherited class
$pdf = new PDF("P", "mm", array(80, 500));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Body();
$pdf->Output();
?>
