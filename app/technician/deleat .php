<?php
  session_start();
  if(!isset($_SESSION['userid']))
  {
    header('location:../../index.php');
  }

?>

<?php



include '../admin_panel/cat_connection.php';

$ids = $_GET['ids'];

$deleatequery = " delete from technician_data where number1=$ids";

$dquery = mysqli_query($check,$deleatequery);
?>
<?php
if($dquery){
    ?>
<script>
    location.replace("app/technician/dashboard.php");
    </script>
<?php
}
?>