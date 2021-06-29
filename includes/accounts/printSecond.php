<?php
	include (__DIR__.'/../connection.php');
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

	$query = "SELECT u.firstname as firstname, f.first2 as first2, f.semester2 as semester2, f.id as id, f.status as status FROM finance f INNER JOIN users u on u.id=f.user_id";
	$result = mysqli_query($con, $query);
	$no = 1;
	if (mysqli_num_rows($result)) {
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Ln(10);
		$pdf->Cell(25);
		$pdf->Cell(10, 6, 'SN', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Firstname', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Semester 1', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Semester 2', 1, 0, 'C');
		$pdf->Cell(25, 6, 'Status', 1, 1, 'C');

		while ($row = mysqli_fetch_assoc($result)) {
			$pdf->SetFont('Arial', '', 11);
			$pdf->Cell(25);
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(35, 6, $row['firstname'], 1, 0, 'L');
			$pdf->Cell(35, 6, $row['first2'], 1, 0, 'L');
			$pdf->Cell(35, 6, $row['semester2'], 1, 0, 'L');
			$pdf->Cell(25, 6, $row['status'], 1, 1, 'C');
		}
	}else{
		echo "QUERY FAILED";
	}




	$pdf->Output();


 ?>