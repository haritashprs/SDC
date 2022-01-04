<?php
  session_start();
  if(!isset($_SESSION['userid']))
  {
    header('location:../../index.php');
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
  <title>Technician page</title>
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
    <a class="navbar-brand" href="index.php">Welcome  <?php echo $_SESSION['username']." ".$_SESSION['lastname']; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sponsors">
                <a class="nav-link" href="dashboard.php"data-parent="#exampleAccordion"   >
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
          </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sponsors">
                <a class="nav-link" href="profile1.php"data-parent="#exampleAccordion"   >
                <i class="fa fa-fw fa-users"></i>
                <span class="nav-link-text">Profile Update</span>
              </a>
          </li>
           <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="More Information">
            <a class="nav-link" href="transaction.php" data-parent="#exampleAccordion">
              <i class="fa fa-history"></i>
              <span class="nav-link-text">Transaction History</span>
            </a> 
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="More Information">
            <a class="nav-link" href="sub.php" data-parent="#exampleAccordion">
              <i class="fa fa-usd"></i>
              <span class="nav-link-text">Subscription</span>
            </a> 
          </li>
         
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Promotions">
            </li>
      </ul>
      
      <ul class="navbar-nav ml-auto">
       
       <li class="nav-item">
          <a class="nav-link" href="classes/logout.class.php">
            <i class="fa fa-bell"></i> Notification
          </a>
        </li> 

        <li class="nav-item">
          <a class="nav-link" href="logout.php">
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
          <a href="#">Transactions Records</a>
        </li>
        <li class="breadcrumb-item active">All Transactions</li>
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
                  <th>Phone No.</th>
                  <th>Transaction Id</th>
                  <th>Transaction Time</th>
                  <th>Paid Amount</th>
                  <th>Date</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>9876543212</td>
                  <td>CX3643738</td>
                  <td>10:31AM</td>
                  <td>Rs.599.0</td>
                  <td>12-3-2021</td>
                  
                </tr>
                <tr>
                  <td>7654927464</td>
                  <td>BS4838458</td>
                  <td> 11:30AM</td>
                  <td>Rs.899.0</td>
                  <td>12-3-2021</td>
                  
                </tr>
                </tbody>
            </table>
          <!--  
          </div>
          <div class="col-md-4">
            <button type="button" id="export" class="btn btn-success btn-block">Export to Excel</button>
          </div>-->
        </div>
      </div>
    </div>

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>REPAIR भारत | TECHNICIAN PANEL SYSTEM</small>
        </div>
      </div>
    </footer>
  </div>

  
    <!--javascript start-->
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