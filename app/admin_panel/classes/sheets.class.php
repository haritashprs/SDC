<?php 
  session_start();
  require_once "../../config/config.con.php";

  if (!isset($_SESSION['uname'])) {
    header('location: login');
    exit();
  }
  
  Class Dashboard extends Dbh {
    
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
            <td>
              <a href="">
                <button type="button" class="btn btn-success btn-block">Export</button>
              </a>
            </td>
          </tr>
        <?php }
      }
    } 
  }
  
  $dash = new Dashboard();
?>