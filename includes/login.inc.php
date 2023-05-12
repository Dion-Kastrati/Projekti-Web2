<?php 

    include_once 'db/db-inc.php';

    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = 'SELECT * 
    FROM tblusers
    WHERE username = $username 
    AND hashedPassword = $hashedPassword;
    ';

    $results = mysqli_query($conn, $sql);
    $rowNums = mysqli_num_rows($results);

    if($rowNums > 0){
        header('Location: index.php'); 
    }
    else{
        echo "
            <script>
                alert('Incorrect username or password!')
            </script>
        ";
        header('Location: login.php');
    }

?>