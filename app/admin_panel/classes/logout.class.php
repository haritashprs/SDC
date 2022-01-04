<?php 
	session_start();
	if (isset($_SESSION['uname'])) {
		unset($_SESSION['uname']);
		$_SESSION['message'] = "Logout successfully!";
		header("Location: ../login");
	} else {
		header("Location: ../login");
	}
	
 ?>