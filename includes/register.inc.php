<?php 

    if(isset($_POST['submit'])){

        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $pwdRepeat = $_POST["pwdrepeat"];
        $userRole = "Normal User";
        $adminRole = "Admin";

        include_once '../db/db-inc.php';
        include_once 'functions.ini.php';

        if(emptyInputSignup($fullname, $username, $email, $password, $pwdRepeat) !== false){
            header("location: ../register.php?error=emptyinput");
            exit();
        }

        if(invalidUsername($username) !== false){
            header("location: ../register.php?error=invalidusername");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: ../register.php?error=invalidemail");
            exit();
        }

        if(pwdMatch($password, $pwdRepeat) !== false){
            header("location: ../register.php?passwordsdontmatch");
            exit();
        }
        if(usernameExist($conn, $username) !== false){
            header("location: ../register.php?error=usernametaken");
            exit();
        }
        if(emailExist($conn, $email) !== false){
            header("location: ../register.php?error=emailtaken");
            exit();
        }

        createUser($conn, $username, $fullname, $email, $password, $user_role);

    }
    else{
        header("location: ../index.php");
        exit();
    }