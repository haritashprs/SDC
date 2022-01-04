<?php

// $hostname="localhost";
// $username="root";
// $dbname="login";
// $password="password"

$connection = mysqli_connect('localhost','root','','repairbharat_301221');

if(!$connection){
    echo 'connection error: ' . mysqli_connect_error();
}

if(isset($_POST['submit']))
{
     $Pno=$_POST['username'];
     $Adrs=$_POST['pass'];
     
     $sql ="SELECT username, pass FROM admin_login";

     echo $sql;
     $result = mysqli_query($connection,$sql);
     if(mysqli_num_rows($result)>0)
    // if($connection->query($sql)===TRUE)
    {
       header("Location:../app/admin_panel/dashboard_stats.php");
    }
   
    else
   {
       echo "Not inserted";
   }
    
    $connection->close();
}
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../style/style_nav_footer.css">
    
    <title>About_Us</title>
</head>

<body>

    <!-- nevbar start -->
    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo">Repair | भारत</div>
        <div class="nav-items">
            <li><a href="index2.php">Home</a></li>
            <li><a href="#">About</a></li>
            <!--<li><a href="#" list="options">Blogs</a></li>
    <datalist id="options">
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                        <option>Option4</option>
    </datalist>-->
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
            <li><a href="#">Help</a></li>
            <li><a href="log_In.php">Login/Signup</a></li>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <!-- <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
        </form> -->
    </nav>

    <main>
<div class="box-form">
    <div class="left">
         

        <div class="overlay">
        <h1>Repair Bharat</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Curabitur et est sed felis aliquet sollicitudin</p>
        </div>
    </div>
    
        <form action="../app/admin_panel/dashboard_stats.php" method="post">
        <div class="right">
        <h1>Login</h1>
        
        <div class="inputs">
            <input type="username" name="username" placeholder="Username">
            <br>
            <input type="password" name="pass" placeholder="Password">
        </div>
            
            <br>
            <br>
            
        <div class="remember-me--forget-password">
            <p><a href="#">Forget Password?</a></p>
                <!-- Angular -->
                <br>
    <!-- <label>
        <input type="checkbox" name="item" checked/>
        <span class="text-checkbox">Remember me</span>
    </label> -->
            
        </div>
          <input type="submit" name="Login" value="Login">
        </div>
    </form>
</div>
</main>
<footer class="footer-section">
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

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
