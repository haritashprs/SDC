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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

</head>
<style type="text/css">
.profile-pic-div {
    height: 170px;
    width: 230px;
    position: relative;
    top: 25%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    overflow: hidden;
    border: 1px solid grey;
}

#photo {
    height: 100%;
    width: 100%;
}

#file {
    display: none;
}

#uploadBtn {
    height: 40px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    color: wheat;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 15px;
    cursor: pointer;
    display: none;
}
</style>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.php">Welcome
            <?php echo $_SESSION['username']." ".$_SESSION['lastname']; ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sponsors">
                    <a class="nav-link" href="dashboard.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Sponsors">
                    <a class="nav-link " href="profile1.php" data-parent="#exampleAccordion">
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

    <!-- This Page  -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-id-badge"></i>
                    Technician Profile Page
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-row">
                <div class="container" style="margin-top: 10%;">

                </div>
            </div>
        </div>


        <div class="card-body">
            <form action="#" method="post" enctype="multipart/form-data">

                <?php
                  include 'db_connection.php';

                    $currentuser = $_SESSION['userid'];
                    $sql = " SELECT * FROM technician_data WHERE number1 = '$currentuser'"; 

                    $getresult = mysqli_query($check,$sql);

                    if($getresult)
                    {
                      if(mysqli_num_rows($getresult)>0)
                      {
                        while($row = mysqli_fetch_array($getresult))
                        {
                          ?>
                <div class="profile-pic-div">
                    <img class='rounded-circle' src="../../pages/image/<?php echo $row['pimage']; ?>" id="photo">


                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['fname']; ?>"
                                aria-describedby="nameHelp" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['lname']; ?>"
                                aria-describedby="nameHelp" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">Contact No.</label>
                            <input type="text" class="form-control" value="<?php echo $row['number2']; ?>"
                                aria-describedby="nameHelp" autocomplete="off" required>
                        </div>



                        <div class="col-md-6">
                            <label for="exampleInputName">Pin code</label>
                            <input type="text" name="image" id="image" value="<?php echo $row['pincode']; ?>"
                                class="form-control">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Address line 1</label>
                            <input type="text" class="form-control" value="<?php echo $row['address1']; ?>"
                                aria-describedby="nameHelp" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Address line 2</label>
                            <input type="text" class="form-control" value="<?php echo $row['address2']; ?>"
                                aria-describedby="nameHelp" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Skill</label>
                            <input type="text" class="form-control" value="<?php echo $row['skill']; ?>"
                                aria-describedby="nameHelp" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">Description</label>
                            <input type="text" name="description" id="" value="<?php echo $row['description']; ?>"
                                class="form-control">
                        </div>

                    </div>
                </div>



                <div class="form-group">
                    <div class="form-row d-flex justify-content-center">

                        <div class="col-md-6">
                            <a href="update_profile.php?id=<?php echo $row['number1']; ?>"><button
                                    class="btn btn-primary btn-block" name="submit" type="button">Update
                                    Profile</button> </a>
                        </div>

                        <br><br>
                        <!-- <div class="col-md-6">
                         <button class="btn btn-danger btn-block" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" name="delete" type="button">Delete Profile</button></a>
                        </div> -->

                    </div>
                </div>

               
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="container d-flex justify-content-center">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Warnning</h5></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                                Are you sure want to delete this Profile ?
                            </div>
                           <div class="modal-footer d-flex justify-content-center">
                                <a href="deleat.php"></a><button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                               <button class="btn btn-danger">Yes Delete</button>
                            </div>
                        </div>
                    </div>
                </div>




                <?php
                        }
                      }
                    }


                  ?>






            </form>



        </div>
    </div>
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>REPAIR भारत | TECHNICIAN PANEL SYSTEM</small>
            </div>
        </div>
    </footer>
</body>


<!--javascript start-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="assets/js/sb-admin.min.js"></script>
<script src="assets/js/sb-admin-datatables.min.js"></script>
<script src="assets/js/table2excel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script type="text/javascript">
//declearing html elements

const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');


imgDiv.addEventListener('mouseenter', function() {
    uploadBtn.style.display = "block";
});

imgDiv.addEventListener('mouseleave', function() {
    uploadBtn.style.display = "none";
});


file.addEventListener('change', function() {
    //this refers to file
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader();

        reader.addEventListener('load', function() {
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});
</script>
<script>
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function() {
    myInput.focus()
})
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#totalRegistrations').load("classes/dash.class.php", {
        totalRegistrations: true
    }, function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            console.log(statusTxt);
        }
        if (statusTxt == "error") {
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });

    $('#totalAmount').load("classes/dash.class.php", {
        totalAmount: true
    }, function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            console.log(statusTxt);
        }
        if (statusTxt == "error") {
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });

    $('#totalBalAmount').load("classes/dash.class.php", {
        totalBalAmount: true
    }, function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            console.log(statusTxt);
        }
        if (statusTxt == "error") {
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });

    $('#totalPartialAmount').load("classes/dash.class.php", {
        totalPartialAmount: true
    }, function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            console.log(statusTxt);
        }
        if (statusTxt == "error") {
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });

    $('#totalHeadCount').load("classes/dash.class.php", {
        totalHeadCount: true
    }, function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            console.log(statusTxt);
        }
        if (statusTxt == "error") {
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });

    $('#userLogins').load("classes/off_dash.class.php", {
        userLogins: true
    }, function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            console.log(statusTxt);
        }
        if (statusTxt == "error") {
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });

    $('#export').click(function() {
        $('.table').table2excel({
            exclude: ".noExl",
            name: "Registration Status",
            filename: "Event Registrations"
        })
    });
});
</script>
</body>

</html>