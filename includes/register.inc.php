<?php 
    include_once '../db/db-inc.php';
    
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $date = date('Y-m-d');

        function nextID(){
            $sqlCount = "SELECT count(*)
                         FROM student s
                         ORDER BY s.snum
                         LIMIT 1;";
            return $sqlCount + 1;
        }

        //TODO: Add a function that checks if the email is already used
        //TODO: Username unik

    $sql = "INSERT INTO tblusers(user_id, username, fullname, email, user_role,  hashedPassword, reg_date)
            values ('$nextID' ,'$username', '$fullname', '$email', '$role', '$hashedPassword', '$date');";
    mysqli_query($conn, $sql);

    header('Location: ../login.php'); 


?>