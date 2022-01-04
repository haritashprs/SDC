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

            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Applications">
              <a class="nav-link" href="#" data-parent="#exampleAccordion">
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


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sponsors">
                <a class="nav-link" href="rewards.php"data-parent="#exampleAccordion"   >
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

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Application Received</a>
        </li>
        <li class="breadcrumb-item active">All Applications</li>
      </ol>
      <!-- Icon Cards-->
      
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Technician Overview Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
              <thead class="table-dark">
                <tr>
                  <th>Name</th>
                  <th>Phone No.</th>
                  <th>Profile Photo</th>
                  <th>Id Proof</th>
                  <th>Document</th>
                  <th>Approve/Decline</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'config.php';
                  $q = "SELECT * FROM technician_data WHERE account_status='pending'";
                  $query = mysqli_query($connection, $q);
                  $num = mysqli_num_rows($query);
                  if($num>0) {
                    while ($row = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </td>
                  <td><?php echo $row['number1']; ?></td>
                  <td><button type="button" class="btn btn-info" data-toggle="modal" id="<?php echo $row['number1']; ?>" onclick="showpopup(this.id);" data-target="#exampleModal1">View Profile</button></td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" id="<?php echo $row['number1']; ?>" onclick="showid(this.id);"  data-target="#exampleModal2">View Id</button></td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" id="<?php echo $row['number1']; ?>" onclick="showdocument(this.id);" data-target="#exampleModal3">View Document</button></td>
                  <td><button type="button"  id="<?php echo $row['number1']; ?>" onclick="idSubmit(this.id);" class="btn m-1 btn-success">Approve</button> <button type="button" id="<?php echo $row['number1']; ?>" onclick="idDecline(this.id);" class="btn m-1 btn-danger">Decline</button></td></td>
                <?php }} ?>
                </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id='image'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
  </div>
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">ID</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id='image1'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
  </div>
  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Document</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id='document'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
  </div>
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
    function showpopup(id){
            $.post("ajax.php",{getid:'getid', id:id}, function (response){
            var dat = response.split('^');
            $("#image").html(dat[0]);
      });
    }
    function showid(id){
            $.post("ajax.php",{getidproof:'getidproof', id:id}, function (response){
            var dat = response.split('^');
            $("#image1").html(dat[0]);
        });
      }
    function showdocument(id){
            $.post("ajax.php",{getdocument:'getdocument', id:id}, function (response){
            var dat = response.split('^');
            $("#document").html(dat[0]);
      });
    }
    function idSubmit(id){
          $.post("ajax.php",{getbtnid:'getbtnid', id:id}, function (response){
          });
          refreshPage();
    }
    function refreshPage() {
                if (confirm("Are you sure, want to refresh?")) {
                    location.reload();
                }
            }
    function idDecline(id){
          $.post("ajax.php",{getdecline:'getdecline', id:id}, function (response){
          });
          refreshPage();
    }
  </script>
  
</body>
</html>