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
			$sheet->mergeCells('A1:Z2');

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
			$sheet->getColumnDimension('O')->setWidth(20);
			$sheet->getColumnDimension('P')->setWidth(20);
			$sheet->getColumnDimension('Q')->setWidth(20);
			$sheet->getColumnDimension('R')->setWidth(20);
			$sheet->getColumnDimension('S')->setWidth(20);
			$sheet->getColumnDimension('T')->setWidth(20);
			$sheet->getColumnDimension('U')->setWidth(20);
			$sheet->getColumnDimension('V')->setWidth(20);
			$sheet->getColumnDimension('W')->setWidth(20);
			$sheet->getColumnDimension('X')->setWidth(20);
			$sheet->getColumnDimension('Y')->setWidth(20);
			$sheet->getColumnDimension('Z')->setWidth(20);


			//format the above cells with default formatting
			$sheet->getStyle('A1:Z2')->applyFromArray($titleStyleArray);
			$sheet->getStyle('A3:Z3')->applyFromArray($headingStyleArray);
			$sheet->getStyle('A4:Z'.($row-1))->applyFromArray($dataStyleArray);

		}

		public function getData($sheet, $spreadsheet) {
			$sql = "SELECT * FROM registration WHERE status=?";
			$stmt = $this->connect()->prepare($sql);
			
			if ($stmt->execute(['S'])) {
				$row = 4;
				while ($data = $stmt->fetch()) {

					//make Table Headers
					$sheet->setCellValue('A1', 'Complete Registration List');
					$sheet->setCellValue('A3', 'UID');
					$sheet->setCellValue('B3', 'Event');
					$sheet->setCellValue('C3', 'GROUP NAME');
					$sheet->setCellValue('D3', 'NO OF MEMBERS');
					$sheet->setCellValue('E3', 'REGISTRATION TYPE');
					$sheet->setCellValue('F3', 'OFFLINE CODE');
					$sheet->setCellValue('G3', 'INSTITUTE');
					$sheet->setCellValue('H3', 'NAME 1');
					$sheet->setCellValue('I3', 'EMAIL 1');
					$sheet->setCellValue('J3', 'CONTACT NO. 1');
					$sheet->setCellValue('K3', 'NAME 2');
					$sheet->setCellValue('L3', 'EMAIL 2');
					$sheet->setCellValue('M3', 'CONTACT NO. 2');
					$sheet->setCellValue('N3', 'NAME 3');
					$sheet->setCellValue('O3', 'EMAIL 3');
					$sheet->setCellValue('P3', 'NAME 4');
					$sheet->setCellValue('Q3', 'EMAIL 4');
					$sheet->setCellValue('R3', 'NAME 5');
					$sheet->setCellValue('S3', 'EMAIL 5');
					$sheet->setCellValue('T3', 'BRANCH');
					$sheet->setCellValue('U3', 'YEAR');
					$sheet->setCellValue('V3', 'DIVISION');
					$sheet->setCellValue('W3', 'PARTIAL AMOUNT');
					$sheet->setCellValue('X3', 'BALANCE AMOUNT');
					$sheet->setCellValue('Y3', 'DATE');
					$sheet->setCellValue('Z3', 'TIME');

					// Insert the data
					$sheet->setCellValue('A'.$row, $data['uid']);
					$sheet->setCellValue('B'.$row, $data['event']);
					$sheet->setCellValue('C'.$row, $data['group_name']);
					$sheet->setCellValue('D'.$row, $data['no_members']);
					$sheet->setCellValue('E'.$row, $data['registration']);
					$sheet->setCellValue('F'.$row, $data['offline_code']);
					$sheet->setCellValue('G'.$row, $data['institute']);
					$sheet->setCellValue('H'.$row, $data['name1']);
					$sheet->setCellValue('I'.$row, $data['email1']);
					$sheet->setCellValue('J'.$row, $data['contact_no1']);
					$sheet->setCellValue('K'.$row, $data['name2']);
					$sheet->setCellValue('L'.$row, $data['email2']);
					$sheet->setCellValue('M'.$row, $data['contact_no2']);
					$sheet->setCellValue('N'.$row, $data['name3']);
					$sheet->setCellValue('O'.$row, $data['email3']);
					$sheet->setCellValue('P'.$row, $data['name4']);
					$sheet->setCellValue('Q'.$row, $data['email4']);
					$sheet->setCellValue('R'.$row, $data['name5']);
					$sheet->setCellValue('S'.$row, $data['email5']);
					$sheet->setCellValue('T'.$row, $data['branch']);
					$sheet->setCellValue('U'.$row, $data['year']);
					$sheet->setCellValue('V'.$row, $data['division']);
					$sheet->setCellValue('W'.$row, $data['partial_amount']);
					$sheet->setCellValue('X'.$row, $data['bal_amount']);
					$sheet->setCellValue('Y'.$row, $data['date']);
					$sheet->setCellValue('Z'.$row, $data['time']);

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
	header('Content-Disposition: attachment;filename="complete.xlsx"');

	$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
	//save into php output
	$writer->save('php://output');

 ?>