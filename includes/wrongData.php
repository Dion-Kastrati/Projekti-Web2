<?php 

    if(isset($_GET["error"]))
    if($_GET["error"] == "emptyinput"){
        echo "<p style= 'color: orange;' > Fill in the fields! </p>";
    }

    else if($_GET["error"] == "invalidusername"){
        echo "<p style= 'color: red;' > Ivalid username, choose a proper username! </p>";
    }

    else if($_GET["error"] == "invalidemail"){
        echo "<p style= 'color: red;' > Invalid email, choose a proper email! </p>";
    }

    else if($_GET["error"] == "pwdsdontmatch"){
        echo "<p style= 'color: red;' > Passwords do not match! </p>";
    }

    else if($_GET["error"] == "usernametaken"){
        echo "<p style= 'color: red;' >  Username already exists, choose another one! </p>";
    }
    else if ($_GET["error"] == "stmtfailed"){
        echo "<p style= 'color: red;' > Something went wrong, try again! </p>";
    }
    else if($_GET["error"] == "none"){
        echo "<p style = 'color: green;'> You signed up! </p>";
    }
    else if($_GET["error"] == "wrongdata"){
        echo "<p style = 'color: red;'> Incorrect username or password! </p>";
    }

    