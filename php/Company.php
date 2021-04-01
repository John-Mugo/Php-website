<?php
session_start();

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header("location: ../php/index.php");
	exit;
}


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
<script src="https://kit.fontawesome.com/d2377483da.js" crossorigin="anonymous"></script>



<body>

    <!-- Navigation bar -->
    <div class="w3-top">
        <div class="w3-bar w3-blue w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-fw fa-home"></i>HOME</a>
            <a href="#Info" class="w3-bar-item w3-button w3-padding-large w3-hide-small"><i class="fas fa-sync-alt"></i>UPDATE INFORMATION</a>
            <div class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="document.getElementById('Ordermodal').style.display='block'"><i class="fas fa-cart-plus"></i>VIEW ORDERS</div>
            <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small"><i class="fa fa-fw fa-envelope"></i>CONTACT</a>


        </div>
    </div>



    <!-- Page heading -->
    <div class="w3-panel w3-green" style="margin-top: 46px; ">
        <<h2 class="w3-opacity w3-center"><?php  echo  $_SESSION["name"] . "<br>"; ?></h2>
    </div>


    <!-- Navigation bar on small screens -->
    <div id="navigation" class="w3-bar-block w3-blue-gray w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="#Info" class="w3-bar-item w3-button w3-padding-large " onclick="myFunction() "><i class="fas fa-sync-alt"></i>UPDATE INFORMATION</a>
        <div class="w3-bar-item w3-button w3-padding-large" onclick="myFunction() ;document.getElementById('Ordermodal').style.display='block'"><i class="fas fa-cart-plus"></i>VIEW ORDERS</div>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large " onclick="myFunction() "><i class="fa fa-fw fa-envelope"></i>CONTACT</a>


    </div>



    <!-- Page content -->
    <div class="w3-content " style="max-width:2000px; height: 80%; ">



        <!-- About Life ATM -->
        <div class="w3-container w3-content w3-center w3-padding-64 " style="max-width:800px " id="Info">
            <h2 class="w3-wide ">THE LIFE ATM</h2>
            <p class="w3-opacity "><i>Securing Your Health </i></p>
            <p class="w3-justify ">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        </div>
    </div>

    <div id="Ordermodal" class="w3-modal ">
        <div class="w3-modal-content w3-animate-top w3-card-4 ">
            <header class="w3-container w3-teal w3-center w3-padding-32 ">
                <span onclick=" document.getElementById( 'Ordermodal').style.display='none' " class="w3-button w3-teal w3-xlarge w3-display-topright ">×</span>
                <h2 class="w3-wide "><i class="fas fa-address-book w3-margin-right "></i>Sign Up</h2>
            </header>
            <div class="w3-container ">
                <form action="/action_page.php" target="_blank">
                    <p><label><i class="fas fa-building"></i>Pharmaceutical Company</p>
                     <input class="w3-input w3-border " type="text " placeholder="Enter Pharmaceutical Company Name ">
                     <p><label><i class="fas fa-user-circle"></i> Registration Code</label></p>
                    <input class="w3-input w3-border " type="text" placeholder="Enter Code ">
                    <p><label><i class="fas fa-envelope"></i> Email Address</label></p>
                    <input class="w3-input w3-border " type="text" placeholder="Enter your Email Address ">
                    <p><label><i class="fas fa-user-secret"></i> Password</label></p>
                    <input class="mySecret w3-input w3-border" type="password" placeholder="Enter Password ">
                    <input class="mySecret w3-input w3-border" type="password" placeholder="Repeat Password ">
                    <input type="checkbox" class="CheckBox" onclick="myReveal()">Show Password
                    <div class="w3-bar">
                        <button class="w3-button w3-dark-gray w3-padding-16 w3-section w3-left " style="width: 50%;">Authenticate <i class="fa fa-check "></i> </button>
                        <button class="w3-button w3-blue-gray w3-padding-16 w3-section w3-right " style="width: 50%;">Register <i class="fa fa-check "></i></button>
                    </div>
                </form>
                <p class="w3-right ">Already have an account? <button class="w3-button w3-small w3-blue " onclick="document.getElementById( 'CompanyRegisterModal').style.display='none' ;document.getElementById( 'LoginModal').style.display='block' ">Sign In</button> </p>
                <button class="w3-button w3-red w3-section " onclick=" document.getElementById( 'Ordermodal').style.display='none' ">Close <i class="fa fa-remove "></i></button>
            </div>
        </div>
    </div>



    <?php include'/Website/Includes/contact.footer.inc.php' ?>

    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navigation");
            if (x.className.indexOf("w3-show ") == -1) {
                x.className += " w3-show ";
            } else {
                x.className = x.className.replace(" w3-show ", " ");
            }
        }
    </script>

</body>

</html>