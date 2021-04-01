<?php
// disable undefined notice warnings
error_reporting (E_ALL ^ E_NOTICE);

session_start();



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
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-fw fa-home"></i>HOME</a>
            <a href="#services" class="w3-bar-item w3-button w3-padding-large w3-hide-small"></i>SERVICES</a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ORDER </a>
            <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
            <div class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="document.getElementById('settingsmodal').style.display='block'">PROFILE</div>
            
            <a href="#Search" class="w3-bar-item w3-button w3-right w3-padding-large w3-hide-small"><i class="fa fa-search"></i></a>

        </div>
    </div>


    <!-- Navigation bar on small screens -->
    <div id="navigation" class="w3-bar-block w3-blue-gray w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="#Info" class="w3-bar-item w3-button w3-padding-large " onclick="myFunction() ">SERVICES</a>
        <a href="#Info" class="w3-bar-item w3-button w3-padding-large " onclick="myFunction() ">ORDER</a>
        <div class="w3-bar-item w3-button w3-padding-large" onclick="myFunction() ;document.getElementById('settingsmodal').style.display='block'">PROFILE</div>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large " onclick="myFunction() "></i>CONTACT</a>
        <a href="#Search" class="w3-bar-item w3-button w3-padding-large " onclick="myFunction() "><i class="fa fa-search"></i></a>

    </div>
</div>


    <!-- Page heading -->
    <div class="w3-panel w3-green" style="margin-top: 46px; ">
    <h2 class="w3-opacity w3-center"><?php  echo  $_SESSION["name"] . "<br>"; ?></h2>
    </div>


    <!-- Page content -->
    <div class="w3-content " style="max-width:2000px; height: 80%; ">



        <!-- About Life ATM -->
        <div class="w3-container w3-content w3-center w3-padding-64 " style="max-width:1000px " id="Info">
            <h2 class="w3-wide ">THE LIFE ATM</h2>
            <p class="w3-opacity "><i>Securing Your Health </i></p>
            <p class="w3-justify ">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        </div>
    </div>

    <div id="settingsmodal" class="w3-modal ">
    <div class="w3-modal-content w3-animate-top w3-card-4 ">
                <header class="w3-container w3-teal w3-center w3-padding-32 ">
                    <span onclick="myUncheck(); document.getElementById( 'settingsmodal').style.display='none' " class="w3-button w3-teal w3-hover-red w3-large w3-display-topright ">×</span>
                    <h2 class="w3-wide ">Edit your Profile</h2>
                </header>

                <div class="w3-container ">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        

                        <p><label><i class="far fa-building "></i>Institution</label></p>
                        <input class="w3-input w3-border " type="text" id="regname" name="regname" placeholder="Institution Name " value="<?php echo htmlspecialchars($regname) ?>" required>
                        <p class="w3-text-red">
                            <?php echo $errors['regname']; ?>
                        </p>
                        <p><label><i class="fas fa-user-circle"></i> Registration Code</label></p>
                        <input class="w3-input w3-border " type="text" name="regcode" placeholder="Registration Code " value="<?php echo htmlspecialchars($regcode) ?>" required>
                        <p class="w3-text-red">
                            <?php echo $errors['regcode']; ?>
                        </p>
                        <p><label><i class="fas fa-envelope"></i> Email Address</label></p>
                        <input class="w3-input w3-border " type="email" name="regmail" placeholder="New Email Address " value="<?php echo htmlspecialchars($regmail) ?>" required>
                        <p class="w3-text-red">
                            <?php echo $errors['regmail']; ?>
                        </p>
                        <p><label><i class="fas fa-user-secret"></i> Password</label></p>
                        <input class="mySecret w3-input w3-border" type="password" placeholder="New Password " name="regpsw1" id="psw" onchange="if(this.checkValidity()) form.regpsw2.pattern = this.value;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[●!#$%&'()*+,\-./:;<=>?@[\\\]^_`{|}~]).{8,}" title="Must contain at least one number, one special character, one uppercase and lowercase letter, and at least 8 or more characters"
                            value="<?php echo htmlspecialchars($regpsw1) ?>" required>
                        <p class="w3-text-red">
                            <?php echo $errors['regpsw1']; ?>
                        </p>
                        <input class="mySecret w3-input w3-border" type="password" placeholder="Verify New Password " name="regpsw2" id="psw2" on onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" value="<?php echo htmlspecialchars($regpsw2) ?>"
                            required>
                        <p class="w3-text-red">
                            <?php echo $errors['regpsw2']; ?>
                        </p>
                        <input type="checkbox" class="CheckBox" onclick="myReveal()">Show Password
                        
                        <div>
                            <input type="submit" name="Signup-submit" class="w3-button w3-block w3-teal w3-padding-16 w3-section" value="Save Changes" onclick="myRadiobtn()">
                        </div>
                    </form>

                    <button class="w3-button w3-red w3-section " onclick="myUncheck(); document.getElementById( 'settingsmodal').style.display='none' ">Close <i class="fa fa-remove "></i></button>
                </div>
            </div>
    </div>


    <!--Search div -->
    <div class="w3-container w3-content w3-padding-64 " style="max-width:800px " id="Search">
        <form class="search" action="/action_page.php">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
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