<?php 
	
	require_once "../../config/config.con.php";

	Class Repay extends Dbh {

		public function fetchData($data) {

			$sql = "SELECT * FROM registration WHERE uid=?";
			$stmt = $this->connect()->prepare($sql);
			$users = $stmt->execute([$data['uid']]);

			while ($row = $stmt->fetch()) {
				return $row;
			}

		}

		public function updateAmount($data) {
			$pay = $data['bal_amount'];
			$data['partial_amount'] = (int)((int)$data['partial_amount'] + (int)$data['bal_amount']);
			$data['bal_amount'] = (int)((int)$data['amount'] - ((int)$data['partial_amount']));
			$sql = "UPDATE registration SET bal_amount=?, partial_amount=? WHERE uid=?";
			$stmt = $this->connect()->prepare($sql);
			$check = $stmt->execute([$data['bal_amount'], $data['partial_amount'], $data['uid']]);
			header("location: ../../register/pages/success.php?uid=SVPCLIV".$data['uid']."TX&status=S");
		}
	}

	$repay = new Repay();

	if (isset($_GET['pay'])) {
		$uid = htmlspecialchars($_GET['pay']);

		$data = [
			'uid'=> $uid
		];
		$value = $repay->fetchData($data);
		$repay->updateAmount($value);
		
	}
 ?>