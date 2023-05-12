<?php include_once './db/db-inc.php'; ?>

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
    <style>
        #warning {
            display: none;
        }
    </style>
</head>

<body>


    <!-- Topbar Start -->
    <?php
    include 'includes/topbar.php';
    ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
    include 'includes/navbar.php';
    ?>
    <!-- Navbar End -->

    <div class='container-fluid pt-5'>

        <div class='row px-xl-5 middle'>

            <form  class = 'form-group' action='includes/login.inc.php' method = 'POST'>
            <div class="col-md-6 form-group">
                <label>Username</label>
                <input require name='username' class="form-control" type="text" placeholder="johndoe23">
            </div>

            <div class="col-md-6 form-group">
                <label>Password</label>
                <input require name='password' class="form-control" type="password" placeholder="Password">
            </div>

            <div class="col-md-6 form-group">
                <p id = "warning">Incorrect username or password</p>
            </div>

            <div class="card-footer border-secondary bg-transparent login">
                <button type='submit' class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Sign in</button>
            </div>


            </form>

        </div>

    </div>


</body>

</html>