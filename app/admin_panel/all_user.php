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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
          <a class="nav-link " href="dashboard_stats.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
         
        </li>
        
        
          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Registrations">
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

    <!-- This Page  -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a style="text-decoration:none;"href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">All Statistics</li>
            </ol>

            <main>

                

                <div class="container d-flex justify-content-center my-4 mt">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Select Your required field from here</option>
                            <option value="1">Plumber</option>
                            <option value="2">Carpainter</option>
                            <option value="3">Electricain</option>
                        </select>
                        <label for="floatingSelect">Select Technician Type</label>
                    </div>

                </div>



        </div>
        
        <div class="container d-flex justify-content-center my-4">
        <a href="field_table.php">
            <button type="button" class="btn btn-outline-success fs-3">Select</button>
            </a>
        </div>
        






        </main>





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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


   

</body>

</html>