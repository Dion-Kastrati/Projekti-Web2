<?php 

    include_once '../db/db-inc.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $adminRole = "Admin";
    

    $sql = "SELECT * 
            FROM tblusers
            WHERE username = '$username';
            ";

    $results = mysqli_query($conn, $sql);
    $rowNums = mysqli_num_rows($results);

        // Check password and username if they match
        // Prepare and execute the SQL query
        $query = "SELECT hashedPassword FROM tblusers WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        // Bind the result and fetch the hashed password
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Close the statement
        $stmt->close();
        $userPassword = password_verify($password, $hashedPassword);

        // If user is admin select his role
        $adminQuery = "SELECT user_role FROM tblusers WHERE user_role = ?";
        $admstmt = $conn->prepare($adminQuery);
        $admstmt->bind_param("s", $adminRole);
        $admstmt->execute();

        // Bind the result and fetch the hashed password
        $admstmt->bind_result($userRole);
        $admstmt->fetch();

        // Close the admin statement and database connection
        $admstmt->close();
        $conn->close();

    if ($rowNums != 0 && $userPassword && $userRole == "Admin"){
        header ('Location ../admin/adminDashboard.php');
    }
    else if($rowNums != 0 && $userPassword){
        header('Location: ../index.php'); 
    }
    else{
        echo "
            <script> 
            var element = document.getElementById('warning');
            element.style.display = 'block';
            alert('Incorrect username or password!');
            </script>
        ";
    }