<?php 
		$data = [
			'name' => 'Nayan Agrawal',
			'eventname' => 'Core Team',
			'refno' => 'SVPCET/CE/CSI/2019/INFINITY2K19/001'
		];

		require '../../lib/fpdf/fpdf.php';

		//Create PDF object
		$pdf = new FPDF('p', 'mm', 'A4');

		$pdf->SetTitle("INFINITY'19 | CERTIFICATE");
		
		//AddPage method to add page
		$pdf->AddPage();


		//Image (filename, x position, y position, width [optional], height[optional])
		$pdf->Image('../../assets/img/infinity.jpg', 5, 5, 205, 'C');
		
		$pdf->Cell(200, 140, '', 0, 2, 'C');

		$pdf->SetFont('Arial', '', '20');
		$pdf->SetFont('Arial', 'I', '18');
		$pdf->Cell(200, 10, 'This certificate is awarded to,', 0, 1, 'C'); 
		$pdf->Cell(10, 10, '', 0, 0); 
		$pdf->Cell(80, 10, 'Mr./Ms. ', 0, 0, 'R');

		$pdf->SetFont('Arial', 'B', '18');
		$pdf->Cell(50, 10, $data['name'], 0, 1, 'L');

		$pdf->SetFont('Arial', 'I', '18');
		$pdf->Cell(10, 10, '', 0, 0); 
		$pdf->Cell(170, 10, 'of SVPCET, Nagpur for working as ', 0, 1, 'C');

		$pdf->SetFont('Arial', 'B', '18');
		$pdf->Cell(200, 10, $data['eventname'], 0, 1, 'C');

		$pdf->SetFont('Arial', '', '18');
		$pdf->Cell(70, 10, '', 0, 0); 
		$pdf->Cell(200, 10, 'of infinity 2k19 held on ', 0, 1, 'L');
		$pdf->Cell(50, 10, '', 0, 0); 
		$pdf->Cell(185, 10, '13th and 14th September 2019-20 ', 0, 1, 'L');
		
		$pdf->SetFont('Arial', 'B', '13');
		$pdf->Cell(100, 10, '', 0, 1, 'C');
		$pdf->Cell(125, 10, 'REF NO: '.$data['refno'], 0, 1, 'C');
		// $pdf->Cell(8, 10, '', 0, 0, 'L');
		// $pdf->Cell(60, 10, 'MEMBERSHIP NO: IO1705', 0, 1, 'C');
		
		$pdf->Output("I", "INFINITY'19 Certificate");

 ?>