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
	$pdf->Cell(105, 10, 'BORROWED BOOKS', 0, 1, 'C');

	$pdf->Line(30, 50, 180, 50);

	$query = "SELECT u.firstname as firstname, b.title_of_the_book as title_of_the_book, b.author_of_the_book as author_of_the_book, b.classification_number as classification_number, b.assertion_number as assertion_number, date, return_date, return_book, overdue_balance, receipt FROM lending l INNER JOIN users u on u.id=l.user_id INNER JOIN books b on b.id=l.book_id";
	$result = mysqli_query($con, $query);
	$no = 1;
	if (mysqli_num_rows($result)) {
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Ln(10);
		$pdf->Cell(10);
		$pdf->Cell(10, 6, 'SN', 1, 0, 'C');
		$pdf->Cell(45, 6, "Student's Name", 1, 0, 'C');
		$pdf->Cell(45, 6, 'Title of the Book', 1, 0, 'C');
		$pdf->Cell(45, 6, 'Author of the Book', 1, 0, 'C');
		$pdf->Cell(43, 6, 'Overdue Balance', 1, 1, 'C');

		while ($row = mysqli_fetch_assoc($result)) {
			$pdf->SetFont('Arial', '', 11);
			$pdf->Cell(10);
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(45, 6, $row['firstname'], 1, 0, 'L');
			$pdf->Cell(45, 6, $row['title_of_the_book'], 1, 0, 'C');
			$pdf->Cell(45, 6, $row['author_of_the_book'], 1, 0, 'C');
			$pdf->Cell(43, 6, $row['overdue_balance'], 1, 1, 'C');
		}
	}else{
		echo "QUERY FAILED";
	}




	$pdf->Output();


 ?>
