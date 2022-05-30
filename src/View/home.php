

<body>


<div class="site-wrap" id="home-section">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Car Rental</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>

            </ul>

        </div>
        <?php
        if (!isset($_COOKIE["X-SESSION"])) {
            echo '<a class="nav-link" href="/login">Login</a>';
        }
        ?>



        </ul>
        <form class="d-flex" method="post" action="logout">
            <?php
            if (isset($_COOKIE["X-SESSION"])) {
                echo '<form action="logout" method="post">';
                echo ' <div class="nav-item">';
                echo ' <a class="nav-link d-inline-block">Hello ' . $_COOKIE["X-SESSION-USERNAME"] . '</a>';
                echo ' </div>';
                echo ' <button class="btn btn-lg btn-primary h-25" type="submit">Sign out</button>';
                echo '</form>';
            }
            ?>
    </nav>


    <div class="site-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center order-lg-2">
                    <div class="img-wrap-1 mb-5">
                        <img src="assets/images/feature_01.png" alt="Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4 ml-auto order-lg-1">
                    <h3 class="mb-4 section-heading"><strong>You can easily avail our promo for renting a car.</strong>
                    </h3>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, explicabo
                        iste a labore id est quas, doloremque veritatis! Provident odit pariatur dolorem quisquam,
                        voluptatibus voluptates optio accusamus, vel quasi quidem!</p>

                    <p><a href="#" class="btn btn-primary">Meet them now</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-heading"><strong>Car Listings</strong></h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img h-100 mr-4">
                            <img src="assets/images/car_6.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="listing-contents h-100">
                            <h3>Mitsubishi Pajero</h3>
                            <div class="rent-price">
                                <strong>$389.00</strong><span class="mx-1">/</span>day
                            </div>
                            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Luggage:</span>
                                    <span class="number">8</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number">4</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number">4</span>
                                </div>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem
                                    quibusdam.</p>
                                <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img h-100 mr-4">
                            <img src="assets/images/car_5.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="listing-contents h-100">
                            <h3>Nissan Moco</h3>
                            <div class="rent-price">
                                <strong>$389.00</strong><span class="mx-1">/</span>day
                            </div>
                            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Luggage:</span>
                                    <span class="number">8</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number">4</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number">4</span>
                                </div>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem
                                    quibusdam.</p>
                                <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img h-100 mr-4">
                            <img src="assets/images/car_4.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="listing-contents h-100">
                            <h3>Honda Fitta</h3>
                            <div class="rent-price">
                                <strong>$389.00</strong><span class="mx-1">/</span>day
                            </div>
                            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Luggage:</span>
                                    <span class="number">8</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number">4</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number">4</span>
                                </div>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem
                                    quibusdam.</p>
                                <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img h-100 mr-4">
                            <img src="assets/images/car_3.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="listing-contents h-100">
                            <h3>Skoda Laura</h3>
                            <div class="rent-price">
                                <strong>$389.00</strong><span class="mx-1">/</span>day
                            </div>
                            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Luggage:</span>
                                    <span class="number">8</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number">4</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number">4</span>
                                </div>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem
                                    quibusdam.</p>
                                <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img h-100 mr-4">
                            <img src="assets/images/car_2.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="listing-contents h-100">
                            <h3>Mazda LaPuta</h3>
                            <div class="rent-price">
                                <strong>$389.00</strong><span class="mx-1">/</span>day
                            </div>
                            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Luggage:</span>
                                    <span class="number">8</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number">4</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number">4</span>
                                </div>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem
                                    quibusdam.</p>
                                <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img h-100 mr-4">
                            <img src="assets/images/car_1.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="listing-contents h-100">
                            <h3>Buick LaCrosse</h3>
                            <div class="rent-price">
                                <strong>$389.00</strong><span class="mx-1">/</span>day
                            </div>
                            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Luggage:</span>
                                    <span class="number">8</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number">4</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number">4</span>
                                </div>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem
                                    quibusdam.</p>
                                <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <footer class="site-footer">
        <div class="container">

            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            <i class="icon-heart text-danger" aria-hidden="true"></i> by To Le Hoai</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

</div>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.animateNumber.min.js"></script>
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/aos.js"></script>

<script src="assets/js/main.js"></script>

</body>

</html>