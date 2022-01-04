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
    <title>Update Password</title>
</head>

<body>

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
        <br>
        <div class="container d-flex justify-content-center">
            <h1 class="text-primary">Update Your Password</h1>
        </div>

        <br>

        <div class="container">
            <div class="container d-flex justify-content-center">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Enter Your OTP</label>
                    <input type="text" class="form-control" id="validationCustom01" value="" placeholder="OTP-" required>
                </div>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Enter New Password</label>
                    <input type="text" class="form-control" id="validationCustom01" value="" placeholder="XXXXXXXXXX" required>

                </div>
            </div>




            <div class="container d-flex justify-content-center">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Enter Confirm New Password</label>
                    <input type="text" class="form-control" id="validationCustom01" value="" placeholder="xxxxxxxxxx" required>

                </div>
            </div>
        </div>
        <br>
        
        <div class="container d-flex justify-content-center">
        <a href="index.php">
            <button type="button" class="btn btn-outline-success">Update and Save</button>
        </div>
        </a>
    </main>
    <!--  side bar end -->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
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

</body>

</html>