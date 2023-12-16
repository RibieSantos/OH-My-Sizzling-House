<!doctype html>
<html lang="en">

<head>
    <title>Welcome</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">


    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/custom.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/aos/aos.css" rel="stylesheet') }}">
    <link href="{{ URL::asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('assets/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('fontawesome-free-6.4.2-web/css/all.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="{{ URL::asset('assets/images/logo.jpg') }}" class="logo" alt="">

            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->
            <div class="dropdown open">
                <button class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Login
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="{{ route('admin.login') }}">Admin</a>
                    <a class="dropdown-item" href="{{ route('login') }}">Customer</a>

                </div>
                <a href="{{ route('register') }}" class="btn">Register</a>

            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">Welcome to <br><span>Oh! My Sizzling House</span> <br><p class="h1 fw-bold">Enjoy Your Delicious <span>Sizzling Food</span> </p></h2>
                    <p data-aos="fade-up" data-aos-delay="100">Savor the irresistible combination of savory, crispy pork
                        bits, perfectly seasoned with a medley of spices and aromatics, as our Sizzling Sisig delights
                        your taste buds with its tantalizing flavors and mouthwatering goodness. </p>

                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ URL::asset('assets/images/sisig-png-1-Transparent-Images-Free.png') }}"
                        class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>About Us</h2>
                    <p>Learn More <span>About Us</span></p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-7 position-relative about-img"
                        style="background-image: url({{ URL::asset('assets/images/BangusSisig.jpg') }}) ;"
                        data-aos="fade-up" data-aos-delay="150">
                        <div class="call-us position-absolute">
                            <h4>Contact Us</h4>
                            <p>0927 221 2221</p>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">
                                Welcome to Oh! My Sizzling Sisig House, your ultimate destination for savoring the
                                finest and most
                                delicious sisig dishes right at your doorstep. Our journey began with a deep passion for
                                Filipino cuisine and a commitment to serving our customers with mouthwatering, sizzling
                                sisig in the most convenient way possible.
                            </p>
                            <ul>
                                <li><i class="fa fa-check2-all"></i>Oh! My Sizzling Sisig House was born out of a
                                    love for the rich and diverse flavors of Filipino food. Founded in [Year], we
                                    embarked on a mission to bring the traditional flavors of sisig, a beloved Filipino
                                    dish, to the digital age. With the goal of providing a convenient and enjoyable
                                    ordering experience for sisig enthusiasts, we created an online platform where you
                                    can explore our menu, place your orders, and have your favorite sisig dishes
                                    delivered to your doorstep in just a few clicks.</li>
                                <li><i class="fa fa-check2-all"></i> At OH! My Sizzling Sisig House, we take great pride
                                    in the
                                    authenticity and quality of our sisig. Our experienced chefs craft each dish with
                                    precision and passion, using the finest ingredients and traditional cooking methods.
                                    We offer a variety of sisig options, from classic pork sisig to unique vegetarian
                                    alternatives, ensuring there's something to delight every palate.</li>

                            </ul>
                            <p>
                                Thank you for choosing OH! My Sizzling Sisig House as your sisig destination. We look
                                forward to serving you the best sisig dishes with love, flavor, and convenience.
                            </p>


                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Menu</h2>
                    <p>Check Our <span>Sizzling Sisig Menu</span></p>
                </div>

                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($cat as $cats)
                        <li class="nav-item">
                            <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#{{ $cats->cat_title }}">
                                <h4>{{ $cats->cat_title }}</h4>
                            </a>
                        </li><!-- End tab nav item -->
                    @endforeach
                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                    @foreach ($cat as $cats)
                        <div class="tab-pane fade show" id="{{ $cats->cat_title }}">
                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>{{ $cats->cat_title }}</h3>
                            </div>

                            <div class="row gy-5">
                                @foreach ($menu as $menus)
                                    @if ($menus->menu_cat == $cats->id)
                                        <div class="col-lg-4 menu-item">
                                            <a href="{{ $menus->menu_image }}" class="glightbox"><img
                                                    src="{{ $menus->menu_image }}" class="menu-img img-fluid"
                                                    alt=""></a>
                                            <h4>{{ $menus->menu_title }}</h4>
                                            <p class="ingredients">{{ $menus->menu_description }}</p>
                                            <p class="price">{{ $menus->menu_price }}</p>
                                        </div><!-- Menu Item -->
                                    @endif
                                @endforeach
                            </div><!-- End row -->
                        </div><!-- End Starter Menu Content -->
                    @endforeach
                </div>
            </div>
        </section><!-- End Menu Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Contact</h2>
                    <p>Need Help? <span>Contact Us</span></p>
                </div>

                <div class="mb-3">
                    <iframe style="border:0; width: 100%; height: 350px;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d958.8787584158589!2d120.57222886943163!3d15.986682799042567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33913f36c024ffbb%3A0x2220ea8e51316f8f!2sOh%20my%20sizzling%20house!5e0!3m2!1sen!2sph!4v1697256551074!5m2!1sen!2sph"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="row gy-4">

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon fa fa-map flex-shrink-0"></i>
                            <div>
                                <h3>Our Address</h3>
                                <p>Golden Mountain Building San, San Brgy. San Vicente Rd, Urdaneta, 2428 Pangasinan</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center">
                            <i class="icon fa fa-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>jjeng511@yahoo.com</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon fa fa-phone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>0927 221 2221</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon fa fa-share flex-shrink-0"></i>
                            <div>
                                <h3>Opening Hours</h3>
                                <div><b>Mon-Fri:</b> 7AM - 9PM;
                                    <div><b>Sat:</b> 7AM - 7PM;
                                    <b>Sunday:</b> Closed
                                </div>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                </div>


            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <!-- Vendor JS Files -->
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>

</body>

</html>
