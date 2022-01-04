<?php 
  session_start();
  require_once "../../config/config.con.php";

  if (!isset($_SESSION['uname'])) {
    header('location: login');
    exit();
  }
  
  Class Registrations extends Dbh {

    public function deleteOn($uid) {
      $sql = "DELETE FROM registration WHERE uid=?";
      $stmt = $this->connect()->prepare($sql);

      if ($stmt->execute([$uid])) {
        echo "<script type='text/javascript'> location.href='../pages/on_reg.php'; </script>";
      } else {
        echo "<script type='text/javascript'> location.href='../pages/on_reg.php'; </script>";
      }
    }

    public function deleteOff($uid) {
      $sql = "DELETE FROM registration WHERE uid=?";
      $stmt = $this->connect()->prepare($sql);

      if ($stmt->execute([$uid])) {
        echo "<script type='text/javascript'> location.href='../pages/on_reg.php'; </script>";
      } else {
        echo "<script type='text/javascript'> location.href='../pages/on_reg.php'; </script>";
      }
    }
    
  }
  
  $reg = new Registrations();
  
  if (!empty($_POST['participantsData'])) {
    $reg->participantDetails();
  }

  if (isset($_GET['delete'])) {
    if (isset($_GET['reg'])) {
      if ($_GET['reg'] == 'N') {
        $reg->deleteOn($_GET['delete']);
      } else if ($_GET['reg'] == 'F') {
        $reg->deleteOff($_GET['delete']);
      } else {
        header("location: ../pages/reg_tracker.php");
      }
    } else {
      header("location: ../pages/reg_tracker.php"); 
    }
    
  }
?>
