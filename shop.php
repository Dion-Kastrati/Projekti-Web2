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
        <?php
        include 'includes/navbar.php';
        ?>
        <!-- Navbar End -->


        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Books</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="index.php">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Books</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Shop Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <!-- Shop Sidebar Start -->
                <div class="col-lg-3 col-md-12">
                    <!-- Price Start -->
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                        <form>
                            <div
                                class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-all" name="price" value="all"
                                    checked>
                                <label class="custom-control-label" for="price-all">All Price</label>
                                <span class="badge border font-weight-normal"><!-- Me ni select me bo sa libra jon me qit qmim edhe me qit qitu--></span>
                            </div>
                            <div
                                class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-1" name="price" value="0-10">
                                <label class="custom-control-label" for="price-1">0€ - 10€</label>
                                <span class="badge border font-weight-normal"><!-- Me ni select me bo sa libra jon me qit qmim edhe me qit qitu--></span>
                            </div>
                            <div
                                class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-2" name="price"
                                    value="11-20">
                                <label class="custom-control-label" for="price-2">11€ - 20€</label>
                                <span
                                    class="badge border font-weight-normal"><!-- Me ni select me bo sa libra jon me qit qmim edhe me qit qitu--></span>
                            </div>
                            <div
                                class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-3" name="price"
                                    value="21-30">
                                <label class="custom-control-label" for="price-3">21€ - 30€</label>
                                <span
                                    class="badge border font-weight-normal"><!-- Me ni select me bo sa libra jon me qit qmim edhe me qit qitu--></span>
                            </div>
                            <div
                                class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-4" name="price"
                                    value="31-40">
                                <label class="custom-control-label" for="price-4">31€ - 40€</label>
                                <span
                                    class="badge border font-weight-normal"><!-- Me ni select me bo sa libra jon me qit qmim edhe me qit qitu--></span>
                            </div>
                            <div class="custom-control custom-radio d-flex align-items-center justify-content-between">
                                <input type="radio" class="custom-control-input" id="price-5" name="price" value="41+">
                                <label class="custom-control-label" for="price-5">41€+</label>
                                <span
                                    class="badge border font-weight-normal"><!-- Me ni select me bo sa libra jon me qit qmim edhe me qit qitu--></span>
                            </div>
                        </form>
                    </div>
                    <!-- Price End -->
                </div>
                <!-- Shop Sidebar End -->


                <!-- Shop Product Start -->
                <div class="col-lg-9 col-md-12">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <form action="search.php">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by name">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-transparent text-primary">
                                                <button type="submit" class="btn btn-primary" style="font-size: 1pt">
                                                    <i class="fa fa-search" style="font-size: 1rem;"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <div class="dropdown ml-4">
                                    <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Newest</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin:0" class="row col-12 pb-1">
                        <?php
                            include "includes/libri.php";
                        ?>
                        </div>
                        
                        <div class="col-12 pb-1">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-3">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Shop Product End -->
            </div>
        </div>
        <!-- Shop End -->


        <!-- Footer Start -->
        <?php
        include 'includes/footer.php';
        ?>
        <!-- Footer End -->


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