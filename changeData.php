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
    <link href="./css/changeData.css" rel="stylesheet">
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
                            <div class='category'>
                                <h3 >Username: </h3>
                            </div>
                           
                            <div class='edit-data'>
                                <h3 class='data'>".$_SESSION['username']."</h3>
                                <i class='fa fa-solid fa-wrench edit-tool'></i>
                            </div>
                        </div>
                        <div class='infos-data'>
                        <div class='category'>
                                <h3 >Fullname: </h3>
                            </div>
                            <div class='edit-data'>
                                <h3 class='data'>"  .$_SESSION['fullname']."</h3>
                                <i class='fa fa-solid fa-wrench edit-tool'></i>
                            </div>
                        </div>
                        <div class='infos-data'>
                        <div class='category'>
                                <h3 >Email: </h3>
                            </div>
                            <div class='edit-data'>
                                <h3 class='data'>".$_SESSION['email']."</h3>
                                <i class='fa fa-solid fa-wrench edit-tool'></i>
                            </div>
                        </div>
                        <div class='infos-data'>
                        <div class='category'>
                                <h3 >Role: </h3>
                            </div>
                            <div class='edit-data'>
                            <h3 class='data'>".$_SESSION['user_role']."</h3>
                            <i style='color:white !important' class='fa fa-solid fa-wrench edit-tool'></i>
                        </div>           
                        </div>";
                    }
                    ?>
    </div>
</body>
</html>