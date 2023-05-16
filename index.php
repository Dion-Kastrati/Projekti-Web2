<?php include_once './db/db-inc.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLibrary</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
    <!-- Topbar Start -->
    <?php
    include 'includes/topbar.php';
    ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
        <?php include "./includes/navbar.php"; ?>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <?php include 'includes/featured.php'?>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Men's dresses</h5>
                </div>
            </div>


        </div>
    </div>


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php

            $sql = "
                            select *
                            from tblbooks
                            WHERE arrival_date >= (SELECT addDate(curdate(), INTERVAL -7 day));
                    ";
            $results = mysqli_query($conn, $sql);
            $resultsCheck = mysqli_num_rows($results);
            include 'includes/libri.php';
            ?>

            <!-- Vendor Start -->
            <div class="container-fluid py-5">
                <div class="row px-xl-5">
                    <div class="col">
                        <div class="owl-carousel vendor-carousel">
                            <div class="vendor-item border p-4">
                                <img src="img/vendor-1.jpg" alt="">
                            </div>
                            <div class="vendor-item border p-4">
                                <img src="img/vendor-2.jpg" alt="">
                            </div>
                            <div class="vendor-item border p-4">
                                <img src="img/vendor-3.jpg" alt="">
                            </div>
                            <div class="vendor-item border p-4">
                                <img src="img/vendor-4.jpg" alt="">
                            </div>
                            <div class="vendor-item border p-4">
                                <img src="img/vendor-5.jpg" alt="">
                            </div>
                            <div class="vendor-item border p-4">
                                <img src="img/vendor-6.jpg" alt="">
                            </div>
                            <div class="vendor-item border p-4">
                                <img src="img/vendor-7.jpg" alt="">
                            </div>
                            <div class="vendor-item border p-4">
                                <img src="img/vendor-8.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vendor End -->

            <!-- footer start -->
            <?php
            include 'includes/footer.php';
            ?>
            <!-- footer end -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Contact Javascript File -->
            <script src="mail/jqBootstrapValidation.min.js"></script>
            <script src="mail/contact.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
</body>

</html>