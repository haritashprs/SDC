<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style_nav_footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>




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
        background-color: #111;
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
    </style>


    <title>cards</title>
</head>

<body>

    <!-- nevbar start -->
    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo">Repair | भारत
        </div>
        <div class="nav-items">
            <li><a href="../index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="#">
                    <div class="dropdown">
                        <span>Technicians</span>
                        <!-- <div class="dropdown-content">
                            <p><a href="tabs.php">Plumber</a></p>
                            <p><a href="tabs.php">Electrician</a></p>
                            <p><a href="tabs.php">Carpenter</a></p>
                        </div> -->
                    </div>
                </a></li>
            <li><a href="help.php">Help</a></li>
            <li><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Login/Signup</a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
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
                            <a href="get_otp.php">
                                <button type="button" class="btn btn-outline-success">Update My Password</button>
                            </a>
                        </div>
                        <br>
                        <h6 class="text-secondary d-flex justify-content-center">New User Registeration ?<a
                                href="sign_up.php">
                                <p class="text-primary">Sign_Up<p>
                            </a></h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="../../app/technician/dashboard.php">
                            <button type="button" class="btn btn-primary">Log In</button></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    </div>
    <!-- nevbar end -->

    <!--  side bar start -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="container d-flex justify-content-center my-3">
            <div class="col-md-10">
                <label for="validationDefault04" class="form-label d-flex justify-content-center">
                    <h6 class="text-warning">Select your State</h6>
                </label>
                <select class="form-select" id="validationDefault04" required>
                    <option selected disabled value="">Choose</option>
                    <option>Maharashtra</option>
                    <option>Delhi</option>
                    <option>Kerla</option>
                    <option>Uttar Pradesh</option>
                </select>
            </div>
        </div>
        <div class="container d-flex justify-content-center my-3">
            <div class="col-md-10">
                <label for="validationDefault04" class="form-label d-flex justify-content-center">
                    <h6 class="text-warning">Select your City</h6>
                </label>
                <select class="form-select" id="validationDefault04" required>
                    <option selected disabled value="">Choose</option>
                    <option>Nagpur</option>
                    <option>Mumbai</option>
                    <option>Pune</option>
                    <option>Thane</option>
                    <option>Navi Mumbai</option>
                </select>
            </div>
        </div>
        <div class="container d-flex justify-content-center my-4">
            <a href="cards.php">
                <button type="button" class="btn btn-outline-primary">Search</button>
            </a>
        </div>
    </div>





    <!--  side bar end -->


    <div class="container">
        <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-2'>
        <?php
        include 'config.php';
        $r = $_POST['skill']; 
        $c = $_POST['cityId'];
        $pin= $_POST['pincode'];
        $q = "SELECT * FROM technician_data WHERE city_id=$c and skill='$r' and account_status='Approved' and pincode=$pin";  
        $query = mysqli_query($connection, $q);
        $num = mysqli_num_rows($query);
        if($num>0) {
            while ($row = mysqli_fetch_assoc($query)) {

                echo "<div class='col'>
                        <div class='card shadow-sm'>
                            <embed src='".$row['pimage']. "' width='100px' height='250px' class='d-block w-100'>

                            <div class='card-body'>
                                <h4><b>".$row['fname']." ".$row['lname']."</b></h4>
                                <h5>Mobile No :".$row['number1']."</h5>
                                <h5>Phone No :".$row['number2']."</h5>
                                <h5>Skills :".$row['skill']."</h5>
                                <h5>Availibility :6am to 10pm</h5>

                                <div class='container d-flex justify-content-center'>
                                    <h1 class='badge rounded-pill bg-success fs-5'>Available</h1>
                                </div>
                                <div class='container d-flex justify-content-center'>
                                    <a href='log_In.php'>
                                        <button type='button' class='btn btn-primary btn-lg'>Call now</button>
                                     </a>
                                    <a href='#' onclick='showpopup(this.id);' data-bs-toggle='modal' id='".$row['number1']."' data-bs-target='#exampleModal2'>
                                        <button type='button' class='btn btn-warning btn-lg mx-2' id='".$row['number1']."'>View Details</button>
                                    </a>
                                </div>
                            </div>
                            </div>
                            </div>";
                        }}
        ?>
        </div>  
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Your Technicain Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <h4><b id='name'></b><b id='lname'></b></h4>
                    <h5>Skills :<b id='skills'></b></h5>
                    <h5>Availibility :6am to 10pm</h5>
                    <h5>Address 1 :<b id='address1'></b></h5>
                    <h5>Address 2 :<b id='address2'></b></h5>
                    <h5>Phone No. :<b id="number1"></b></h5>
                    <h5>Mobile No. :<b id="number2"></b></h5>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="../../app/technician/dashboard.php">
                            <button type="button" class="btn btn-primary">Call Now</button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

    <footer class="footer-section" style="margin-top:400px">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>104,2nd floor,Behind Yeskar flourmill,Opposite <p>to Hanuman temple,Rameshwari Nagpur,
                                </p><p>Maharashtra Pin 440027</p></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>+91 9146532697</span><br>
                                <span>+91 8208522125</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
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
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <!-- <div class="footer-logo">
                                <a href="index.html"><img src="https://i.ibb.co/QDy827D/ak-logo.png" class="img-fluid"
                                        alt="logo"></a>
                            </div> -->
                            <div class="footer-text">
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor
                                    incididuntut consec tetur adipisicing
                                    elit,Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">portfolio</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Expert Team</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Latest News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2022, All Right Reserved <a
                                    href="#">SVPCET</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Credits</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        function showpopup(id){
            $.post("ajax.php",{getpopupid:'getpopupid', id:id}, function (response){
            var dat = response.split('^');
            $("#name").html(dat[0]);
            $("#skills").html(dat[1]);
            $("#number1").html(dat[2]);
            $("#number2").html(dat[3]);
            $("#address1").html(dat[4]);
            $("#address2").html(dat[5]);
            $("#lname").html(dat[6]);

        });
        }
    </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>