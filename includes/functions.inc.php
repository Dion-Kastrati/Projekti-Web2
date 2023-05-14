<?php 

    // Sign up functions
    function emptyInputSignup($fullname, $username, $email, $password, $pwdRepeat){
        $result;
        if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($pwdRepeat)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidUsername($username){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function pwdMatch($password, $pwdRepeat){
        $result;
        if($password !== $pwdRepeat){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function usernameExists($conn, $username, $email){
        $sql = "SELECT * FROM tblusers WHERE username = ? OR email = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: ../register.php?error=stmtfailed');
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function wrongUsername($conn, $username, $password){
        $sql = "SELECT * FROM tblusers WHERE username = ? AND hashedPassword = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: ../register.php?error=stmtfailed');
            exit();
        }



        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function  createUser($conn, $username, $fullname, $email, $password, $userRole){
        $sql = "INSERT INTO tblusers(username, fullname, email, hashedPassword, user_role) VALUES(?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
       
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: ../register.php?error=stmtfailed');
            exit();
        }

        $normalUser = "Normal user";

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $username, $fullname, $email, $hashedPassword, $normalUser);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header('location: ../register.php?error=none');
        exit();
    }

    


    //Login functions    
    function emptyInputLogin($username, $password){
        $result;
        if(empty($username) || empty($password)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $password){
        $usernameExists = usernameExists($conn, $username, $username); // Logjika OR ne funksionin me larte me emrin e njejt ne lejon qe njera prej 
                                                                       // dy kushteve te plotesohet qe useri ose te vendos emailin ose usernamein
        if($usernameExists === false){
            header("Location ../login.php?error=worngdata");
            exit();
        }

        $hashedPassword = $usernameExists["hashedPassword"]; // Pasi qe usernameExist eshte nje funksion qe merr te dhenat ne metoden asocc 
                                                            // ne mund te marrim emrin e nje kolone ne db dhe me nxierr te dhena prej saj
        $plainPassword = password_verify($password, $hashedPassword);

        if($plainPassword === false){
            header("Location: ../login.php?error=wrongdata");
            exit();
        }

        else if($plainPassword === true){
            session_start();
            $_SESSION["fullname"] = $usernameExists["fullname"];
            $_SESSION["userid"] = $usernameExists["user_id"];
            $_SESSION["username"] = $usernameExists["username"];
            $_SESSION["profilePic"] = $usernameExists["profile_pic"];
            $_SESSION["email"] = $usernameExists["email"];
            $_SESSION["user_role"] = $usernameExists["user_role"];
            if($usernameExists["user_role"] == "Normal user"){
                header("Location: ../index.php?");
                exit();
            }
            else if($usernameExists["user_role"] == "Admin"){
                header("Location: ../admin/adminDashboard.php");
                exit();
            }
        }
    }