<?php
// disable undefined notice warnings
error_reporting (E_ALL ^ E_NOTICE);

session_start();

// iclude the classes autoloader
include'/Website/Includes/Autoloader.inc.php' ;

//intialize variables and set them to zero
$name = $password = $regname =$regcode =$regmail =$regpsw1 =$regpsw2 = $radiobtn= $radiobtn1= '';

//array for errors
$errors = array('name'=>'', 'password'=>'', 'regname'=>'', 'regcode'=>'', 'regmail'=>'', 'regpsw1'=>'', 'regpsw2'=>'', 'radiobtn'=>'' , 'radiobtn1'=>'');
  

//check if data has been submitted from the login form 
if(isset($_POST['Signin-submit'])){
     //data from the form
     $name  = $_POST["name"];
     $password = $_POST["password"];
     $radiobtn1= $_POST["radiobtn1"];


     //check radiobtn
     if (empty($_POST["radiobtn1"])){
     $errors['radiobtn1'] = 'You must Select an intitution  type <br />';
}

    //check username
   if (empty($_POST["name"])){
       $errors['name'] = 'A Username is required <br />';

   }
   //check password
   if (empty($_POST["password"])){
       $errors['password'] = 'A Password is required <br />';
   }

   if (!array_filter($errors)){
       //if there are no errors in the form
       //create a new userview object
     $user = new UsersView ($name, $password, $radiobtn1);
     $user->login($name, $password, $radiobtn1);

         
     exit();
   } 

}




//check if data has been submitted from the registration form
 if(isset($_POST['Signup-submit'])){
     //data from the form
    $regname = $_POST["regname"];
    $regcode = $_POST["regcode"];
    $regmail = $_POST["regmail"];
    $regpsw1 = $_POST["regpsw1"];
    $regpsw2 = $_POST["regpsw2"];
    $radiobtn= $_POST["radiobtn"];


//check radiobtn
 if (empty($_POST["radiobtn"])){
     $errors['radiobtn'] = 'You must Select an intitution  type <br />';
}

    //check regname
 if (empty($_POST["regname"])){
     $errors['regname'] = 'A Username is required <br />';
 }

   //check code
   if (empty($_POST["regcode"])){
    $errors['regcode'] = 'A Code is required <br />';
 }

   //check email
   if (empty($_POST["regmail"])){
     $errors['regmail'] = 'A email is required <br />';
 } else {
     $regmail = $_POST["regmail"];
     // check if e-mail address is well-formed
     if (!filter_var($regmail, FILTER_VALIDATE_EMAIL)) {
       $errors['regmail'] = "Invalid email format";
     }
   }
  
   //check password
   if (empty($_POST["regpsw1"])){
     $errors['regpsw1'] = 'A Password is required <br />';
 } 

   //check confirmation password
   if (empty($_POST["regpsw2"])){
     $errors['regpsw2'] = 'A  Verification Password is required <br />';
 } 
   
 


 if (!array_filter($errors)){
//if there are no errors in the form and form is valid

   //create a new usercontrol object
   $newuser = new UsersControl ($radiobtn, $regname, $regcode, $regmail, $regpsw1);
   $newuser->CreateUser($radiobtn, $regname, $regcode, $regmail, $regpsw1);

  
  exit();
 }
   
}//end of POST check


?>

<!DOCTYPE html>
<html lang="en">
<title>LIFE ATM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="/javascript/main.js"></script>
<script src="https://kit.fontawesome.com/d2377483da.js" crossorigin="anonymous"></script>



<body>

    <!-- Navigation bar -->
    <div class="w3-top">
        <div class="w3-bar w3-blue w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()"  title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-fw fa-home"></i>HOME</a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="document.getElementById('LoginModal').style.display='block'"><i class="fa fa-fw fa-user"></i> LOGIN</a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="document.getElementById('RegistrationModal').style.display='block'"><i class="fas fa-address-card"></i>SIGN UP</a>
            <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small"><i class="fa fa-fw fa-envelope"></i>CONTACT</a>
            <a href="#Search" class="w3-bar-item w3-button w3-right w3-padding-large w3-hide-small"><i class="fa fa-search"></i></a>
        </div>
    </div>



    <!-- Navigation bar on small screens -->
    <div id="navigation" class="w3-bar-block w3-blue-gray w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <div class="w3-bar-item w3-button w3-padding-large" onclick="myFunction() ;document.getElementById('LoginModal').style.display='block'"><i class="fa fa-fw fa-user"></i>LOGIN</div>
        <div class="w3-bar-item w3-button w3-padding-large" onclick="myFunction() ;document.getElementById('RegistrationModal').style.display='block'"><i class="fas fa-address-card"></i>SIGN UP</div>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large " onclick="myFunction() "><i class="fa fa-fw fa-envelope"></i>CONTACT</a>
        <a href="#Search" class="w3-bar-item w3-button w3-padding-large " onclick="myFunction() ">Search...<i class="fa fa-search"></i></a>

    </div>


    <!-- Page heading -->
    <div class="w3-panel w3-green" style="margin-top: 46px; ">
        <h2 class="w3-opacity w3-center">LIFE ATM</h2>
    </div>


    <!-- Page content -->
    <div class="w3-content " style="max-width:2000px; height: 80%; ">

        <!-- Automatic Slideshow Images -->
        <div class="mySlides w3-display-container w3-center ">
            <img src="/pictures/abby-anaday-Z3fXPuxa15k-unsplash.jpg" style="width:100%; ">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small ">
                <h3>Los Angeles</h3>
                <p><b>We had the best time playing at Venice Beach!</b></p>
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center ">
            <img src="/pictures/kendal-L4iKccAChOc-unsplash.jpg " style="width:100%; ">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small ">
                <h3>New York</h3>
                <p><b>The atmosphere in New York is lorem ipsum.</b></p>
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center ">
            <img src="/pictures/marcelo-leal-k7ll1hpdhFA-unsplash.jpg " style="width:100%; ">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small ">
                <h3>Chicago</h3>
                <p><b>Thank you, Chicago - A night we won't forget.</b></p>
            </div>
        </div>


        <!-- About Life ATM -->
        <div class="w3-container w3-content w3-center w3-padding-64 " style="max-width:1000px ">
            <h2 class="w3-wide ">THE LIFE ATM</h2>
            <p class="w3-opacity "><i>Securing Your Health </i></p>
            <p class="w3-justify ">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        </div>



        <!-- Login Modal -->
        <div id="Signin">
            <div id="LoginModal" class="w3-modal" >
                <div class="w3-modal-content w3-animate-top w3-card-4 ">
                    <header class="w3-container w3-teal w3-center w3-padding-32 ">
                        <span onclick="myUncheck(); document.getElementById( 'LoginModal').style.display='none' " class="w3-button  w3-teal w3-hover-red w3-xlarge w3-display-topright ">×</span>
                        <h2 class="w3-wide "><i class="far fa-address-card w3-margin-right "></i>LOGIN</h2>
                    </header>

                    <div class="w3-container ">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <h3 class="w3-center">Select the Institution Type:</h3>

                        <div class="w3-bar w3-card-2">
                            <fieldset>
                                <label class="container" style="margin-left: 10px;">
                                    <input type="radio" name="radiobtn1"  value="hospital"><i class="fas fa-hospital"></i>Hospital
                                    <span class="checkmark"></span>
                                  </label>
                                <label class="container" style="margin-left: 10px;">
                                    <input type="radio"  name="radiobtn1" class="myRadio" required value="pharmacy"><i class="fas fa-clinic-medical"></i>Pharmacy
                                    <span class="checkmark"></span>
                                  </label>
                                <label class="container" style="margin-left: 10px;">
                                    <input type="radio" name="radiobtn1"  value="company"><i class="fas fa-building"></i>Pharmaceutical Company
                                    <span class="checkmark"></span>
                                  </label>
                            </fieldset>
                        </div>
                        <p class="w3-text-red">
                            <?php echo $errors['radiobtn1']; ?>
                        </p>
                        
                        <!-- diplay login error -->
                        <p class= "w3-text-red w3-center w3-large">
                        <?php if(isset($_GET['error'])){

                        echo $_SESSION["errors"]; unset($_SESSION['errors']); session_destroy(); 

                         } ?>
                        </p>
                        

                            <p><label><i class="fas fa-user-circle"></i> Username</label></p>
                            <input class="w3-input w3-border " type="text " placeholder="Enter User Name " name="name" value="<?php echo htmlspecialchars($name) ?>" required>
                            <p class="w3-text-red">
                                <?php echo $errors['name']; ?>
                            </p>
                            <p><label><i class="fas fa-user-secret"></i> Password</label></p>
                            <input class="mySecret w3-input w3-border" type="password" placeholder="Enter Password " name="password" value="<?php echo htmlspecialchars($password) ?>" required>
                            <p class="w3-text-red">
                                <?php echo $errors['password']; ?>
                            </p>
                            <input type="checkbox" class="CheckBox" onclick="myReveal()">Show Password
                            <input type="submit" class="w3-button w3-block w3-teal w3-padding-16 w3-section " name="Signin-submit" value="Login" onclick="myRadiobtn()">
                        </form>
                        <div>
                            <button class="w3-button w3-red w3-section " onclick="myUncheck(); document.getElementById( 'LoginModal').style.display='none' ">Close <i class="fa fa-remove "></i></button>
                            <p class="w3-right ">Forgot your <a href="# " class="w3-text-blue ">password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registration Modal -->
        
        <div id="RegistrationModal" class="w3-modal ">
            <div class="w3-modal-content w3-animate-top w3-card-4 ">
                <header class="w3-container w3-teal w3-center w3-padding-32 ">
                    <span onclick="myUncheck(); document.getElementById( 'RegistrationModal').style.display='none' " class="w3-button w3-teal w3-hover-red w3-large w3-display-topright ">×</span>
                    <h2 class="w3-wide "><i class="fas fa-address-book w3-margin-right "></i>Sign Up</h2>
                </header>

                <div class="w3-container ">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <h3 class="w3-center">Select the Institution Type:</h3>

                        <div class="w3-bar w3-card-2">
                            <fieldset>
                                <label class="container" style="margin-left: 10px;">
                                    <input type="radio" name="radiobtn"  value="hospital"><i class="fas fa-hospital"></i>Hospital
                                    <span class="checkmark"></span>
                                  </label>
                                <label class="container" style="margin-left: 10px;">
                                    <input type="radio"  name="radiobtn" class="myRadio" required value="pharmacy"><i class="fas fa-clinic-medical"></i>Pharmacy
                                    <span class="checkmark"></span>
                                  </label>
                                <label class="container" style="margin-left: 10px;">
                                    <input type="radio" name="radiobtn"  value="company"><i class="fas fa-building"></i>Pharmaceutical Company
                                    <span class="checkmark"></span>
                                  </label>
                            </fieldset>
                        </div>
                        <p class="w3-text-red">
                            <?php echo $errors['radiobtn']; ?>
                        </p>


                            <!-- diplay registration errors -->
                        <p class= "w3-text-red w3-center w3-large">
                        <?php if(isset($_GET['regerror'])){

                        echo $_SESSION["regerrors"]; unset($_SESSION['regerrors']); session_destroy(); 

                         } ?>
                        </p>


                        <p><label><i class="far fa-building "></i>Institution</label></p>
                        <input class="w3-input w3-border " type="text" id="regname" name="regname" placeholder="Enter Institution Name " value="<?php echo htmlspecialchars($regname) ?>" required>
                        
                        <!-- Check if name is already taken -->
                        <div id="uname_response" ></div>
                        


                        <p class="w3-text-red">
                            <?php echo $errors['regname']; ?>
                        </p>
                        <p><label><i class="fas fa-user-circle"></i> Registration Code</label></p>
                        <input class="w3-input w3-border " type="text" name="regcode" placeholder="Enter Code " value="<?php echo htmlspecialchars($regcode) ?>" required>
                        <p class="w3-text-red">
                            <?php echo $errors['regcode']; ?>
                        </p>
                        <p><label><i class="fas fa-envelope"></i> Email Address</label></p>
                        <input class="w3-input w3-border " type="email" name="regmail" placeholder="Enter your Email Address " value="<?php echo htmlspecialchars($regmail) ?>" required>
                        <p class="w3-text-red">
                            <?php echo $errors['regmail']; ?>
                        </p>
                        <p><label><i class="fas fa-user-secret"></i> Password</label></p>
                        <input class="mySecret w3-input w3-border" type="password" placeholder="Enter Password " name="regpsw1" id="psw" onchange="if(this.checkValidity()) form.regpsw2.pattern = this.value;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[●!#$%&'()*+,\-./:;<=>?@[\\\]^_`{|}~]).{8,}" title="Must contain at least one number, one special character, one uppercase and lowercase letter, and at least 8 or more characters"
                            value="<?php echo htmlspecialchars($regpsw1) ?>" required>
                        <p class="w3-text-red">
                            <?php echo $errors['regpsw1']; ?>
                        </p>
                        <input class="mySecret w3-input w3-border" type="password" placeholder="Verify Password " name="regpsw2" id="psw2" on onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" value="<?php echo htmlspecialchars($regpsw2) ?>"
                            required>
                        <p class="w3-text-red">
                            <?php echo $errors['regpsw2']; ?>
                        </p>
                        <input type="checkbox" class="CheckBox" onclick="myReveal()">Show Password
                        
                        <div>
                            <input type="submit" name="Signup-submit" class="w3-button w3-block w3-teal w3-padding-16 w3-section" value="Sign up" onclick="myRadiobtn()">
                        </div>
                    </form>

                    <p class="w3-right ">Already have an account? <button class="w3-button w3-small w3-blue " onclick="document.getElementById( 'RegistrationModal').style.display='none' ;document.getElementById( 'LoginModal').style.display='block' ">Sign In</button> </p>
                    <button class="w3-button w3-red w3-section " onclick="myUncheck(); document.getElementById( 'RegistrationModal').style.display='none' ">Close <i class="fa fa-remove "></i></button>
                </div>
            </div>
        </div>



        <!--Search div -->
        <div class="w3-container w3-content w3-padding-64 " style="max-width:1000px; margin-top:0px; " id="Search">
            <form class="search" action="/action_page.php">
                <input type="text" placeholder="Search for Medicines or Phrmacies and Hospitals in your area..." required>
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>


        <?php include'/Website/Includes/contact.footer.inc.php' ?>

<script>

// Automatic Slideshow - change image every 6 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides ");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none ";
    }
    myIndex++;
    if (myIndex > x.length) {
        myIndex = 1
    }
    x[myIndex - 1].style.display = "block ";
    setTimeout(carousel, 6000);
}


</script>




       

</body>

</html>