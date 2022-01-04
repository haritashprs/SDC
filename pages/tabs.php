<?php

session_start();


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  src="../JS/navbar.js"></script>
    <link rel="stylesheet" href="../style/style_navbar.css">
    <link rel="stylesheet" href="../style/style_footer.css">
    

    <style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #171c24;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button{
            -webkit-appearance:  none;
        }
    </style>


    <title>technician</title>
</head>

<body>
<?php

include 'login_conn.php';

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_search = " select * from technician_data where number1='$username' ";
    $query = mysqli_query($check,$user_search);

    $user_count = mysqli_num_rows($query);

    if($user_count)
    {
        $user_pass = mysqli_fetch_assoc($query);

        $db_pass = $user_pass['password'];

        $_SESSION['userid'] =  $user_pass['number1'];
        $_SESSION['username'] =  $user_pass['fname'];
        $_SESSION['lastname'] =  $user_pass['lname'];
        $_SESSION['contactno'] =  $user_pass['number2'];
        $_SESSION['statename'] =  $user_pass['state_id'];
        $_SESSION['cityname'] =  $user_pass['city_id'];
        $_SESSION['add1'] =  $user_pass['address1'];
        $_SESSION['add2'] =  $user_pass['address2'];
        $_SESSION['pincode'] =  $user_pass['pincode'];
        $_SESSION['skill'] =  $user_pass['skill'];
        $_SESSION['pimage'] =  $user_pass['pimage'];
        $_SESSION['timer'] =  $user_pass['timer'];
        $_SESSION['subdate'] =  $user_pass['subscription_date'];
        $_SESSION['rewards'] =  $user_pass['rewards'];



        /* $pass_verify = password_verify($password,$db_pass); */

            if($db_pass == $password)
            {
                ?>
    <script>
    location.replace("../app/technician/dashboard.php");
    </script>

    <?php
            }
            else
            {
                ?>
    <div class="alert alert-danger d-flex justify-content-center" role="alert">
        <?php
            echo "Password is not Correct";
        ?>
    </div>
    <?php
            }

    }
    else
    {
        ?>
    <div class="alert alert-danger d-flex justify-content-center" role="alert">
        <?php
            echo "Invalid User ID";
        ?>
    </div>

    <?php
    }


}
?>


<!------------------------------------------------------------------------------------------------------->
    <!-- navbar start -->
    <section class="nav-bar">
        <div class="nav-container">
            <div class="brand">
                <a href="../index.php"><img src="../img/logo.jpeg"></a>
            </div>
        <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">
            <li>
            <a href="../index.php#about">About Us</a>
            </li>
            <li>
            <a href="tabs.php">Technician</a>
            </li>
            <li>
            <a href="help.php">Help</a>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Login/Signup</a>
                <ul class="nav-dropdown">
                </ul>
            </li>       
        </ul>
        </nav>
        </div>
    </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">User ID (Mobile No)</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <br>
                        <div class="container">
                            <a href="pages/get_otp.php">
                                <button type="button" class="btn btn-outline-success">Update My Password</button>
                            </a>
                        </div>
                        <br>
                        <div>
                            <h6 class="text-secondary d-flex justify-content-center">New User Registeration ?<a
                                    href="pages/sign_up.php">
                                    <p class="text-primary">Sign_Up</p>
                                </a></h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="../app/technician/dashboard.php">
                                <button type="button" class="btn btn-primary">Log In</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal ends-->

<!------------------------------------------------------------------------------------------------------->



    <div class="content">
        <div id="main">
            <div class="container d-flex justify-content-center">
                <h4>Select your State and City</h4>
            </div>
            <div class="container d-flex justify-content-center">

                <h6>Checking Technician Availability</h6>
            </div>
            <div class="container d-flex justify-content-center my-4">

                <button type="button" class="btn btn-outline-primary" style="font-size:30px;cursor:pointer"
                    onclick="openNav()">Select here</button>
            </div>
        </div>
    </div>
    <!-- nevbar end -->
    
    <!--  side bar start -->
    <div id="mySidenav" class="sidenav">
        <form action="cards.php" method="POST">

            <?php
            include "config.php";
            include_once "Common.php";
            $common = new Common();
            $countries = $common->getStateByCountry($connection);
            ?> 

            <?php
                if (isset($_POST['submit'])) {
                    $role = $_POST['skill'];
                    $cityId=$_POST['cityId'];
                    $pin=$_POST['pincode'];
                    alert("success");
                }
            ?>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="container d-flex justify-content-center my-3">
                <div class="col-md-10">
                    <label for="validationDefault04" class="form-label d-flex justify-content-center">
                        <h6 class="text-warning">Select your State</h6>
                    </label>
                    <select class="form-select" id="stateId" required onchange="getCityByState();">
                        <option selected disabled value="">Choose</option>

                        <?php
                            if ($countries->num_rows > 0 ){
                                while ($states = $countries->fetch_object()) {
                                    $state = $states->statename;
                                    $stateId = $states->id ?>
                                        <option value="<?php echo $stateId ?>"><?php echo $state;?></option>
                                        <?php }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="container d-flex justify-content-center my-3">
                <div class="col-md-10">
                    <label for="validationDefault04" class="form-label d-flex justify-content-center">
                        <h6 class="text-warning">Select your City</h6>
                    </label>
                    <select class="form-select" id="cityId" name="cityId" required>
                        <option selected disabled value="">Choose</option>
                        
                    </select>
                </div>
            </div>

            <div class="container d-flex justify-content-center my-3">
                <div class="col-md-10">
                    <label for="validationDefault04" class="form-label d-flex justify-content-center">
                        <h6 class="text-warning">Enter Pincode</h6>
                    </label>
                    <input type="number" name="pincode" required>
                    
                </div>
            </div>
            
            <div class="container d-flex justify-content-center my-3">
                <div class="col-md-10">
                    <label for="validationDefault04" class="form-label d-flex justify-content-center">
                        <h6 class="text-warning">Select Technician</h6>
                    </label>
                    <select class="form-select" required name="skill" >
                        <option selected disabled>Choose</option>
                        <?php
                            $q = "SELECT * FROM skill_table";  
                            $query = mysqli_query($connection, $q);
                            $num = mysqli_num_rows($query);
                            if($num>0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo "<option value='".$row['Skill_Name']."''>".$row['Skill_Name']."</option>";
                                }}
                        ?>

                    </select>
                </div>
            </div>
            <div class="container d-flex justify-content-center my-4">
                <a href="cards.php">
                    <button type="submit" class="btn btn-outline-primary" name="submit">Search</button>
                </a>
            </div>
        </form>
    </div>



    <!---------------------------------------------------------------------------------------------------->
    <!-- footer--->

    <footer class="footer-section">
        <div class="container">            
            <div class="footer-content pt-5 pb-2">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Repair | Bharat</h3>
                            </div>
                            <div class="footer-text">
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor
                                    incididuntut consec tetur adipisicing
                                    elit,Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6">
                    	<div class="footer-cta pt-2 pb-5">
			                <div class="row">
			                    <div class="col-xl-12 col-lg-6 col-md-6 mb-30">
			                        <div class="single-cta">
			                            <i class="fas fa-map-marker-alt"></i>
			                            <div class="cta-text">
			                                <h4>Find us</h4>
			                                <span>104, 2nd floor, Behind Yeskar flourmill, Opposite <p>to Hanuman temple, Rameshwari Nagpur, Maharashtra Pin 440027</p></span>
			                            </div>
			                        </div> 	
			                    </div>
			                <div class="row">
			                    <div class="col-xl-12 col-lg-6 col-md-6 mb-30">
			                        <div class="single-cta">
			                            <i class="fas fa-phone"></i>
			                            <div class="cta-text">
			                                <h4>Call us</h4>
			                                <span><p>+91 9146532697</p></span>
			                                <span><p>+91 8208522125</p></span>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                <div class="row">
			                    <div class="col-xl-12 col-lg-6 col-md-6 mb-30">
			                        <div class="single-cta">
			                            <i class="far fa-envelope-open"></i>
			                            <div class="cta-text">
			                                <h4>Mail us</h4>
			                                <span>repairbharat@gmail.com</span>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                </div>
            			</div>
                    </div>


                    <div class="col-xl-3 col-lg-3 col-md-3 mb-50">
                        <div class="footer-widget">
                        	<div class="row">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="index.php" style="text-decoration: none;">Home</a></li>
                                <li><a href="pages/aboutus.php" style="text-decoration: none;">About Us</a></li>
                                <li><a href="pages/tabes.php" style="text-decoration: none;">Technicians</a></li>
                                <li><a href="pages/help.php" style="text-decoration: none;">Help</a></li>
                                <li><a href=""data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration: none;">Login/Signup</a></li>
                            </ul>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2022, All Right Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- END OF FOOTER -->
<!---------------------------------------------------------------------------------------------------->

<script>
    function getCityByState() {
        var stateId = $("#stateId").val();
        $.post("ajax.php",{getCityByState:'getCityByState',stateId:stateId},function (response) {
    
            var data = response.split('^');
            $("#cityId").html(data[1]);
        });
    }
        
    
</script>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
const menuBtn = document.querySelector(".menu-icon span");
const searchBtn = document.querySelector(".search-icon");
const cancelBtn = document.querySelector(".cancel-icon");
const items = document.querySelector(".nav-items");
const form = document.querySelector("form");
menuBtn.onclick = () => {
    items.classList.add("active");
    menuBtn.classList.add("hide");
    searchBtn.classList.add("hide");
    cancelBtn.classList.add("show");
}
cancelBtn.onclick = () => {
    items.classList.remove("active");
    menuBtn.classList.remove("hide");
    searchBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    form.classList.remove("active");
    cancelBtn.style.color = "#ff3d00";
}
searchBtn.onclick = () => {
    form.classList.add("active");
    searchBtn.classList.add("hide");
    cancelBtn.classList.add("show");
}
</script>


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</body>

</html>