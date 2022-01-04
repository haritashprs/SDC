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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <style>
    .l span {
        cursor: pointer;
    }
    </style>
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


                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sponsors">
                    <a class="nav-link" href="sponsors.php" data-parent="#exampleAccordion">
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

                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Backup">
                    <a class="nav-link" href="#">
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


    <!-- Button trigger modal -->


    <!-- Modal -->



    <!-- This Page  -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Add New Category</a>
                </li>
                <li class="breadcrumb-item active">New Category</li>
            </ol>
            <!-- Icon Cards-->







            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Total Categories
                </div>
                <button type="submit" class="btn btn-success m-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">+ Add
                    Category</button>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class=" table-dark">
                            <tr>
                                <th class="text-center">Index No.</th>
                                <th class="text-center">Category</th>

                                <th class="text-center">Remove</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php

                                include 'cat_connection.php';

                                    $select = " select * from skill_table ";

                                    $selectquery = mysqli_query($check,$select);

                                    $result = mysqli_fetch_array($selectquery);


                                    while($result = mysqli_fetch_array($selectquery))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $result['Index_Id']?></td>
                                <td><?php echo $result['Skill_Name']?></td>

                                <td> <a href="deleatdata.php?id=<?php echo $result['Index_Id']?>"><button
                                            class="btn m-1 btn-danger">Delete</button></a></td>
                            </tr>
                            <?php
                                    }
                             ?>






                        </tbody>
                    </table>
                </div>
                <!-- <div class="col-md-5">
                    <form method="POST">
                        <input type="text" class="m-2" placeholder="Category Name"></input> 
                        <div class="mb-3 row">

                            <div class="col-sm-10 d-flex justify-content-end">
                                <input type="text" class="form-control" id="inputPassword" name="newname">

                                <button type="submit" class="btn btn-success m-2" name="submit">+ Add
                                    Category</button>

                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>

    </div>

    <!-- model for add catyegory -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <!-- <input type="text" class="m-2" placeholder="Category Name"></input> -->
                        <div class="mb-3 row">

                            <div class="col-sm-12 d-flex justify-content-end">
                                <input type="text" class="form-control" id="inputPassword" name="newname">

                                <button type="submit" class="btn btn-success m-2" name="submit">+ Add
                                    Category</button>

                            </div>
                        </div>

                    </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="assets/js/sb-admin.min.js"></script>
    <script src="assets/js/sb-admin-datatables.min.js"></script>
    <script src="assets/js/table2excel.js"></script>


    <script>
    // Create a "close" button and append it to each list item
    var myNodelist = document.getElementsByClassName("l");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        myNodelist[i].appendChild(span);
    }

    // Click on a close button to hide the current list item
    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }


    // Create a new list item when clicking on the "Add" button
    function newElement() {
        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var t = document.createTextNode(inputValue);
        li.appendChild(t);
        if (inputValue === '') {
            alert("You must write something!");
        } else {
            document.getElementById("myUL").appendChild(li);
        }
        document.getElementById("myInput").value = "";

        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);
        li.className = "l m-2";

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }
    }
    </script>

</body>

</html>

<?php

include 'cat_connection.php';

if(isset($_POST['submit']))
{
    $newcat = $_POST['newname'];

    $insertquery121 = " insert into skill_table(Skill_Name) values('$newcat')";

    $rescheck = mysqli_query($check,$insertquery121);
}
?>