<?php 
  session_start();
  require_once "../../config/config.con.php";

  if (!isset($_SESSION['uname'])) {
    header('location: login');
    exit();
  }
  
  Class Dashboard extends Dbh {
    
    public function totalReg() {
      $sql = "SELECT COUNT(*) as 'count' FROM registration WHERE status=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S'])) {
        $row = $stmt->fetch();
        echo $row['count'];
      }
    }

    public function totalAmount() {
      $sql = "SELECT SUM(amount) as 'total_amount' FROM registration WHERE status=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S'])) {
        $row = $stmt->fetch();
        echo $row['total_amount'];
      }
    }
    
    public function totalBalAmount() {
      $sql = "SELECT SUM(bal_amount) as 'total_bal_amount' FROM registration WHERE status=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S'])) {
        $row = $stmt->fetch();
        echo $row['total_bal_amount'];
      }
    }

    public function totalPartialAmount() {
      $sql = "SELECT SUM(partial_amount) as 'total_par_amount' FROM registration WHERE status=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S'])) {
        $row = $stmt->fetch();
        echo $row['total_par_amount'];
      }
    }

    public function totalHeadCount() {
      $sql = "SELECT SUM(no_members) as 'total_head_count' FROM registration WHERE status=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S'])) {
        $row = $stmt->fetch();
        echo $row['total_head_count'];
      }
    }

    public function userLogins() {
      $sql = "SELECT COUNT(*) as 'login_count' FROM users";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute()) {
        $row = $stmt->fetch();
        echo $row['login_count'];
      }
    }

    public function totalAccomodations() {
      $sql = "SELECT COUNT(*) as 'totalAccomodations' FROM `registration` WHERE accomodation1=1 OR accomodation2=1 OR accomodation3=1 OR accomodation4=1 OR accomodation5=1 AND status='S'";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute()) {
        $row = $stmt->fetch();
        echo $row['totalAccomodations'];
      }
    }

    public function totalPickup() {
      $sql = "SELECT COUNT(*) as 'totalPickup' FROM `registration` WHERE pickup1=1 OR pickup2=1 OR pickup3=1 OR pickup4=1 OR pickup5=1 AND status='S'";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute()) {
        $row = $stmt->fetch();
        echo $row['totalPickup'];
      }
    }

    public function outreach() {
      $sql = "SELECT COUNT(*) as 'outreach' FROM `registration` WHERE status='S' AND city <> 'Nagpur' OR city <> 'nagpur'";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute()) {
        $row = $stmt->fetch();
        echo $row['outreach'];
      }
    }

  }
  
  $dash = new Dashboard();
  
  if (!empty($_POST['totalRegistrations'])) {
    $dash->totalReg();
  }  

  if (!empty($_POST['totalAmount'])) {
    $dash->totalAmount();
  }

  if (!empty($_POST['totalBalAmount'])) {
    $dash->totalBalAmount();
  }

  if (!empty($_POST['totalPartialAmount'])) {
    $dash->totalPartialAmount();
  }

  if (!empty($_POST['totalHeadCount'])) {
    $dash->totalHeadCount();
  }

  if (!empty($_POST['userLogins'])) {
    $dash->userLogins();
  }

  if (!empty($_POST['totalAccomodations'])) {
    $dash->totalAccomodations();
  }

  if (!empty($_POST['totalPickup'])) {
    $dash->totalPickup();
  }
  
  if (!empty($_POST['outreach'])) {
    $dash->outreach();
  }
?>