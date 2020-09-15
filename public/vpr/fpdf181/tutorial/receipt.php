<?php
require('../fpdf.php');

$objectMaintenance = new Maintenance();

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
		$this->Cell(60, 4, 'OR Number: '.$_SESSION["ornumber"], 0, 1, 'C');
		$this->Ln(10);
	}

	// Page footer
//	function Footer()
//	{
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
		$tbnum = $_SESSION['tblnumber'];
		$this->Cell(60, 4, 'Cashier: '.$_SESSION["employeeName"], 0, 1, 'L');
		$this->Cell(60, 4, '===============================', 0, 1, 'L');
		$this->Cell(40, 4, date("d-M-Y h:iA"), 0, 0, 'L');
		if($tbnum[0] == "T"){
			$this->Cell(20, 4, 'Take-Out #: '.$_SESSION['tblnumber'], 0, 1, 'R');
		}
		else{
			$this->Cell(20, 4, 'Table #: '.$_SESSION['tblnumber'], 0, 1, 'R');
		}
		$this->Cell(60, 4, '================================', 0, 1, 'L');
		if($tbnum[0] == "T"){
			$this->SetFont('Courier', 'B', 10);
			$this->Cell(60, 4, '----------TAKE-OUT-----------', 0, 1, 'C');
		}
		else{
			$this->SetFont('Courier', 'B', 10);
			$this->Cell(60, 4, '----------DINE-IN-----------', 0, 1, 'C');
		}
		$this->SetFont('Arial', '', 9);
		$tablenum = $_SESSION['tblnumber'];
		$cartcode = $_SESSION['cartcode'];
		$sqlStatement = "SELECT food_amount AS 'FoodAmount', food_desc as 'FoodDesc', food_name AS 'FoodName', SUM(cart_qty) AS 'Quantity', SUM(cart_amount) AS 'Amount' FROM cart_tbl JOIN foods_tbl ON food_id = cart_food_id WHERE cart_code = '$cartcode' GROUP BY cart_food_id";
		if ($this->selectWithJoin($sqlStatement) != 0) {
			foreach ($this->selectWithJoin($sqlStatement) as $value) {
				$this->Cell(60, 4, $value["FoodName"], 0, 1, 'L');
				$this->Cell(5);
				$this->Cell(20, 4, '@ '.$value["Quantity"].' x '.number_format($value["FoodAmount"], 2), 0, 0, 'L');
				$this->Cell(35, 4, number_format($value["Amount"], 2), 0, 1, 'R');
			}
		}
		$this->Cell(60, 4, '-------------------------------------------------------', 0, 1, 'L');
		$this->Cell(20, 4, 'Sub-Total', 0, 0, 'L');
		$this->Cell(40, 4, number_format($_SESSION['subtotal'], 2), 0, 1, 'R');
		$this->Cell(20, 4, 'Value Added Tax', 0, 0, 'L');
		$this->Cell(40, 4, number_format($_SESSION['tax'], 2), 0, 1, 'R');
		$this->Cell(20, 4, 'Discount', 0, 0, 'L');
		$this->Cell(40, 4, number_format($_SESSION['discount'], 2), 0, 1, 'R');

		$_SESSION['OrigTotal'] = $_SESSION['total'] + $_SESSION['discount'];
		if($_SESSION['OrigTotal'] == $_SESSION['total']){
			$this->SetFont('Arial', 'B', 10);
			$this->Cell(20, 4, 'TOTAL DUE', 0, 0, 'L');
			$this->Cell(40, 4, number_format($_SESSION['total'], 2), 0, 1, 'R');
		}
		else{
			$this->SetFont('Arial', 'B', 10);
			$this->Cell(20, 4, 'Total', 0, 0, 'L');
			$this->Cell(40, 4, number_format($_SESSION['OrigTotal'], 2), 0, 1, 'R');
			$this->Cell(20, 4, 'AMOUNT DUE', 0, 0, 'L');
			$this->Cell(40, 4, number_format($_SESSION['total'], 2), 0, 1, 'R');
		}


		$this->Ln(5);
		$code = $_SESSION["ornumber"];
		$sqlStatement4 = "SELECT * FROM cc_tbl WHERE cc_cart_code = '$code'";
		if ($this->selectWithJoin($sqlStatement4) != 0) {
			foreach ($this->selectWithJoin($sqlStatement4) as $value) {
				$this->SetFont('Arial', '', 9);
				$this->Cell(60, 4, 'Card #: '.$value["cc_cardnumber"], 0, 1, 'L');
				$this->Cell(20, 4, 'Card Amount', 0, 0, 'L');
				$this->Cell(40, 4, number_format($value["cc_amountsettled"], 2), 0, 1, 'R');
			}
		}

		$this->SetFont('Arial', '', 9);
		$this->Cell(20, 4, 'Cash', 0, 0, 'L');

		if($_SESSION['cash'] == "")
			$this->Cell(40, 4, '0.00', 0, 1, 'R');
		else
			$this->Cell(40, 4, number_format($_SESSION['cash'], 2), 0, 1, 'R');

		$this->SetFont('Arial', 'B', 10);
		$this->Cell(20, 4, 'CHANGE', 0, 0, 'L');
		$this->Cell(40, 4, number_format($_SESSION['change'], 2), 0, 1, 'R');

		if($_SESSION['code'] != ""){
			$this->Ln(5);
			$this->SetFont('Arial', '', 9);
			$this->Cell(60, 4, 'Card #: '.@$_SESSION['code'], 0, 1, 'L');
			$this->Cell(60, 4, 'Point/s Earned: '.@$_SESSION['earned'], 0, 1, 'L');
			$this->Cell(60, 4, 'Total Point/s: '.@$_SESSION['totalpoint'], 0, 1, 'L');
			$_SESSION['checkcard1'] = 0;
			$_SESSION['checkcard'] = 0;
		}
		if($_SESSION['scfullname'] != ""){
			$fullname = $_SESSION['scfullname'];
			$this->Ln(5);
			$this->SetFont('Arial', '', 9);
			$this->Cell(60, 4, 'Senior Citizen', 0, 1, 'L');
			foreach($_SESSION['sccardid'] as $cardcode => $sccardcode) {
				$this->Cell(60, 4, 'Full Name: ' . $fullname[$cardcode], 0, 1, 'L');
				$this->Cell(60, 4, 'Card ID: ' . $sccardcode, 0, 1, 'L');
			}
		}
		$this->Ln(10);
		$this->Cell(60, 4, 'THIS SERVES AS YOUR',0,1,'C');
		$this->Cell(60, 4, 'OFFICIAL RECEIPT ',0,0,'C');
		$this->Ln();
	}
}

// Instanciation of inherited class
$pdf = new PDF("P", "mm", array(80, 6000));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Body();
$pdf->Output();
?>
