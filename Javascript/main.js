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

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navigation");
    if (x.className.indexOf("w3-show ") == -1) {
        x.className += " w3-show ";
    } else {
        x.className = x.className.replace(" w3-show ", " ");
    }
}

// Reveals the password typed
function myReveal() {
    var x = document.getElementsByClassName("mySecret");
    var i;
    for (i = 0; i < x.length; i++) {
        if (x[i].type === "password") {
            x[i].type = "text";
        } else {
            x[i].type = "password";
        }
    }
}

// Uncheck the check box and set type to password on closing modal
function myUncheck() {
    var x = document.getElementsByClassName("CheckBox");
    var y = document.getElementsByClassName("mySecret");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].checked = false;
    }

    var a;
    for (a = 0; a < y.length; a++) {
        y[a].type = "password";
    }
}

function myRadiobtn() {
    var x = document.getElementsByClassName("myRadio");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].required;
    }
}