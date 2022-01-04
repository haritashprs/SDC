<?php

session_start();

if(!isset($_SESSION['user']))
{
    header('location:../../pages/logout.php');
}



?>
<?php

include 'cat_connection.php';

if(isset($_POST['submit']))
{
    
     $sname=$_POST['name'];
     $Image=$_FILES['image'];
     $weblink=$_POST['slink'];
     


       // for image
        $filename=$Image['name'];
        $filepath=$Image['tmp_name'];
        $fileerror=$Image['error'];


        if($fileerror==0){

            $destfile='upload/'.$filename;
            //echo "$destfile";
            move_uploaded_file($filepath,$destfile);
        }
           


            $sql="INSERT INTO sponsors (spname,logoimage,link) VALUES ('$sname','$destfile','$weblink')";
       
           if($check->query($sql)===TRUE)
           {
               echo "New record added";
           }
          
           else
          {
              echo "Not inserted";
          }
          
           
       
       
           
       
           $check->close();

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
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link  " href="dashboard_stats.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>

                </li>


                <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Registrations">
                    <a class="nav-link " href="field_table.php" data-parent="#exampleAccordion">
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


                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Sponsors">
                    <a class="nav-link" href="#" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Sponsors</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sponsors">
                    <a class="nav-link" href="rewards.php" data-parent="#exampleAccordion">
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
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Sponsors</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-id-badge"></i>
                    Sponsors Upload Form
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputName">Name of Sponsor</label>
                                    <input class="form-control" id="name" name="name" type="text"
                                        aria-describedby="nameHelp" placeholder="Name" autocomplete="off" required>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputName">Sponsors Logo <b>(height=225 pixel,width=100
                                            pixel)</b>
                                    </label>
                                    <input type="file" name="image" id="image" class="form-control"
                                        placeholder="height=20,Weight=30">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputLastName">Website Link</label>
                                    <input class="form-control" name="slink" id="slink" type="text"
                                        aria-describedby="nameHelp" placeholder="Website URL">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="_token" type="hidden" value="">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" name="submit" type="submit">Upload</button>
                    </form>
                </div>
            </div>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Sponsors Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sponsorer</th>
                                    <th>Website URL</th>
                                    <th>Image</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                    include 'cat_connection.php';

                                    $select = " select * from sponsors ";

                                    $selectquery = mysqli_query($check,$select);

                                    $resultspo = mysqli_fetch_array($selectquery);


                                    while($resultspo = mysqli_fetch_array($selectquery))
                                    {
                                ?>


                                <tr>
                                    <td><?php echo $resultspo['spname']?></td>
                                    <td><?php echo $resultspo['link']?></td>


                                    <td> <img src="<?php echo $resultspo['logoimage']?>" height="90" width="110" alt="">
                                    </td>
                                    <td><a href="deletespons.php?id=<?php echo $resultspo['id']?>"><button
                                                class="btn m-1 btn-danger">Delete</button></a>
                                    </td>
                                </tr>


                                <?php
                                    }
                                ?>
                            </tbody>

                        </table>
                    </div>
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