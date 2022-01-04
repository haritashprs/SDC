<?php 
	
	require_once "../../classes/security.class.php";
	require_once "../../config/config.con.php";

	Class Sponsors extends Dbh {

		public function insertData($data) {
			$sql = "INSERT INTO sponsors (";
			$sql .= implode(",", array_keys($data)).") VALUES (?,?,?,?)";
			$stmt = $this->connect()->prepare($sql);

			$stmt->bindParam(1, $data['name'], PDO::PARAM_STR);
			$stmt->bindParam(2, $data['type'], PDO::PARAM_STR);
			$stmt->bindParam(3, $data['image'], PDO::PARAM_LOB);
			$stmt->bindParam(4, $data['slink'], PDO::PARAM_STR);

			if ($stmt->execute()) {
				$_SESSION['message'] = "File uploaded successfully!";
				header("location: ../pages/sponsors");
			} else {
				$_SESSION['message'] = "OOPS!! An error occurred. Please try again!!";
				header("location: ../pages/sponsors");
			}
		}

		public function deleteData($data) {
			$sql = "DELETE FROM sponsors WHERE id=?";
			$stmt = $this->connect()->prepare($sql);

			if ($stmt->execute([$data])) {
				$_SESSION['message'] = "Entry deleted!";
				header("location: ../pages/sponsors");
			} else {
				$_SESSION['message'] = "An error occurred!";
				header("location: ../pages/sponsors");
			}
		}

	}

	$sponsor = new Sponsors();

	if (isset($_POST['submit'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (csrf()) {
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$name = htmlspecialchars($_POST['name']);
					$type = htmlspecialchars($_POST['type']);
					$slink = htmlspecialchars($_POST['slink']);
					$image = fopen($_FILES['image']['tmp_name'], 'rb'); // read binary file and store

					$data = [
						'name' => $name,
						'type' => $type,
						'image' => $image,
						'slink' => $slink
					];
					$sponsor->insertData($data);
				}
			}
		}
	}

	if (isset($_GET['delete'])) {
		$sponsor->deleteData($_GET['delete']);
	}

 ?>