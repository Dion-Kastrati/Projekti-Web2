<?php 

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "../db/db-inc.php";
    require_once "functions.inc.php";

    if(emptyInputLogin($username, $password) !== false){
        header('location: ../login.php?error=emptyinput');
        exit();
    }

    loginUser($conn, $username, $password);
}
else{
    header("Location: ../login.php");
    exit();
}