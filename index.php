<?php
session_start();
?>

<!DOCTYPE html>
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
    <script  src="JS/navbar.js"></script>
    <link rel="stylesheet" href="style/style_navbar.css">
    <link rel="stylesheet" href="style/style_footer.css">
    <link rel="stylesheet" href="style/carousel.css">
    <!-- Style -->


    <title>Index Page</title>
</head>

<body>


<?php

include 'pages/login_conn.php';

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



        /* $pass_verify = password_verify($password,$db_pass); */

            if($db_pass == $password)
            {
                ?>      
                    <script>
                        location.replace("app/technician/dashboard.php");
                    </script>

                <?php
            }
            else
            {
                ?>
                <script>
                    alert("Password is Wrong Please Try Again");
                </script>
        
                <?php
            }

    }
    else
    {
        ?>
        <script>
            alert("Invalid UserID");
        </script>

        <?php
    }


}


?>

    <!-- navbar start -->
   <section class="nav-bar">
        <div class="nav-container">
            <div class="brand">
                <a href="index.php"><img src="img/logo.jpeg"></a>
            </div>
        <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">
            <li>
            <a href="#about">About Us</a>
            </li>
            <li>
            <a href="pages/tabs.php">Technician</a>
            </li>
            <li>
            <a href="pages/help.php">Help</a>
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
    
   

     <!-- Silder part start here -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000" >
                <img src="img/cor2.jpg" class="img-fluid grey" alt="...">
                <div class="container">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="white">We are always available for you</h2>
                        <p class="white">Without labour nothing prospers.” – Sophocles</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/cor1.jpg" class="img-fluid grey" alt="...">
                <div class="container">
                <div class="carousel-caption d-none d-md-block">
                        <h2 class="white">We are always available for you</h2>
                        <p class="white">"No human masterpiece has been created without great labour.” – Andre Gide
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/cor3.jpg" class="img-fluid grey" alt="...">
                <div class="container">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="white">We are always available for you</h2>
                        <p class="white">"Nothing will work unless you do” – Maya Angelou</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">           
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">            
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- slider part ends here -->


<!------------------------------- Start of About US ------------------------------------------------->
    <section id="about">
    <div class="container" style="margin-top: 25px;" id="#About">
        <div class="row">         
            <div class="col-xl-12 col-lg-12 mb-50">
                <h1 class="featurette-heading d-flex justify-content-center">ABOUT US</h1>
            </div>
        </div>        
        <div class="row">
            <div class="col-xl-3 col-lg-3">
                <h4 class="featurette-heading d-flex justify-content-center">Repair BHARAT | भारत</h4>
            </div>
            <div class="col-xl-12 col-lg-12 mb-50 d-flex justify-content-center">
                <p class="lead ">
                Repair Bharat is India’s first exclusive repair directory aiming to provide all repair solutions at your finger tips. It provides a digital platform which helps customers to book reliable and high quality repair service according to your need & requirements.
                Repair Bharat directory allows skilled and experienced technicians & repair shops to connect with customers looking for a specific repair service or any product for their repair work.
                Repair Bharat not only deals with domestic repair but also aiming to provide solution for wide range of commercial and Industrial repair across the nation.</br>
                Mr. Kishor Jadhav started this journey of repair in a traditional way in 2016 from a city of Nagpur Maharashtra. Later on Mr. Kishor decided to transform this traditional form of repair into digital repair service and in Nov 2021 Repair bharat was launched online.
                At this time we are facilitating 75 types of repair services like Civil repair, Plumbing, Electric , Electronic Gadgets, Elevator, Treadmills, CCTV, Heavy Machines, All commercial and Industrial machines & Equipments used in Medical, Pharmaceutical, Agricultural field and many more.
                Repair Bharat is very actively working in Maharashtra and projecting to serve all states of India by Dec 2023.</p>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 30px;">
        <div class="row">         
            <div class="col-xl-12 col-lg-12 mb-50">
                <h1 class="featurette-heading d-flex justify-content-center">People behind this Digital Repair Story</h1>
            </div>
        </div>      
        <div class="row" style="margin-top: 20px;">  
            <div class="col-lg-6" class="justify-content-center" >
                <figure>
                    <img src="img/about1.png" class="img-fluid" alt="Responsive image"> 
                    <figcaption><h5>Mr. Kishor Jadhav </br> (Chairman & Founder)</h5></figcaption>
                </figure>
            </div>
            <div class="col-lg-6" class="justify-content-center">
                <figure >
                    <img src="img/about2.png" class="img-fluid" alt="Responsive image" >
                    <figcaption><h5>Mrs. Pratibha Jadhav </br> (Managing Director)</h5></figcaption>
                </figure>
            </div>
        </div>
    </div>
    </section>


    <!-- Sponsors part start here -->
        <div class="row" style="margin-top: 30px;">         
            <div class="col-xl-12 col-lg-12 mb-50">
                <h1 class="featurette-heading d-flex justify-content-center">Our Sponsors</h1>
            </div>
        </div>   

    <div class="container" style="margin-bottom: 50px;">


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <?php

        include 'pages/spons_connection.php';

        $select = " select * from sponsors ";

        $selectquery = mysqli_query($check,$select);

        $resultspo = mysqli_fetch_array($selectquery);


        while($resultspo = mysqli_fetch_array($selectquery))
        {
    ?>
            <a href="<?php echo $resultspo['link']?>">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="app/admin_panel/<?php echo $resultspo['logoimage']?>"
                            class="bd-placeholder-img card-img-top" width="100" height="225" alt="">
                    </div>
                </div>
            </a>
            <?php } ?>

        </div>
    </div>
    <!--- Sponsors ends here -->

    <!-- Footer code ---->
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

<!-- SCRIPTS OF JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>


<!-- JS ENDS -->

</body>
</html>