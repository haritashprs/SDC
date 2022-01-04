<?php 
  session_start();
  require_once "../../config/config.con.php";

  if (!isset($_SESSION['uname'])) {
    header('location: login');
    exit();
  }
  
  Class Dashboard extends Dbh {
    
    public function totalReg() {
      $sql = "SELECT COUNT(*) as 'count' FROM registration WHERE status=? AND registration=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S', 'Online'])) {
        $row = $stmt->fetch();
        echo $row['count'];
      }
    }

    public function totalAmount() {
      $sql = "SELECT SUM(amount) as 'total_amount' FROM registration WHERE status=? AND registration=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S', 'Online'])) {
        $row = $stmt->fetch();
        echo $row['total_amount'];
      }
    }
    
    public function totalBalAmount() {
      $sql = "SELECT SUM(bal_amount) as 'total_bal_amount' FROM registration WHERE status=? AND registration=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S', 'Online'])) {
        $row = $stmt->fetch();
        echo $row['total_bal_amount'];
      }
    }

    public function totalPartialAmount() {
      $sql = "SELECT SUM(partial_amount) as 'total_par_amount' FROM registration WHERE status=? AND registration=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S', 'Online'])) {
        $row = $stmt->fetch();
        echo $row['total_par_amount'];
      }
    }

    public function totalHeadCount() {
      $sql = "SELECT SUM(no_members) as 'total_head_count' FROM registration WHERE status=? AND registration=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S', 'Online'])) {
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

    public function eventDetails($event) {
      $sql= "SELECT event, COUNT(event) AS 'total_reg', SUM(amount) AS 'total_amt', SUM(bal_amount) AS 'bal_amt', SUM(partial_amount) AS 'paid_amt', SUM(no_members) AS 'members' FROM registration WHERE status=? AND event=? AND registration=?";
      $stmt = $this->connect()->prepare($sql);
      if ($stmt->execute(['S', $event, 'Online'])) {
        $row = $stmt->fetch();
        if ($row['event'] != NULL) { ?>
          <tr>
            <td><?php echo $row['event']; ?></td>
            <td><?php echo $row['total_reg']; ?></td>
            <td><?php echo $row['total_amt'] ?></td>
            <td><?php echo $row['bal_amt']; ?></td>
            <td><?php echo $row['paid_amt']; ?></td>
            <td><?php echo $row['members'] ?></td>
          </tr>
        <?php }
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
?>