<?php if ($resultsCheck > 0) {
                        while ($row = mysqli_fetch_assoc($results)) { // Krejt te dhenat qe i kemi marr prej $results me i rujt si varch te $row
                    
                            echo "<div class='col-lg-3 col-md-6 col-sm-12 pb-1'>
                            <div class='card product-item border-0 mb-4'>
                                <div class='card-header product-img position-relative overflow-hidden bg-transparent border p-0'>
                                    <img style = 'height: 500px' class='img-fluid w-100' src=" . $row['book_photo'] . " alt=''>
                                </div>
                                <div class='card-body border-left border-right text-center p-0 pt-4 pb-3'>
                                    <h6 class='text-truncate mb-3'>" . $row['book_title'] . "</h6>
                                    <div class='d-flex justify-content-center'>
                                        <h6>" . $row['price'] . "€</h6>
                                    </div>
                                </div>
                                <div class='card-footer d-flex justify-content-between bg-light border'>
                                    <a href='' class='btn btn-sm text-dark p-0'><i class='fas fa-shopping-cart text-primary mr-1'></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>";
                        }

                    }
?>