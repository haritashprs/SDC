<?php 
	require_once "../../config/config.con.php";

	Class Certificates extends Dbh {
	  
	  	public function getParticipantsData() {
	    	$sql= "SELECT * FROM infinity WHERE status=?";
	    	$stmt = $this->connect()->prepare($sql);

		    if ($stmt->execute(['0'])) { 
		    	$count = 0;
		    	require '../../lib/fpdf/fpdf.php';
			    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			    	$result = $this->generatePDF($row);
			    	if ($result) {
			    		$count++;
			    	}
			    }
		    } else {
		    	return false;
		    }
	  	}

	  	public function generatePDF($data) {
  			//Create PDF object
		    $pdf = new FPDF('p', 'mm', 'A4');

		    $pdf->SetTitle("INFINITY'19 | CERTIFICATE");
		    
		    //AddPage method to add page
		    $pdf->AddPage();


		    //Image (filename, x position, y position, width [optional], height[optional])
		    $pdf->Image('../../assets/img/csi.png', 5, 5, 205, 'C');
		    
		    $pdf->Cell(200, 140, '', 0, 2, 'C');

			$pdf->SetFont('Arial', '', '20');
			$pdf->SetFont('Arial', 'I', '18');
			$pdf->Cell(200, 10, 'This certificate is awarded to,', 0, 1, 'C'); 
			$pdf->Cell(10, 10, '', 0, 0); 
			$pdf->Cell(80, 10, $data['title'], 0, 0, 'R');

			$pdf->SetFont('Arial', 'B', '18');
			$pdf->Cell(50, 10, $data['name'], 0, 1, 'L');

			$pdf->SetFont('Arial', 'I', '18');
			$pdf->Cell(10, 10, '', 0, 0); 
			$pdf->Cell(170, 10, 'of SVPCET, Nagpur for working as ', 0, 1, 'C');

			$pdf->SetFont('Arial', 'B', '18');
			$pdf->Cell(200, 10, $data['eventname'], 0, 1, 'C');

			$pdf->SetFont('Arial', '', '18');
			$pdf->Cell(50, 10, '', 0, 0); 
			$pdf->Cell(200, 10, 'for working in the academic year ', 0, 1, 'L');
			$pdf->Cell(80, 10, '', 0, 0); 
			$pdf->Cell(185, 10, '2019 -2020 ', 0, 1, 'L');
			
			$pdf->SetFont('Arial', 'B', '13');
			$pdf->Cell(100, 10, '', 0, 1, 'C');
			$pdf->Cell(125, 10, 'REF NO: '.$data['refno'], 0, 1, 'C');
			$pdf->Cell(8, 10, '', 0, 0, 'L');
			$pdf->Cell(60, 10, 'MEMBERSHIP NO: IO1705', 0, 1, 'C');
		    
		    $file = $pdf->Output("S", "INFINITY'19 Certificate");

  		    $this->sentMail($data, $file);

	  	}

	  	public function sentMail($data, $file) {
	  		require_once('../../lib/PHPmailer/PHPMailerAutoload.php');
	  		try {

	  			$mail = new PHPMailer();                              // Passing `true` enables exception

	  			//Server settings
	  			$mail->SMTPDebug = 2;                                 // Enable verbose debug output
	  			$mail->isSMTP();                                      // Set mailer to use SMTP
	  			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	  			$mail->SMTPAuth = true;   
	  			$mail->SMTPOptions = array(
	  			    'ssl' => array(
	  			        'verify_peer' => false,
	  			        'verify_peer_name' => false,
	  			        'allow_self_signed' => true
	  			    )
	  			);                            // Enable SMTP authentication
	  			$mail->Username = 'infinity@stvincentngp.edu.in';                 // SMTP username
	  			$mail->Password = 'infinity2k19';                           // SMTP password
	  			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	  			$mail->Port = 587;                                    // TCP port to connect to

	  			//Recipients
	  			$mail->setFrom('infinity@stvincentngp.edu.in', 'Sender');
	  			$mail->addAddress($data['email'], 'Reciever1');     // Add a recipient
	  			$mail->addReplyTo('no-reply@stvincentngp.edu.in', 'Information');
	  			$mail->addCC('infinity@stvincentngp.edu.in');
	  			// $mail->addBCC('bcc@example.com');

	  			//Attachments
	  			$mail->addStringAttachment($file, "Infinity'19 Certificate.pdf");         // Add attachments
	  			// $mail->addAttachment('../../../assets/files/'.strtolower($value[1]).'.pdf', 'Event PDF.pdf');    
	  			
	  			//Content
	  			$mail->isHTML(true);                                  // Set email format to HTML
	  			$mail->Subject = "Infinity 2k19 certificates";
	  			$mail->Body    = "Hey ".$data['name']."!<br/><br/>Thank you for being the part of the Infinity 2K19 family. We look forward to seeing you next year as well!<br/>In the attachments, you will find your certificate for the " . $data['eventname'] .".<br/>The reference number for your certificate is ".$data['refno']."<br/><br/><b>Regards,</b><br/><b>Team Infinity</b>";
	  			 
	  			if (!$mail->send()) {
	  				return false;
	  			} else {
	  				if ($this->updateStatus($data)) {
		  				return true;
	  				}
	  			}
	  		} catch (phpmailerException $e) {
	  			echo $e->errorMessage();
	  		} catch (Exception $e) {
	  			echo $e->getMessage();	
	  		}
	  		
	  	}

	  	public function updateStatus($data) {
	  		$sql = "UPDATE infinity SET status=? WHERE email=?";
	  		$stmt = $this->connect()->prepare($sql);

	  		if ($stmt->execute(['1', $data['email']])) {
	  			return true;
	  		} else {
	  			return false;
	  		}
	  	}

	}

	$certificates = new Certificates();

	if (isset($_POST['infinity'])) {
		if (!$certificates->getParticipantsData()) {
			$_SESSION['message'] = "All certificates have been sent!";
		}
	}
 ?>