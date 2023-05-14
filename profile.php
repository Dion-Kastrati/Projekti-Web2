<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>eLibrary</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="./css/login.css">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Costumized design of the page -->
    <link href="./css/profile.css" rel="stylesheet">
</head>
<body>
    <!-- Top bar start -->
        <?php include "includes/profileTopbar.php"; ?>
    <!-- Top bar end -->

    <!-- Nav Bar start -->
    <?php include "includes/profileNavbar.php"; ?>
    <!-- Nav bar end -->

    <div class = "profile-card">
        <?php 
            if(isset($_SESSION["userid"])){
                echo "
                <img class='img' src=" .$_SESSION['profilePic']." alt=''>
                <div class='infos'>
                        <div class='infos-data'>
                            <h3 class='category'>Username: </h3>
                            <h3 class='data'>".$_SESSION['username']."</h3>
                        </div>
                        <div class='infos-data'>
                            <h3 class='category'>Fullname: </h3>
                            <h3 class='data'>".$_SESSION['fullname']."</h3>
                        </div>
                        <div class='infos-data'>
                            <h3 class='category'>Email: </h3>
                            <h3 class='data'>".$_SESSION['email']."</h3>
                        </div>
                        <div class='infos-data'>
                            <h3 class='category'>Role: </h3>
                            <h3 class='data'>".$_SESSION['user_role']."</h3>
                        </div>

                        <div class='button'>
                            <button class='btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3 edit' type='submit' name='submit'>Edit</button>
                        </div>
                </div>";
            }
        ?>
    </div>
</body>
</html>