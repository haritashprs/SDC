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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link  " href="dashboard_stats.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registrations">
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

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Backup">
                    <a class="nav-link" href="new_category.php">
                        <i class="fa fa-fw fa-plus"></i>
                        <span class="nav-link-text">Add New Category</span>
                    </a>
                </li>

                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Backup">
                    <a class="nav-link" href="#">
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

    <!-- Navigation End  -->

    <!-- This Page  -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a style="text-decoration:none;" href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Subscription</li>
            </ol>

            <main>
                <!-- Icon Cards-->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Subscription Amount</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Enter New Amount</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Rs."
                                        value="" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Update & Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All Subscription Amount
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Index No.</th>
                                        <th>Subscription Plan's</th>
                                        <th>Amount</th>
                                        <th>Total Users</th>
                                        <th>Total Amount</th>
                                        <th> (Update or Delete)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1 Year</td>
                                        <td>5,800/-</td>
                                        <td>89564 user</td>
                                        <td>519,471,200/-</td>
                                        <td><button type="button" class="btn m-1 btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button>
                                            <button type="button" class="btn m-1  btn-danger">Delete</button>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>6 Months</td>
                                        <td>3,212/-</td>
                                        <td>96584 user</td>
                                        <td>310,227,808/-</td>
                                        <td><button type="button" class="btn m-1  btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button>
                                            <button type="button" class="btn m-1  btn-danger">Delete</button>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>3 Months</td>
                                        <td>1,524/-</td>
                                        <td>220548 user</td>
                                        <td>336,115,152/-</td>
                                        <td><button type="button" class="btn m-1 btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button>
                                            <button type="button" class="btn m-1 btn-danger">Delete</button>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>1 Month</td>
                                        <td>524/-</td>
                                        <td>220548 user</td>
                                        <td>5,115,152/-</td>
                                        <td><button type="button" class="btn m-1 btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button>
                                            <button type="button" class="btn m-1 btn-danger">Delete</button>
                                        </td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        </main>
        <!--Footer-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>REPAIR भारत | ADMIN PANEL SYSTEM</small>
                </div>
            </div>
        </footer>
        <!--Foooter end-->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>