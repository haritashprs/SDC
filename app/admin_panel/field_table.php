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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link  "  href="dashboard_stats.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
         
        </li>
        
        
          <li class="nav-item active " data-toggle="tooltip" data-placement="right" title="Registrations">
            <a class="nav-link "  href="field_table.php" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">All Users</span>
            </a>
            
          </li>

          <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Applications">
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
    
  <!-- This Page  -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Users</a>
        </li>
        <li class="breadcrumb-item active">All Users</li>
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
                  <th>Index No.</th>
                  <th>Phone No.</th>
                  <th>Category</th>
                  <th>Subscription</th>
                  <th>Document</th>
                  <th> (Update or Delete)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Obama</td>
                  <td>9158755311</td>
                  <td>Plumber</td>
                  <td>for 1 year</td>
                  <td>View Document</td>
                  <td><button type="button" class="btn m-1 btn-success">Update</button> <button type="button" class="btn m-1 btn-danger">Delete</button></td></td>
                </tr>
                <tr>
                  <td>Elon</td>
                  <td>9897155445</td>
                  <td>Plumber</td>
                  <td>for 1 month</td>
                  <td>View Document</td>
                  <td><button type="button" class="btn m-1 btn-success">Update</button> <button type="button" class="btn m-1 btn-danger">Delete</button></td></td>
                </tr>
                <tr>
                  <td>Steve</td>
                  <td>8883439384</td>
                  <td>Plumber</td>
                  <td>for 6 month</td>
                  <td>View Document</td>
                  <td><button type="button" class="btn m-1 btn-success">Update</button> <button type="button" class="btn m-1 btn-danger">Delete</button></td></td>
                </tr>
                </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>REPAIR भारत | ADMIN PANEL SYSTEM</small>
        </div>
      </div>
    </footer>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="assets/js/sb-admin.min.js"></script>
  <script src="assets/js/sb-admin-datatables.min.js"></script>
  <script src="assets/js/table2excel.js"></script>


</body>
</html>