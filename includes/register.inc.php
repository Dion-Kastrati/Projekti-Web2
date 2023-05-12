<?php 
    include_once '../db/db-inc.php';
    
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $date = date('Y-m-d');

        $checkQuery = " SELECT *
                        FROM tblusers
                        WHERE username = '$username'
                        OR email = '$email';";
        
        $chckResults = mysqli_query($conn, $checkQuery);
        $count = mysqli_num_rows($chckResults);

        if($count == 0) {
            $sql = "INSERT INTO tblusers(user_id, username, fullname, email, user_role,  hashedPassword, reg_date)
            values ('$nextID' ,'$username', '$fullname', '$email', '$role', '$hashedPassword', '$date');";
            mysqli_query($conn, $sql);
            header('Location: ../index.php'); 
        }
        else{
            echo "
                <script> 
                    alert('Username or email aready used!');
                </script>
            ";
            header('Location: register.php');
        }

?>