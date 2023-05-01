<?php 
    include_once '../db/db-inc.php';

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tblusers(username, fullname, email, password)
            values ('$username', '$fullname', '$email', '$role', '$hashedPassword' );";
    mysqli_query($conn, $sql);

    header('Location: ../login.php'); //Masi te bahemi signup na qon tek log in me bo sign in


?>