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

    function usernameExistsLogin($conn, $username){
        $sql = "SELECT * FROM tblusers WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: ../register.php?error=stmtfailed');
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return false;
        }
        else{
            $result = true;
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
            $_SESSION["password"] = $password;

            if($usernameExists["user_role"] == "Normal user"){
                header("Location: ../index.php?");
                exit();
            }
            else if($usernameExists["user_role"] == "Admin"){
                header("Location: ../admin/adminDashboard.php");
                exit();
            }
            exit();
        }
    }

    function editUserData($conn, $username, $fullname, $email, $password){
        $usernameExists = usernameExists($conn, $username, $username);
        $_SESSION['userid'] = $usernameExists["user_id"];
        if(isset($_POST["save"])){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE tblusers
                      SET username = '$username', fullname = '$fullname', email = '$email', hashedPassword = '$hashedPassword'
                      WHERE user_id = ".$_SESSION['userid']."";
            $resutls = mysqli_query($conn, $query);

            if($results){
                echo "Data updated successfully";
            }
            else {
                echo "Data not updated";
            }
            mysqli_close($conn);
            

            header("location: ../profile.php?edit=false");
            exit();
    }
}

    //Edit data functions


    function emptyInputEdit($fullname, $username, $email, $password, $pwdRepeat){
        $result;
        if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($pwdRepeat)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function changeProfilePic($conn, $profilePic){
        
    }

    function addFavorites($conn, $userId, $username, $bookId){
        if (isset($_POST['favbtn'])) {
            // Insert the favorite into the tblfavorites table
            // Prepare the statement
            $stmt = mysqli_prepare($conn, "INSERT INTO tblfavorites (user_id, username, book_id) VALUES (?, ?, ?)");
        
            if ($stmt) {
                // Bind the values to the statement
                if (mysqli_stmt_bind_param($stmt, "isi", $userId, $username, $bookId)) {
                    // Execute the statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Success
                        echo "Statement executed successfully.";
                        header("location: ../shop.php");
                        exit();
                    } else {
                        // Check for duplicate primary key error
                        if (mysqli_errno($conn) === 1062) {
                            // Duplicate primary key error occurred
                            echo "Duplicate primary key error. This favorite already exists.";
                            header("location: ../shop.php");
                            exit();
                        } else {
                            // Error during execution
                            echo "Error executing statement: " . mysqli_stmt_error($stmt);
                            header("location: ../shop.php");
                            exit();
                        }
                    }
                } else {
                    // Error binding parameters
                    echo "Error binding parameters: " . mysqli_stmt_error($stmt);
                    header("location: ../shop.php");
                    exit();
                }
        
                mysqli_stmt_close($stmt);
            } else {
                // Error preparing statement
                echo "Error preparing statement: " . mysqli_error($conn);
                header("location: ../shop.php");
                exit();
            }
        }        

            header("location: ../shop.php");
            exit();
        }
    
    function justArrivedAddFavorites($conn, $userId, $username, $bookId){
        if (isset($_POST['favbtn'])) {
            // Insert the favorite into the tblfavorites table
            // Prepare the statement
            $stmt = mysqli_prepare($conn, "INSERT INTO tblfavorites (user_id, username, book_id) VALUES (?, ?, ?)");
        
            if ($stmt) {
                // Bind the values to the statement
                if (mysqli_stmt_bind_param($stmt, "isi", $userId, $username, $bookId)) {
                    // Execute the statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Success
                        echo "Statement executed successfully.";
                        header("location: ../shop.php");
                        exit();
                    } else {
                        // Check for duplicate primary key error
                        if (mysqli_errno($conn) === 1062) {
                            // Duplicate primary key error occurred
                            echo "Duplicate primary key error. This favorite already exists.";
                            header("location: ../shop.php");
                            exit();
                        } else {
                            // Error during execution
                            echo "Error executing statement: " . mysqli_stmt_error($stmt);
                            header("location: ../shop.php");
                            exit();
                        }
                    }
                } else {
                    // Error binding parameters
                    echo "Error binding parameters: " . mysqli_stmt_error($stmt);
                    header("location: ../shop.php");
                    exit();
                }
        
                mysqli_stmt_close($stmt);
            } else {
                // Error preparing statement
                echo "Error preparing statement: " . mysqli_error($conn);
                header("location: ../shop.php");
                exit();
            }
        
            header("location: ../index.php");
            exit();
        }
    }


        function addToCart($conn, $userId, $bookId){
            if (isset($_POST['cartbtn'])) {                
                // Prepare the statement to insert into tblcart
                $stmt = mysqli_prepare($conn, "INSERT INTO tblcart (user_id, book_id) VALUES (?, ?)");
                
                if ($stmt) {
                    // Bind the values to the statement
                    mysqli_stmt_bind_param($stmt, "ii", $userId, $bookId);
                    
                    // Execute the statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Success
                        echo "Book added to the cart successfully.";
                        mysqli_stmt_close($stmt);
                        
                        // Reduce the quantity in stock in tblbooks
                        $updateStmt = mysqli_prepare($conn, "UPDATE tblbooks SET quantity = quantity - 1 WHERE book_id = ?");
                        
                        if ($updateStmt) {
                            // Bind the book ID to the update statement
                            mysqli_stmt_bind_param($updateStmt, "i", $bookId);
                            
                            // Execute the update statement
                            if (mysqli_stmt_execute($updateStmt)) {
                                // Success
                                echo "Quantity updated successfully.";
                                mysqli_stmt_close($updateStmt);
                                header("Location: ../cart.php");
                                exit();
                            } else {
                                // Error executing the update statement
                                echo "Error updating quantity: " . mysqli_stmt_error($updateStmt);
                                mysqli_stmt_close($updateStmt);
                                header("Location: ../cart.php");
                                exit();
                            }
                        } else {
                            // Error preparing the update statement
                            echo "Error preparing quantity update statement: " . mysqli_error($conn);
                            header("Location: ../cart.php");
                            exit();
                        }
                    } else {
                        // Error executing the insert statement
                        echo "Error adding book to cart: " . mysqli_stmt_error($stmt);
                        mysqli_stmt_close($stmt);
                        header("Location: ../cart.php");
                        exit();
                    }
                } else {
                    // Error preparing the insert statement
                    echo "Error preparing insert statement: " . mysqli_error($conn);
                    header("Location: ../cart.php");
                    exit();
                }
            }
}   