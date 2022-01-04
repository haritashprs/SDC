<?php 
	
	require_once "../../config/config.con.php";
	require_once "../../classes/security.class.php";

	Class Login extends Dbh {

		public function validate($credential) {
			$sql = "SELECT * FROM admin WHERE uname=? AND password=?";
			$stmt = $this->connect()->prepare($sql);
			if($stmt->execute([$credential['uname'], $credential['password']])) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($row != '') {
					$_SESSION['uname'] = $row['designation'];
					$_SESSION['username'] = $credential['uname'];
					header('location: ../index');
				} else {
					$_SESSION['message'] = "OOPS!! Please enter correct credentials.";
					header('location: ../login');
				}
			} else {
				$_SESSION['message'] = "OOPS!! An error occurred during registration.";
				header('location: ../login');
			}
		}

		public function changePassword($data) {
			$sql = "UPDATE admin SET password=? WHERE uname=?";
			$stmt = $this->connect()->prepare($sql);

			if ($stmt->execute([$data['cpassword'], $data['uname']])) {
				$_SESSION['message'] = "Password Updated successfully!";
				header("location: ../pages/profile.php");
			} else {
				$_SESSION['message'] = "OOPPPS!! An error occurred, please try again later!";
				header("location: ../pages/profile.php");
			}
		}
	}

	$login = new Login();

	if (isset($_POST['login'])) {

		if($_SERVER['REQUEST_METHOD']=='POST'){

		 	if (csrf()) {
		 		$uname = htmlspecialchars($_POST['uname']);
		 		$password = htmlspecialchars($_POST['password']);

		 		$credential = [
		 			'uname'=> $uname,
		 			'password'=> $password
		 		];
		 		
		 		$login->validate($credential);
		 	}
		}
	}

	if (isset($_POST['data'])) {
		$login->changePassword($_POST['data']);
	}

 ?>