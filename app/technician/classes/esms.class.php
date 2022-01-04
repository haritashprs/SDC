<?php 
	
	require_once "../../config/config.con.php";

	Class Esms extends Dbh {
	  
		public function insert($data) {
			$sql = "INSERT INTO esms (";
			$sql .= implode(",", array_keys($data)).") VALUES (?)";
			$stmt = $this->connect()->prepare($sql);

			$stmt->bindParam(1, $data['contact_no'], PDO::PARAM_STR);

			if ($stmt->execute()) {
				$this->send($data);
			} else {
				return false;
			}
		}

		public function send($data) {
			$returl = "https://www.pallottine-technex.com/app/registration/pages/esms.php";

			$contact_no = $data['contact_no']; ?>

			<!DOCTYPE html>
			<html>
			<head>
			    <title></title>
			</head>
			    <body style="background-color: black;">
			        <form action="http://epay.stvincentngp.edu.in/sendsms.ashx" method="post" id="form1">
			            <input name="mobileno" type="hidden" value="<?php echo $contact_no; ?>" />
			            <input type="hidden" name="msg" value="https://qrgo.page.link/yjSUX" />
			            <input type="hidden" name="returl" value="<?php echo $returl; ?>" />
			            <input id="Submit1" type="submit" value="submit" style="display: none;" />
			        </form>
			    </body>
			</html>

			<script type="text/javascript">
			    setTimeout(function() {
			        Submit1.click();
			    },500);
			</script>
		<?php }
	}

  	$esms = new Esms();

	if (isset($_POST['send'])) {
		$data = [
			'contact_no' => $_POST['contact_no']
		];
		$esms->insert($data);
	}

 ?>