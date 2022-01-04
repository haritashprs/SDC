<?php

// $hostname="localhost";
// $username="root";
// $dbname="repair_bharat";
// $password="password"


//Made connection on line no 8, 152, 433 .

$connection = mysqli_connect('localhost','root','','repairbharat_301221');

if(!$connection){
    echo 'connection error: ' . mysqli_connect_error();
}

if(isset($_POST['submit']))
{
    
     $Fname=$_POST['Fname'];
     $Lname=$_POST['Lname'];
     $Pno=$_POST['Pno'];
     $Adrs=$_POST['Adrs'];
     $Adrs2=$_POST['Adrs2'];
     $avatar_name=$_FILES['pdf_file']['name'];
     $avatar_nam=$_FILES['pdf_fil']['name'];
     $avatar_na=$_FILES['Image']['name'];
     $Stateid=$_POST['stateId'];
     $Cityid=$_POST['cityId'];
     $Skill=$_POST['skill'];
     $Pincode=$_POST['Pincode'];
     $Referral=$_POST['Referralcode'];
     $Username=$_POST['Username'];
     $Password=$_POST['Password'];
    

function updateReferral(){

$que ="SELECT * FROM `rewards` WHERE `id`=1";
$res=mysqli_query($GLOBALS['connection'],$que);
   


   $result_f=mysqli_fetch_assoc($res);
   $poi=$result_f['r_point'];

   $po=$result_f['total_rewards']+$poi;




   $update_qu="UPDATE `rewards` SET `total_rewards`=$po WHERE `id`=1";  
   $mysqliii=mysqli_query($GLOBALS['connection'],$update_qu);




   $query ="SELECT * FROM `technician_data` WHERE `number1`='$_POST[Referralcode]'";
   $result=mysqli_query($GLOBALS['connection'],$query);
   if($result)
   {
      
    if(mysqli_num_rows($result)==1) {

      $result_fetch=mysqli_fetch_assoc($result);
      $point=$result_fetch['rewards']+ $poi;
      $update_query="UPDATE `technician_data` SET `rewards`=$point WHERE `number1`='$_POST[Referralcode]'";  
      $mysqlii=mysqli_query($GLOBALS['connection'],$update_query);
 


    }




   }

}
     
   
    //idproof

    
     $avatar_name= preg_replace("/\s+/","_",$avatar_name);
     $avatar_tmpname=$_FILES['pdf_file']['tmp_name'];
     $avatar_size=$_FILES['pdf_file']['size'];
     $avatar_type=$_FILES['pdf_file']['type'];
     $avatar_ext= pathinfo($avatar_name,PATHINFO_EXTENSION);
     $avatar_name= pathinfo($avatar_name,PATHINFO_FILENAME);
     
     $Idproof =$avatar_name."_".date("mjyHis").".".$avatar_ext;

     $destfil='upload/'.$Idproof;

     move_uploaded_file($avatar_tmpname,$destfil);

     //iti certificate

    
     $avatar_nam= preg_replace("/\s+/","_",$avatar_nam);
     $avatar_tmpnam=$_FILES['pdf_fil']['tmp_name'];
     $avatar_siz=$_FILES['pdf_fil']['size'];
     $avatar_typ=$_FILES['pdf_fil']['type'];
     $avatar_ex= pathinfo($avatar_nam,PATHINFO_EXTENSION);
     $avatar_nam= pathinfo($avatar_nam,PATHINFO_FILENAME);
     
     $Idproo =$avatar_nam."_".date("myjHis").".".$avatar_ex;

     $destfi='iti_certificate/'.$Idproo;

     move_uploaded_file($avatar_tmpnam,$destfi);


     ///only pdf
     $allowedExts = array("pdf");
     $temp = explode(".", $_FILES["pdf_file"]["name"]);
     $tem = explode(".", $_FILES["pdf_fil"]["name"]);
    
     $extension = end($temp);
     $extension = end($tem);
     
     //image

     $avatar_na= preg_replace("/\s+/","_",$avatar_na);
     $avatar_tmpna=$_FILES['Image']['tmp_name'];
     $avatar_si=$_FILES['Image']['size'];
     $avatar_ty=$_FILES['Image']['type'];
     $avatar_e= pathinfo($avatar_na,PATHINFO_EXTENSION);
     $avatar_na= pathinfo($avatar_na,PATHINFO_FILENAME);
     
     $Idpro =$avatar_na."_".date("myjHsi").".".$avatar_e;

     $destfile='image/'.$Idpro;

     move_uploaded_file($avatar_tmpna,$destfile);
        
       
//Username checking

$Usernamequery = " select * from technician_data where number1='$Username'";
$Query= mysqli_query($connection,$Usernamequery);

$Usernamecount= mysqli_num_rows($Query);

//referral code exist or not

if($_POST['Referralcode']!=''){


   



    $connection = mysqli_connect('localhost','nehal','test123','repairbharat_301221');

    $Referralquery ="SELECT * FROM `technician_data` WHERE `number1`='$_POST[Referralcode]'";
    $Quer=mysqli_query($connection,$Referralquery);    


$Referralcount= mysqli_num_rows($Quer);

if($Referralcount==1) {
    
    // subscription active and status approved or not

$result_fetc=mysqli_fetch_assoc($Quer);
$timer=$result_fetc['timer'];
$accountStatus=$result_fetc['account_status'];

}


}




if($Usernamecount>0){
    ?>
        
    <script>alert("Username already exist, please fill the form again")</script>
    <?php
    
}

else if($_POST['Referralcode']!='' ){
    
if( $Referralcount !== 1 || $accountStatus =='pending'){

   // || ($accountStatus !=='pending')
    ?>
    <script>alert("Invalid Referral Code, please fill the form again")</script>
    <?php
    

   }

   else{

    updateReferral();

    $sql ="INSERT INTO technician_data (fname,lname,number1,number2,address1,address2,idproof,pimage,iticertificate,state_id,city_id,skill,pincode,referralcode,password)

    VALUES ('$Fname','$Lname','$Username','$Pno','$Adrs','$Adrs2','$destfil','$destfile','$destfi','$Stateid','$Cityid','$Skill','$Pincode','$Referral','$Password')";


if($connection->query($sql)===TRUE)
{
   echo "New record added";

   ?>
    
   <script> window.location = "regsuccess.php";</script>
   <?php
  
}

else
{
  echo "Not inserted";
}




   }

 }

else
{
       
      
   
        $sql ="INSERT INTO technician_data (fname,lname,number1,number2,address1,address2,idproof,pimage,iticertificate,state_id,city_id,skill,pincode,referralcode,password)

        VALUES ('$Fname','$Lname','$Username','$Pno','$Adrs','$Adrs2','$destfil','$destfile','$destfi','$Stateid','$Cityid','$Skill','$Pincode','$Referral','$Password')";
   

   if($connection->query($sql)===TRUE)
   {
       echo "New record added";

       ?>
        
       <script> window.location = "regsuccess.php";</script>
       <?php
      
   }
  
   else
  {
      echo "Not inserted";
  }

  $connection->close();


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <link rel="stylesheet" href="../style/style_nav_footer.css">
    <title>Technician Registration</title>
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
    
    .media{margin-top:10%;}

    @media screen and (max-width: 557px) {
  .media {margin-top: 30%;
  }
    
    
}

</style>

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

<!------------------------------------------------------------------------------------------------------->    <main>
        
        <div class="row text-center mx-8" style="margin-top: 20px;">
            <h1 class="text-primary">Registration</h1>
        </div>

        <br>
        <form method="post"  enctype="multipart/form-data">
        <?php
       // include "config.php";
            $connection = mysqli_connect('localhost','root','','repairbharat_301221');
            include_once "Common.php";
            $common = new Common();
            $countries = $common->getStateByCountry($connection);
            ?>

            <div class="container media" >
                <div class="profile-pic-div">
                    <img class='rounded-circle' src="../img/img_avatar.png" id="photo">
                    <input type="file" id="file" name="Image" accept="image/*" required>
                    <label for="file" id="uploadBtn">Choose Photo</label>
                </div>
            </div>
            
            <div class="row mx-auto my-3">
            <div class="col-md-4 mt-3 mt-md-0">
                <label for="validationDefault01" class="form-label">Username (Phone number)</label>
                <input type="text" class="form-control" name="Username"  id="Username" maxlength="10" required >
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
                <label for="validationDefault01" class="form-label">Password</label>
                <input type="password" class="form-control" name="Password" maxlength="10"  id="pswd1"  required>
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
                <label for="validationDefault01" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="Confirmpassword" maxlength="10"  id="pswd2" onchange="matchPassword();" required >
            </div>
            </div>

            <div class="row mx-auto ">

                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">First name</label>
                    <input type="text" class="form-control"  id="firstname" name="Fname" value="" required>
                </div>
                <div class="col-md-6  mt-3 mt-md-0">
                    <label for="validationDefault02" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastname" name="Lname" value="" required>
                </div>
            </div>

            
           
            <div class="row mx-auto my-3">
            <div class="col-md-4">
                    <label for="validationDefaultUsername" class="form-label">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">+91</span>
                        <input type="text" class="form-control" id="phonenumber" maxlength="10"  name="Pno"
                            placeholder="xxxxxxxxxx">
                    </div>
                </div>
            <div class="col-md-4 mt-3 mt-md-0">
                <label for="validationDefault04" class="form-label">State</label>
                <select class="form-select"name="stateId" id="stateId" required onchange="getCityByState();">
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

            <div class="col-md-4 mt-3 mt-md-0">
                <label for="validationDefault04" class="form-label">City</label>
                <select class="form-select" id="cityId" required name="cityId"  >
                        <option selected disabled value="">Choose</option>
                        
               </select>
            </div>
            </div>

            <div class="row mx-auto my-3 ">
            <div class="form-group mx-auto">
                <label for="inputAddress">Address</label>
                <input type="text" maxlength="30" class="form-control" id="address1" name="Adrs"
                    placeholder="1234 Main St" required>
            </div>
            </div>

            <div class="row mx-auto my-3">
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" maxlength="30" class="form-control" name="Adrs2" id="address2"
                    placeholder="Apartment, studio, or floor">
            </div>
            </div>


            <div class="row mx-auto my-3">
            <div class="col-md-6">
                <label for="validationDefault05" >PIN Code</label>
                <input type="text" name="Pincode" maxlength="6" id="pincode" value="" class="form-control" placeholder="xxxxxx"  required>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <label for="validationDefault05">Referral code</label>
                <input type="text" name="Referralcode" maxlength="10" class="form-control"  value=""  id="referralcode"  placeholder="Optional" >
            </div>
            </div>
           
           

            <div class="row mx-auto my-3">
            <div class="col-md-4">
                <label for="validationDefault04" class="form-label">Skill</label>
                <select class="form-select" name="skill" id="skill" required >
                        <option selected disabled value="">Choose</option>
                        <?php
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


            <div class="col-md-4 mt-3 mt-md-0">
                <label for="validationDefault05" class="form-label">ID Proff</label>
                <input type="file" class="form-control" name="pdf_file" accept="application/pdf" id="idproof"  required>
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
                <label for="validationDefault05" class="form-label">ITI Certificate</label>
                <input type="file" class="form-control" name="pdf_fil"  accept="application/pdf" id="iticertificate" required >
            </div>
            </div>

            <div class="col-12 d-flex justify-content-center my-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  required>
                    <label class="form-check-label" for="invalidCheck2">
                        Agree to terms and conditions
                    </label>
                </div>
            </div>
            <div id="pass" class="text-danger" style="text-align:center;"></div>
            <div class="col-12 d-flex justify-content-center my-3">
                <button class="btn btn-primary" type="submit" name="submit" id="submit"  href="">Register Now</button>

            </div>



            </div>

        </form>

    </main>
    
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
<script type="text/javascript">
    //declearing html elements

    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');


    imgDiv.addEventListener('mouseenter', function () {
        uploadBtn.style.display = "block";
    });

    imgDiv.addEventListener('mouseleave', function () {
        uploadBtn.style.display = "none";
    });


    file.addEventListener('change', function () {
        //this refers to file
        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader();

            reader.addEventListener('load', function () {
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosedFile);
        }
    });
</script>

<script>
function matchPassword() {
  var pw1 = document.getElementById("pswd1").value;
  var pw2 = document.getElementById("pswd2").value;
  var pass = document.getElementById("pass");
  
  if(pw1 != pw2)
  {	
      alert("Passwords did not match");
    document.getElementById("submit").disabled=true;
    pass.innerHTML = "Password's didn't match";
  } 

  else{
    document.getElementById("submit").disabled=false;
    pass.innerHTML = ""; 
  }  
}

</script>

<script>
    

$('#submit').click(function(){
   
   if($('#file').val() == ''){
      alert('Please upload profile image');
      return;
   }
   if($('#Username').val() == ''){
      alert('Please enter username');
      return;
   }
   if($('#pswd1').val() == ''){
      alert('Please enter password');
      return;
   }
   if($('#pswd2').val() == ''){
      alert('Please confirm your password ');
      return;
   }
   if($('#firstname').val() == ''){
      alert('Please enter first name');
      return;
   }
   if($('#lastname').val() == ''){
      alert('Please enter last name');
      return;
   }
   
   if($('#stateId').val() == ''){
      alert('Select State');
      return;
   }
   if($('#cityId').val() == ''){
      alert('Select City');
      return;
   }
   if($('#address1').val() == ''){
      alert('Please enter Address');
      return;
   }
   
   if($('#pincode').val() == ''){
      alert('Please enter PIN code');
      return;
   }
   
   if($('#skill').val() == ''){
      alert('Please select Skill');
      return;
   }
   if($('#idproof').val() == ''){
      alert('Please upload ID proof');
      return;
   }
   if($('#iticertificate').val() == ''){
      alert('Please upload your ITI certificate');
      return;
   }   
});

    function getCityByState() {
        var stateId = $("#stateId").val();
       
        $.post("ajax.php",{getCityByState:'getCityByState',stateId:stateId},function (response) {
    
            var data = response.split('^');
           
            $("#cityId").html(data[1]);
        });
    }   
    
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
</html>