<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <link rel="stylesheet" href="../style/style_nav_footer.css">
    
    <title>Get OTP</title>
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
                    </div>
                </a></li>
            <li><a href="help.php">Help</a></li>
            <li><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Login/Signup</a></li>
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
                        <a href="../app/technician/index.php">
                        <button type="button" class="btn btn-primary">Log In</button></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <br>
        <div class="container d-flex justify-content-center">
            <h1 class="text-primary">Update My Password</h1>
        </div>

        <br>

        <div class="container d-flex justify-content-center">
            <div class="col-md-4 ">
                <label for="validationCustom01" class="form-label">Enter Your Mobile Number</label>
                <input type="text" class="form-control" id="validationCustom01" value="" placeholder="+91" required>

            </div>
            <br>
        </div>

        <br>
        <div class="container d-flex justify-content-center">
            <a href="_chag&forget_pass.php">
                <button type="button" class="btn btn-outline-success">Get OTP</button>
            </a>
        </div>


    </main>


    <footer class="footer-section" style="margin-top:420px">
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
                            <div class="footer-logo">
                                <a href="index.html"><img src="https://i.ibb.co/QDy827D/ak-logo.png" class="img-fluid"
                                        alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor
                                    incididuntut consec tetur adipisicing
                                    elit,Lorem ipsum dolor sit amet.</p>
                            </div>
                            <!--<div class="footer-social-icon">
                          <span>Follow us</span>
                          <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                          <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                          <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                      </div>-->
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <!--   <div class="footer-widget">
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
                  </div>-->
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <!--  <div class="footer-widget">
                      <div class="footer-widget-heading">
                          <h3>Subscribe</h3>
                      </div>
                      <div class="footer-text mb-25">
                          <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                      </div>
                      <div class="subscribe-form">
                          <form action="#">
                              <input type="text" placeholder="Email Address">
                              <button><i class="fab fa-telegram-plane"></i></button>
                          </form>
                      </div>
                  </div>-->
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

</body>

</html>







<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>