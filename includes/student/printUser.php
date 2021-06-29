<?php
	include (__DIR__.'/../includes/connection.php');
	require (__DIR__.'/../fpdf/fpdf.php');
	$pdf = new FPDF('P', 'mm', 'A4');
	$pdf->AddPage();

	$pdf->SetFont('Times', 'B', 20);
	$pdf->Cell(32);
	$pdf->Cell(130, 12, 'ARUSHA TECHNICAL COLLEGE', 0, 1, 'C');

	$pdf->Image(__DIR__.'/../public/imgs/atclogo.png', 90, 19, 26, 26);

	$pdf->Ln(20);
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Cell(44);
	$pdf->Cell(105, 10, 'Currently Active Users', 0, 1, 'C');

	$pdf->Line(30, 50, 180, 50);

	$query = "SELECT * FROM users WHERE status = 'Active'";
	$result = mysqli_query($con, $query);
	$no = 1;
	if (mysqli_num_rows($result)) {
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Ln(10);
		$pdf->Cell(10);
		$pdf->Cell(10, 6, 'SN', 1, 0, 'C');
		$pdf->Cell(60, 6, 'First Name', 1, 0, 'C');
		$pdf->Cell(60, 6, 'Last Name', 1, 0, 'C');
		$pdf->Cell(70, 6, 'Email Address', 1, 0, 'C');
		$pdf->Cell(15, 6, 'Gender', 1, 0, 'C');
		$pdf->Cell(15, 6, 'Level', 1, 0, 'C');
		$pdf->Cell(15, 6, 'Role', 1, 1, 'C');
		$pdf->Cell(15, 6, 'Status', 1, 0, 'C');

		while ($row = mysqli_fetch_assoc($result)) {
			$pdf->SetFont('Arial', '', 11);
			$pdf->Cell(10);
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(60, 6, $row['firstname'], 1, 0, 'L');
			$pdf->Cell(60, 6, $row['lastname'], 1, 0, 'L');
			$pdf->Cell(70, 6, $row['email'], 1, 0, 'L');
			$pdf->Cell(15, 6, $row['gender'], 1, 0, 'C');
			$pdf->Cell(15, 6, $row['level'], 1, 0, 'C');
			$pdf->Cell(15, 6, $row['role'], 1, 1, 'C');
			$pdf->Cell(15, 6, $row['status'], 1, 0, 'C');

		}
	}




	$pdf->Output();


 ?>
