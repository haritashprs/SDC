<?php 
	
	// call the autoload file
	require_once "../../../lib/PHPSpreadSheet/vendor/autoload.php";

	//Database connection
	require_once "../../../config/config.con.php";

	// load PhpSpreadSheet class using namespaces
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Style\Fill;
	use PhpOffice\PhpSpreadsheet\Style\Border;

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();

	//insert data in  the table
	$spreadsheet->setActiveSheetIndex(0);

	//Populate the data
	Class Data extends Dbh {

		public function styleSheet($sheet, $row, $spreadsheet) {

			// Title Style Array
			$titleStyleArray =[
							'font'=>[
								'bold' => true,
								'name' => 'Arial',
								'size' => '20',
							],
							'alignment' => [
							    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
							    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
							],

			];

			// Data Style Array
			$dataStyleArray = [
						'borders' => [
						    'outline' => [
						        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						    ],
						    'vertical' => [
						        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						    ],
						],

			];

			// Heading Style Array
			$headingStyleArray = [
						'alignment' => [
						    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
						    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
						],
						'borders' => [
						    'outline' => [
						        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						    ],
						    'vertical' => [
						        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						    ],
						],
			];

			//Merge Title
			$sheet->mergeCells('A1:M2');

			//Set Column Width
			$sheet->getColumnDimension('A')->setWidth(20);
			$sheet->getColumnDimension('B')->setWidth(20);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(20);
			$sheet->getColumnDimension('H')->setWidth(20);
			$sheet->getColumnDimension('I')->setWidth(20);
			$sheet->getColumnDimension('J')->setWidth(20);
			$sheet->getColumnDimension('K')->setWidth(20);
			$sheet->getColumnDimension('L')->setWidth(20);
			$sheet->getColumnDimension('M')->setWidth(20);
			$sheet->getColumnDimension('N')->setWidth(20);
			$sheet->getColumnDimension('M')->setWidth(20);

			//format the above cells with default formatting
			$sheet->getStyle('A1:M2')->applyFromArray($titleStyleArray);
			$sheet->getStyle('A3:M3')->applyFromArray($headingStyleArray);
			$sheet->getStyle('A4:M'.($row-1))->applyFromArray($dataStyleArray);

		}

		public function getData($sheet, $spreadsheet) {
			$sql = "SELECT * FROM registration WHERE status=? AND event=?";
			$stmt = $this->connect()->prepare($sql);
			
			if ($stmt->execute(['S','Gatewalk'])) {
				$row = 4;
				while ($data = $stmt->fetch()) {

					//make Table Headers
					$sheet->setCellValue('A1', 'Gatewalk Complete Registration List');
					$sheet->setCellValue('A3', 'UID');
					$sheet->setCellValue('B3', 'GROUP NAME');
					$sheet->setCellValue('C3', 'NO OF MEMBERS');
					$sheet->setCellValue('D3', 'REGISTRATION TYPE');
					$sheet->setCellValue('E3', 'OFFLINE CODE');
					$sheet->setCellValue('F3', 'INSTITUTE');
					$sheet->setCellValue('G3', 'NAME 1');
					$sheet->setCellValue('H3', 'EMAIL 1');
					$sheet->setCellValue('I3', 'CONTACT NO. 1');
					$sheet->setCellValue('J3', 'BRANCH');
					$sheet->setCellValue('K3', 'YEAR');
					$sheet->setCellValue('L3', 'PARTIAL AMOUNT');
					$sheet->setCellValue('M3', 'BALANCE AMOUNT');
					$sheet->setCellValue('N3', 'DATE');
					$sheet->setCellValue('O3', 'TIME');

					// Insert the data
					$sheet->setCellValue('A'.$row, $data['uid']);
					$sheet->setCellValue('B'.$row, $data['group_name']);
					$sheet->setCellValue('C'.$row, $data['no_members']);
					$sheet->setCellValue('D'.$row, $data['registration']);
					$sheet->setCellValue('E'.$row, $data['offline_code']);
					$sheet->setCellValue('F'.$row, $data['institute']);
					$sheet->setCellValue('G'.$row, $data['name1']);
					$sheet->setCellValue('H'.$row, $data['email1']);
					$sheet->setCellValue('I'.$row, $data['contact_no1']);
					$sheet->setCellValue('J'.$row, $data['branch']);
					$sheet->setCellValue('K'.$row, $data['year']);
					$sheet->setCellValue('L'.$row, $data['partial_amount']);
					$sheet->setCellValue('M'.$row, $data['bal_amount']);
					$sheet->setCellValue('N'.$row, $data['date']);
					$sheet->setCellValue('O'.$row, $data['time']);

					$row++;

					$this->styleSheet($sheet, $row, $spreadsheet);
				}
			}
		}
	} 
	

	$data = new Data();
	$data->getData($sheet, $spreadsheet);

	//set the header
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Gatewalk.xlsx"');

	$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
	//save into php output
	$writer->save('php://output');

 ?>