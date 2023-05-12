<?php 
include_once './db/db-inc.php'; 
?>

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
</head>

<body>

    <!-- Navbar Start -->
    <?php
    include 'includes/navbar.php';
    ?>
    <!-- Navbar End -->

    <div class='container-fluid pt-5'>

        <div class='row px-xl-5 middle'>

            <form class='form-group' action="includes/register.inc.php" method="POST">
                <div class="col-md-6 form-group">
                    <label>Fullname</label>
                    <input name='fullname' class="form-control" type="text" placeholder="John Doe">
                </div>

                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input name='email' class="form-control" type="email" placeholder="johndoe23@example.com">
                </div>


                <div class="col-md-6 form-group">
                    <label>Username</label>
                    <input name='username' class="form-control" type="text" placeholder="johndoe23">
                </div>

                <div class="col-md-6 form-group">
                    <label>Password</label>
                    <input name='password' class="form-control" type="password" placeholder="Password">
                </div>


                <div class='col-md-6 form-group '>
                    <label>Role</label>
                    <select name='role' class='custom-select'>
                        <option selected>Normal User</option>
                        <option>Admin</option>
                    </select>
                </div>

                <div style = 'color: red;'  class='col-md-6 form-group'>
                    <p name='message' id = 'warning'></p>
                </div>

                <div class="card-footer border-secondary bg-transparent login">
                    <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Sign
                        up</button>
                </div>


            </form>

        </div>

    </div>


</body>

</html>