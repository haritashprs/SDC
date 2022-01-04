<?php 
	
	require_once "../../config/config.con.php";

	Class Psms extends Dbh {
	  
		public function saveTemplate($data) {
			$sql = "INSERT INTO pmail (";
			$sql .= implode(",", array_keys($data)).") VALUES (?,?)";
			$stmt = $this->connect()->prepare($sql);

			$stmt->bindParam(1, $data['title'], PDO::PARAM_STR);
			$stmt->bindParam(2, $data['message'], PDO::PARAM_STR);

			if ($stmt->execute()) {
				echo "Template Saved successfully!";
			} else {
				echo "An error occurred!!";
			}
		}

		public function contacts() {
			$sql = "SELECT contacts FROM pcontacts";
			$stmt = $this->connect()->prepare($sql);

			if ($stmt->execute()) {
				$contacts = '';
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					foreach ($row as $value) {
						$contacts .= $value.",";
					}
				}
				echo $contacts;
			}
		}

		public function deleteData($id) {
			$sql = "DELETE FROM psms WHERE id=?";
			$stmt = $this->connect()->prepare($sql);

			if ($stmt->execute([$id])) {
				header('location: ../pages/psms.php');
			} else {
				header('location: ../pages/psms.php');
			}
		}

		public function fetchData($id) {
			$sql = "SELECT * FROM psms WHERE id=?";
			$stmt = $this->connect()->prepare($sql);

			if ($stmt->execute([$id])) {
				$result = $stmt->fetch();
				$returl = "http://www.pallottine-technex.com";

				$msg = $result['message']; ?>

				<!DOCTYPE html>
				<html>
				<head>
				    <title></title>
				</head>
				    <body style="background-color: black;">
				        <form action="http://epay.stvincentngp.edu.in/sendsms.ashx" method="post" id="form1">
				            <input name="mobileno" type="hidden" value="<?php $this->contacts(); ?>" />
				            <input type="hidden" name="msg" value="<?php echo $msg; ?>" />
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
	}

  	$psms = new Psms();

	if (isset($_POST['data'])) {
		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			$image = fopen($_FILES['image']['tmp_name'], 'rb'); // read binary file and store

			$data = [
				'name' => $name,
				'type' => $type,
				'image' => $image,
				'slink' => $slink
			];
	
			$psms->saveTemplate($_POST['data']);
		}
	}

	if (isset($_GET['send'])) {
		$psms->fetchData($_GET['send']);
	}

	if (isset($_GET['delete'])) {
		$psms->deleteData($_GET['delete']);
	}
 ?>