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
	$pdf->Cell(105, 10, "VIEW SPORT'S TOOLS	", 0, 1, 'C');

	$pdf->Line(30, 50, 180, 50);

	$query = "SELECT u.firstname as firstname, s.id as id, s.role as role, s.sport_tool as sport_tool, s.no_tools as no_tools, s.date as date, s.returning_date as returning_date, s.status as status FROM sports s INNER JOIN users u on u.id=s.user_id";
	$result = mysqli_query($con, $query);
	$no = 1;
	if (mysqli_num_rows($result)) {
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Ln(10);
		$pdf->Cell(10);
		$pdf->Cell(10, 6, 'SN', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Firstname', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Sport Tool', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Number of Tools', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Role', 1, 0, 'C');
		$pdf->Cell(25, 6, 'Status', 1, 1, 'C');

		while ($row = mysqli_fetch_assoc($result)) {
			$pdf->SetFont('Arial', '', 11);
			$pdf->Cell(10);
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(35, 6, $row['firstname'], 1, 0, 'L');
			$pdf->Cell(35, 6, $row['sport_tool'], 1, 0, 'C');
			$pdf->Cell(35, 6, $row['no_tools'], 1, 0, 'C');
			$pdf->Cell(40, 6, $row['role'], 1, 0, 'C');
			$pdf->Cell(25, 6, $row['status'], 1, 1, 'C');
		}
	}else{
		echo "QUERY FAILED";
	}




	$pdf->Output();


 ?>
