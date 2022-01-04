<?php 
	
	require_once "../../config/config.con.php";

	Class Backup extends Dbh {
	  
		public function backupData() {
		    $output = '';
		    foreach ($_POST['table'] as $table) {
		    	$sql = "SHOW CREATE TABLE ".$table."";
		    	$stmt = $this->connect()->prepare($sql);

		    	if ($stmt->execute()) {
		    		$result = $stmt->fetchAll();

		    		foreach ($result as $row) {
		    			$output .= "\n\n".$row["Create Table"].";\n\n";

		    		}

		    		$query = "SELECT * FROM ".$table;
		    		$stmt = $this->connect()->prepare($query);
		    		$stmt->execute();
		    		$total_row = $stmt->rowCount();

		    		for ($count=0; $count < $total_row; $count++) { 
		    			$single_result = $stmt->fetch(PDO::FETCH_ASSOC);
		    			$table_column_array = array_keys($single_result);
		    			$table_value_array = array_values($single_result);

		    			$output .= "\n\n INSERT INTO $table (";
		    			$output .= "".implode(",", $table_column_array).") VALUES (";
		    			$output .= "'".implode("','", $table_value_array)."');\n";

		    		}
		    	}

		    	// $file_name = 'database_backup_on_'.date('y-m-d').'.sql';
		    	// $file_handle = fopen($file_name, 'w+');
		    	// fwrite($file_handle, $output);
		    	// fclose($file_handle);
		    	$this->sentmail($output);
		    	// ob_clean();
		    }
		}

		public function sentmail($output) {

			require_once('../../lib/PHPmailer/PHPMailerAutoload.php');
			$mail = new PHPMailer(true);                              // Passing `true` enables exception

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
			);   
			                         // Enable SMTP authentication
			$mail->Username = 'technex@stvincentngp.edu.in';                 // SMTP username
			$mail->Password = 'technex@19';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('technex@stvincentngp.edu.in', 'Sender');
			$mail->addAddress('nayanagrawal79@gmail.com', 'Reciever1');     // Add a recipient
			$mail->addAddress('rutujachich11@gmail.com', 'Reciever2');
			$mail->addAddress('technexofficial@gmail.com', 'Reciever3');

			$mail->addReplyTo('no-reply@stvincentngp.edu.in', 'Information');
			$mail->addCC('technex2k20@stvincentngp.edu.in');

			//Attachments
			$mail->addStringAttachment($output, "Technex'20 Database backup.sql");         // Add attachments
			
			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = "TECHNEX'20 Database Backup ";
			$mail->Body    = "File Database Backup ".Date('Y-m-d')." ".Date('H:i:sa');
			
			if (!$mail->send()) {
				echo "failed";
				echo "<script type='text/javascript'>location.href='../pages/backup.php';</script>";
			} else {
				echo "<script type='text/javascript'>location.href='../pages/backup.php';</script>";
			}
		}

	}

  	$backup = new Backup();

	if (isset($_POST['table'])) {
		$backup->backupData();
	}
 ?>