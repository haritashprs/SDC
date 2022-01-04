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
<style type="text/css">
  
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
      Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  }
  
  
  /* HEADING */
  
  .heading {
    text-align: center;
  }
  
  .heading__title {
    font-weight: 600;
  }
  
  .heading__credits {
    margin: 10px 0px;
    color: #888888;
    font-size: 25px;
    transition: all 0.5s;
  }
  
  .heading__link {
    text-decoration: none;
  }
  
  .heading__credits .heading__link {
    color: inherit;
  }
  
  /* CARDS */
  
  .cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  
  .card {
    margin: 20px;
    padding: 20px;
    width: 500px;
    min-height: 100px;
    display: grid;
    grid-template-rows: 20px 50px 1fr 50px;
    border-radius: 10px;
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
    transition: all 0.2s;
  }
  
  .card:hover {
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
    transform: scale(1.01);
  }
  
  .card__link,
  .card__exit,
  .card__icon {
    position: relative;
    text-decoration: none;
    color: rgba(255, 255, 255, 0.9);
  }
  
  .card__link::after {
    position: absolute;
    top: 25px;
    left: 0;
    content: "";
    width: 0%;
    height: 3px;
    background-color: rgba(255, 255, 255, 0.6);
    transition: all 0.5s;
  }
  
  .card__link:hover::after {
    width: 100%;
  }
  
  .card__exit {
    grid-row: 1/2;
    justify-self: end;
  }
  
  .card__icon {
    grid-row: 2/3;
    font-size: 30px;
  }
  
  .card__title {
    grid-row: 3/4;
    font-weight: 800;
    color: #ffffff;
  }
  
  .card__apply {
    grid-row: 4/5;
    align-self: center;
  }
  
  /* CARD BACKGROUNDS */
  
  .card-1 {
    background-color: #f20505;
  }
  
  .card-2 {
    background-color: #47665c;
  }
  
  .card-3 {
    background-color: #2e28a6;
  }
  
  .card-4 {
    background-color: #ed480c;
  }
  
  /* RESPONSIVE */
  
  @media (max-width: 1600px) {
    .cards {
      justify-content: center;
    }
  }
  

</style>
<body class="fixed-nav sticky-footer bg-dark" id="page-top" >
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Welcome  <?php echo $_SESSION['username']." ".$_SESSION['lastname']; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Sponsors">
                <a class="nav-link" href="index.php"data-parent="#exampleAccordion"   >
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
          </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sponsors">
                <a class="nav-link " href="profile1.php"data-parent="#exampleAccordion"   >
                <i class="fa fa-fw fa-users"></i>
                <span class="nav-link-text">Profile Update</span>
              </a>
          </li>


          
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="More Information">
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

<!-- navigation end -->
  <!-- This Page  -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All Statistics</li>
      </ol>
      
      <div class="main-container">
    <!-- card start-->
        </div>
        <div class="cards">
          <div class="card card-1">
            <div class="card__icon"><i class="fas fa-bolt"></i></div>
            <p class="card__exit"><i class="fas fa-times"></i></p>
            <h2 class="card__title">Subsciption Days left</h2>
            <p class="card__apply">
              <a class="card__link" href="#"><?php echo $_SESSION['timer'];?><i class="fas fa-arrow-right"></i></a>
            </p>
          </div>
          <div class="card card-2">
            <div class="card__icon"><i class="fas fa-bolt"></i></div>
            <p class="card__exit"><i class="fas fa-times"></i></p>
            <h2 class="card__title">Last Transaction Date</h2>
            <p class="card__apply">
              <a class="card__link" href="transaction.php"><?php echo $_SESSION['subdate'];?></a> <i class="fas fa-arrow-right"></i></a>
            </p>
          </div>
          <div class="card card-3">
            <div class="card__icon"><i class="fas fa-bolt"></i></div>
            <p class="card__exit"><i class="fas fa-times"></i></p>
            <h2 class="card__title">Availability</h2>
            <p class="card__apply">
              <button type="button" class="btn btn-success">Available</button>
              <button type="button" class="btn btn-danger">Not Available</button>
            </p>
          </div>
          <div class="card card-4">
            <div class="card__icon"><i class="fas fa-bolt"></i></div>
            <p class="card__exit"><i class="fas fa-times"></i></p>
            <h2 class="card__title">Rewards</h2>
            <p class="card__apply">
              <a class="card__link" href="#"><?php echo $_SESSION['rewards'];?><i class="fas fa-arrow-right"></i></a>
            </p>
          </div>          
        </div>
      </div>  
  <!-- card end-->
  <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>REPAIR भारत | TECHNICIAN PANEL SYSTEM</small>
        </div>
      </div>
    </footer>
</div>

 <!-- javascript start-->
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