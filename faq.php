<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>FAQ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style type="text/css">
    body {
      background: #eee;
      padding-top: 20px;
      font-family: monospace;
    }

    .header {
      border-radius: 20px 20px 0px 0px;
      padding: 10px 0px;
      background: #D19C97;
      color: #fff;
      width: 100%;
      display: flex;
      align-content: center;
      justify-content: center;
    }

    .faq-item {
      margin-bottom: 40px;
      margin-top: 40px;
    }

    .faq-body {
      display: none;
      margin-top: 30px;
    }

    .faq-wrapper {
      width: 150%;
      margin: 0 auto;
    }

    .faq-inner {
      padding: 30px;
      background: white;
    }

    .faq-plus {
      float: right;
      font-size: 1.4em;
      line-height: 1em;
      cursor: pointer;
    }

    hr {
      background-color: #9b9b9b;
    }
  </style>

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
      <h1 class="font-weight-semi-bold text-uppercase mb-3">FAQs</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="index.php">Home</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">FAQs</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->


  <body>
    <div class="container">
      <div class="row">
        <div class="faq-wrapper">
          <div class="faq-inner">
            <div class="faq-item">
              <h3>
                What is an FAQ page ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
              </div>
            </div>
            <hr>
            <div class="faq-item">
              <h3>
                What is an FAQ page ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
              </div>
            </div>
            <hr>
            <div class="faq-item">
              <h3>
                What is an FAQ page ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
              </div>
            </div>
            <hr>
            <div class="faq-item">
              <h3>
                What is an FAQ page ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
              </div>
            </div>
            <hr>
            <div class="faq-item">
              <h3>
                What is an FAQ page ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(".faq-plus").on('click', function () {
        $(this).parent().parent().find('.faq-body').slideToggle();
      });
    </script>
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