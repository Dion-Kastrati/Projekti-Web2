<?php 

    function emptyInputSignup($fullname, $username, $email, $password, $pwdRepeat){
        $result;
        if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($pwdRepeat)){
            $result = true;
        }
        else{
            $result = false;
        }
    }

    function invalidUsername($username){
        $result;
        if(preg_match("/^[a-zA-Z0-9-_]*$/", $username)){ // Lejon qe username me pas veq shkronja t'mdha t vogla edhe numra dmth nuk ka simbole
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function invalidEmail($email){
        $result;
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Validon nese inputi i dhene te rubrika e email eshte acrually email
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function pwdMatch($password, $pwdRepeat){
        $result;
        if($password !== $pwdRepeat){ // Validon nese inputi i dhene te rubrika e email eshte acrually email
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function usernameExist($conn, $username){
        $sql = "SELECT * FROM tblusers WHERE username = ?;";
        $stmt = mysqli_stmt_init();
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $username); // Parametri i pare tregon cilit prepared statement me ja qu paramterin e 3 dhe 4, 
                                                       //parametri i 2 kallxon tipin e parametrit te 3 dhe 4
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt) // marrim rezultatet prej prepared statement-it

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $row = false;
            return $row;
        }

        mysqli_stmt_close($stmt); // $stmt->close();
    }  
    
    function emailExist($conn,  $email){
        $sql = "SELECT * FROM tblusers WHERE email = ?;";
        $stmt = mysqli_stmt_init();
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email); // Parametri i pare tregon cilit prepared statement me ja qu paramterin e 3 dhe 4, 
                                                       //parametri i 2 kallxon tipin e parametrit te 3 dhe 4
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt) // marrim rezultatet prej prepared statement-it

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $row = false;
            return $row;
        }

        mysqli_stmt_close($stmt); // $stmt->close();
    }  

    function createUser($conn, $username, $fullname, $email, $password, $user_role){
        $sql = "INSERT INTO tblusers(username, fullname, email, hashedPassword, user_role) VALUES (?, ?, ?, ?, ?); ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?error=stmtfailed");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $username, $fullname, $email, $hashedPassword, $user_role ); // Parametri i pare tregon cilit prepared statement me ja qu paramterin e 3 dhe 4, 
                                                       //parametri i 2 kallxon tipin e parametrit te 3 dhe 4
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt); // $stmt->close();
        header("location: ../register.php?error=none");
        exit();
    }

    // function createAdmin($conn, $username, $fullname, $email, $password, $user_role){
    //     $sql = "INSERT INTO tblusers(username, fullname, email, hashedPassword, user_role ) VALUES(?,?,?,?,?); ";
    //     $stmt = mysqli_stmt_init();
    //     if(!mysqli_stmt_prepare($stmt, $sql)){
    //         header("location: ../register.php?error=stmtfailed");
    //         exit();
    //     }

    //     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //     mysqli_stmt_bind_param($stmt, "sssss", $username, $fullname, $email, $hashedPassword, "Admin" ); // Parametri i pare tregon cilit prepared statement me ja qu paramterin e 3 dhe 4, 
    //                                                    //parametri i 2 kallxon tipin e parametrit te 3 dhe 4
    //     mysqli_stmt_execute($stmt);
    //     mysqli_stmt_close($stmt); // $stmt->close();
    //     header("location: ../register.php?error=adminnone");
    //     exit();
    // }