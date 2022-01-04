<?php 
  session_start();
  require_once "../../config/config.con.php";

  if (!isset($_SESSION['uname'])) {
    header('location: login');
    exit();
  }
  
  Class Ambassador extends Dbh {
    
    public function totalAmb() {
      $sql = "SELECT COUNT(*) as 'count' FROM ambassador";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute()) {
        $row = $stmt->fetch();
        echo $row['count'];
      }
    }
  }

  $amb = new Ambassador();
  
  if (!empty($_POST['totalAmbassadors'])) {
    $amb->totalAmb();
  }  
?>
