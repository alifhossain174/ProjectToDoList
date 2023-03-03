<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>To Do List</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{{ url('assets') }}/img/favicon.png" rel="icon"> --}}
    {{-- <link href="{{ url('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ url('assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ url('assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ url('assets') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ url('assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ url('assets') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="{{url('/')}}">To Do List</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{url('/')}}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{url('/login')}}">Login</a></li>
                    <li><a class="getstarted scrollto" href="{{url('/register')}}">Register</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Manage Your To Do List</h1>
                    <h2>A Demo Project for OrangeToolz for managing To Do List</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{url('/login')}}" class="btn-get-started scrollto">Login</a>
                        <a href="{{url('/register')}}" class="btn-watch-video"><span>Register</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets') }}/vendor/aos/aos.js"></script>
    <script src="{{ url('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ url('assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ url('assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ url('assets') }}/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{ url('assets') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets') }}/js/main.js"></script>

</body>

</html>
