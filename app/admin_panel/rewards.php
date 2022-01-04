<?php

session_start();

if(!isset($_SESSION['user']))
{
    header('location:../../pages/logout.php');
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ADMIN</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index">Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link  "  href="dashboard_stats.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>       
        </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registrations">
            <a class="nav-link "  href="field_table.php" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">All Users</span>
            </a>
          </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Applications">
              <a class="nav-link" href="applications.php" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-check-square-o"></i>
                <span class="nav-link-text">Applications</span>
              </a>
            </li>
          
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transactions">
              <a class="nav-link" href="trans.php" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-inr"></i>
                <span class="nav-link-text">Transactions</span>
              </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sponsors">
                <a class="nav-link" href="sponsors.php"data-parent="#exampleAccordion"   >
                <i class="fa fa-fw fa-users"></i>
                <span class="nav-link-text">Sponsors</span>
              </a>
            </li>


            <li class="nav-item  active" data-toggle="tooltip" data-placement="right" title="Sponsors">
                <a class="nav-link" href="sponsors.php"data-parent="#exampleAccordion"   >
                <i class="fa fa-fw fa-gift"></i>
                <span class="nav-link-text">Rewards</span>
              </a>
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Backup">
                <a class="nav-link" href="new_category.php">
                <i class="fa fa-fw fa-plus"></i>
                <span class="nav-link-text">Add New Category</span>
              </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Backup">
                <a class="nav-link" href="cha_sub_amt.php">
                <i class="fa fa-fw fa-pencil-square-o"></i>
                <span class="nav-link-text">Subscription Amount</span>
              </a>
            </li>
      </ul>
      
      <ul class="navbar-nav ml-auto">
       
          <li class="nav-item">
            <a class="nav-link" href="profile">
              <i class="fa fa-fw fa-user"></i>Profile
            </a>
          </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../../pages/logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navigation end -->
  <!-- This Page  -->
  
<form method="POST">
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">All Rewards</a>
        </li>
        <li class="breadcrumb-item active">Your Rewards</li>
      </ol>
      <!-- Icon Cards-->

      <div class="md-5">
            <h4 class="m-2 text-center">
              Rewards
            </h4>
            <div class="row mx-5 col-11 d-flex justify-content-between">
              <div class="float-left"><input type="number" step=10 name='points' class="m-2" placeholder="Enter Points" required></input>
              <button type="submit" name="submit" class="btn btn-success m-2">Update Points</button></div>
              
              <div class="card float-right">
                <div><h5 class="p-3">Current Points</h5></div>
                <div>
                  <?php
                     include 'config.php';
                     $a = "SELECT r_point from rewards where id=1";
                     $q = mysqli_query($connection,$a);
                     echo "<h6 class='text-center'>".mysqli_fetch_assoc($q)['r_point']."</h6>";
                     
                  ?>
                
                </div>
              </div>
            </div>
          </div>
      </div>
      <hr>
      <div class="table-responsive p-2">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
              <thead class="table-dark">
                <tr>
                  <th>Name</th>
                  <th>Phone No.</th>
                  <th>Reward Points</th>
                  <th>Reset</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'config.php';
                  $q = "SELECT * FROM technician_data";
                  $query = mysqli_query($connection, $q);
                  $num = mysqli_num_rows($query);
                  if($num>0) {
                    while ($row = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </td>
                  <td><?php echo $row['number1']; ?></td>
                  <td><?php echo $row['rewards']; ?></td>
                  <td><button type="button"  id="<?php echo $row['number1']; ?>" onclick="Reset(this.id);" class="btn m-1 btn-success">Reset</button> </td>
                <?php }} ?>
                </tr>
                </tbody>
            </table>
          </div>
  </div>
  <?php
        
        if (isset($_POST['submit'])) {
          $point = $_POST['points'];
          $qa = "UPDATE rewards SET r_point=$point WHERE id=1";
          $query = mysqli_query($connection,$qa);
        }
      ?>
</div>


</form>
      <!-- Example DataTables Card-->

    
    <!-- footer -->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>REPAIR भारत | ADMIN PANEL SYSTEM</small>
        </div>
      </div>
    </footer>
    <!-- footer end -->
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="assets/js/sb-admin.min.js"></script>
  <script src="assets/js/sb-admin-datatables.min.js"></script>
  <script src="assets/js/table2excel.js"></script>
  <script>
    function refreshPage() {
                if (confirm("Are you sure, want to Reset?")) {
                    location.reload();
                }
    }
    function Reset(id){
      $.post("ajax.php",{Reset:'Reset', id:id}, function (response){
      });
      refreshPage();
    }
  </script>
  
</body>
</html>