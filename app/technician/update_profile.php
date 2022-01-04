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
    <title>Technician profile update page</title>
    <!-- Bootstrap core CSS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
            <form action="#" method="POST" enctype="multipart/form-data">

                <?php
                  include 'db_connection.php';

                    $currentuser = $_SESSION['userid'];
                    $ids = $_GET['id'];

                    $showquery = " select * from technician_data where number1={$ids}";

                    $showdata = mysqli_query($check,$showquery);

                    $arraydata = mysqli_fetch_array($showdata);


                    if(isset($_POST['submit']))
                    {
                        $idupdate = $_GET['id'];
                        $contact =$_POST['contactno'];
                        $state =$_POST['state'];
                        $city =$_POST['city'];
                        $pincode =$_POST['pincode'];
                        $address1 =$_POST['address1'];
                        $address2 =$_POST['address2'];
                        $skill =$_POST['skill'];
                        $Image =$_FILES['pimage'];


                        //for image
                        $filename=$Image['name'];
                        $filepath=$Image['tmp_name'];
                        $fileerror=$Image['error'];

                        if($fileerror==0){

                            $destfile='../../pages/image'.$filename;
                            //echo "$destfile";
                            move_uploaded_file($filepath,$destfile);
                        }
                


                        $updatequery = " update technician_data set number2='$contact',state_id='$state',city_id='$city',pincode='$pincode',address1='$address1',address2='$address2',skill='$skill',pimage='$destfile' where number1=$idupdate"; 




                        $res = mysqli_query($check,$updatequery);


                        if($res)
                        {
                            echo "<script>alert('Updatation successful');</script>";
                        }




                    }
                    ?>

                <div class="profile-pic-div">
                    <img class='rounded-circle' src="../../pages/image/<?php echo $arraydata['pimage']; ?>" id="photo">


                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $arraydata['fname'];?>"
                                aria-describedby="nameHelp" autocomplete="off" name="fname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $arraydata['lname'];?>"
                                aria-describedby="nameHelp" autocomplete="off" name="lname" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">Contact No.</label>
                            <input type="text" class="form-control" value="<?php echo $arraydata['number2'];?>"
                                aria-describedby="nameHelp" autocomplete="off" name="contactno" required>
                        </div>
                        <?php
            include "../../pages/config.php";
            include_once "../../pages/common.php";
            
            $common = new Common();
            $countries = $common->getStateByCountry($connection);
            ?>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">State</label>
                            <select class="form-select" name="state" id="stateId" onchange="getCityByState();">
                                <option selected disabled value="">Choose</option>

                                <?php
                            if ($countries->num_rows > 0 ){
                                while ($states = $countries->fetch_object()) {
                                    $state = $states->statename;
                                    $stateId = $states->id ?>
                                <option value="<?php echo $stateId; ?>"><?php echo $state;?></option>
                                <?php }
                            }
                        ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputLastName">City</label>
                            <select class="form-select" id="cityId" required name="city">
                                <option selected disabled value="" >Choose</option>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">Pin code</label>
                            <input type="text" name="pincode" id="image" value="<?php echo $arraydata['pincode'];?>"
                                class="form-control">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Address line 1</label>
                            <input type="text" class="form-control" value="<?php echo $arraydata['address1'];?>"
                                aria-describedby="nameHelp" autocomplete="off" name="address1" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Address line 2</label>
                            <input type="text" class="form-control" value="<?php echo $arraydata['address2'];?>"
                                aria-describedby="nameHelp" autocomplete="off" name="address2" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Skill</label>
                            <select class="form-select form-select-lg mb-2" aria-label=".form-select-lg example"
                                name="skill" id="skill">
                                <option selected>Choose</option>
                                <?php
                               include '../../pages/config.php';
                           $q = "SELECT * FROM skill_table";  
                           $query = mysqli_query($connection, $q);
                           $num = mysqli_num_rows($query);
                           if($num>0) {
                               while ($row = mysqli_fetch_assoc($query)) {
                                   echo "<option>".$row['Skill_Name']."</option>";
                               }}
                       ?>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Upload new profile Image</label>
                            <input type="file" class="form-control" name="pimage" value=" " aria-describedby="nameHelp"
                                autocomplete="off" required>
                        </div>

                    </div>



                </div>
                <div class="container d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn btn-outline-success">Update
                        and Save</button>
                </div>








            </form>
            <br>
            <a href="profile1.php"><div class="d-grid gap-2">
                <button class="btn btn-primary" type="button">Check Your Updated Profile</button>
            </div></a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
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

<script>
function getCityByState() {
    var stateId = $("#stateId").val();

    $.post("ajax.php", {
        getCityByState: 'getCityByState',
        stateId: stateId
    }, function(response) {

        var data = response.split('^');

        $("#cityId").html(data[1]);
    });
}
</script>
</body>

</html>