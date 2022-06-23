<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @yield('css')
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center"> <i class="bi bi-envelope-fill"></i><a
                    href="mailto:info@lightspot.com">info@lightspot.com</a> <i class="bi bi-phone-fill phone-icon"></i>
                +91-9899000000 </div>
            <div class="social-links d-none d-md-block"> <a href="#" class="twitter"><i
                        class="bi bi-twitter"></i></a> <a href="#" class="facebook"><i
                        class="bi bi-facebook"></i></a> <a href="#" class="instagram"><i
                        class="bi bi-instagram"></i></a> <a href="#" class="linkedin"><i
                        class="bi bi-linkedin"></i></i></a> </div>
        </div>
    </section>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <a href="{{ route('index') }}" class="logo me-auto"><img src="assets/img/logo.png" alt=""
                    class="img-fluid"></a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{ request()->path() == '/' ? 'active' : '' }}"
                            href="{{ route('index') }}">Home</a>
                    </li>
                    <li><a class="nav-link scrollto" href="{{ route('index') }}#about">About</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('index') }}#courses">Courses</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>

                    <li><a class="nav-link scrollto" href="{{ route('index') }}#contact">Contact</a></li>
                    @if (request()->path() == 'login')
                        <li><a class="getstarted scrollto" href="subscribe.php">Sign Up</a></li>
                    @else
                        <li><a class="getstarted scrollto" href="{{ route('subscribe') }}">subscribe</a></li>
                    @endif
                    <li style="margin-left:50px;">
                        <a href="#" class="logo me-auto"><img src="assets/img/logo-1.jpg" alt=""
                                class="img-fluid"></a>
                    </li>
                </ul> <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
    @yield('main')
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright"> &copy; Copyright <strong><span>Light Spot Pvt. Ltd.</span></strong>. All Rights
                Reserved </div>
            <div class="credits">Designed by <a href="#">Redox Systems</a> </div>
        </div>
    </footer>
    <!-- End Footer --><a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/front-main.js') }}"></script>
    @yield('script')
</body>

</html>
