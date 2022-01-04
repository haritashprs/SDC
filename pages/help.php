<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Responsive Navbar with Search Box | CodingNepal</title> -->

    <link rel="stylesheet" href="../style/style_nav_footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  src="../JS/navbar.js"></script>
    <link rel="stylesheet" href="../style/style_navbar.css">
    <link rel="stylesheet" href="../style/style_footer.css">
    <title>Help</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap');

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=PT+Sans+Narrow&display=swap');

    body {

        font-family: 'PT Sans Narrow', sans-serif;
    }

    .faq-heading {
        /* border-bottom: 5px solid rgb(155, 149, 149); */

    }

    .faq-container {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .hr-line {
        width: 60%;
        margin: auto;

    }


    .faq-page {

        color: white;
        cursor: pointer;
        padding: 10px 20px 30px 20px;
        width: 60%;
        border: none;
        border-radius: 10px;
        outline: none;
        transition: 4s;
        margin: auto;
        margin-bottom: 20px;
        background-color: #202f49;
    }

    .faq-body {
        margin: auto;
        /* text-align: center; */
        border-radius: 6px;
        width: 60%;
        transition-delay: 2s;


    }





    .faq-body {



        padding: 15px 18px;
        background-color: #2c3649;
        color: white;
        display: none;
        overflow: hidden;
        margin-top: 10px;
        margin-bottom: 10px;
        font-family: 'Montserrat', sans-serif;
        transition-delay: 2s;
    }

    .faq-page:after {
        content: '\02795';

        font-size: 13px;
        transition: 4s;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        transition: 4s;
        content: "\2796";
        /* Unicode character for "minus" sign (-) */
    }
    </style>


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


    <main>
        <h3 class="faq-heading"
            style="margin-top:60px;  margin-left:20%; width:80%;  font-family: sans-serif;font-size:30px; font-weight:bold;line-height: 1.1; color:#0A192F;">
            Frequently Asked Questions</h3>
        <hr style="color:rgb(134, 128, 128);height:3px; width:33%; margin-left:20%; margin-bottom:35px;">
        <section class="faq-container">
            <div class="faq-one">
                <!-- faq question -->
                <h5 class="faq-page">How to book a service?</h5>
                <!-- faq answer -->
                <div class="faq-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                        necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                        aperiam.
                        Perspiciatis, porro!</p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-two">
                <!-- faq question -->
                <h5 class="faq-page">How to make payments?</h5>
                <!-- faq answer -->
                <div class="faq-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                        necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                        aperiam.
                        Perspiciatis, porro!</p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-three">
                <!-- faq question -->
                <h5 class="faq-page">Where i can get technicians details?</h5>
                <!-- faq answer -->
                <div class="faq-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                        necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                        aperiam.
                        Perspiciatis, porro!</p>
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade" id="exampleModallog" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="container d-flex justify-content-center">
                            <div class="modal-header">
                                <h5 class="modal-title text-primary" id="exampleModalLabel">Admin Login</h5>
                            </div>
                        </div>
                        <div class="container  d-flex justify-content-center">

                            <a href="admin_login.php"><button type="button" class="btn btn-outline-success">I'm
                                    Admin</button></a>
                        </div>

                    </div>
                </div>
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
    var faq = document.getElementsByClassName("faq-page");
    var i;
    for (i = 0; i < faq.length; i++) {
        faq[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");
            /* Toggle between hiding and showing the active panel */
            var body = this.nextElementSibling;
            if (body.style.display === "block") {
                body.style.display = "none";
            } else {
                body.style.display = "block";
            }
        });
    }
    </script>
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



</body>

</html>