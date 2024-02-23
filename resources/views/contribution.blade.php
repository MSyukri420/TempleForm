<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Contribution</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('components/navbar')



    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>Contribution</h1>
                    <h2>A Sanctuary of Serenity and Spirituality Amidst the Yellow Mountains</h2>
                    @auth
                        <a href="/donation" class="btn-get-started scrollto">Participate</a>
                    @else
                        <a class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#authModal">Login to Participate</a>
                    @endauth
                    <a href="#donation" class="btn-get-started scrollto">Support Us</a>
                </div>
            </div>
        </div>
    </section>



    <main id="main">

        <!-- ======= Tabs Section ======= -->
        <section id="tabs" class="tabs">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Lingyun Temple</h2>
                </div>

                <div class="row">
                    <ul class="nav nav-tabs row d-flex">
                        <li class="nav-item col-4">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                            <i class="ri-book-2-line"></i>
                            <h4 class="d-none d-lg-block">History</h4>
                            </a>
                        </li>
                        <li class="nav-item col-4">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                            <i class="ri-building-line"></i>
                            <h4 class="d-none d-lg-block">Architecture</h4>
                            </a>
                        </li>
                        <li class="nav-item col-4">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                            <i class="ri-sun-line"></i>
                            <h4 class="d-none d-lg-block">Cultural Significance</h4>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                    <h3>The Ancient Chronicles of Lingyun Temple</h3>
                                    <p class="fst-italic py-3">
                                        Lingyun Temple's saga begins over a thousand years ago, rooted in the era of the Tang Dynasty, symbolizing a continuum of peace and spiritual refuge. Its foundation was laid by devout monks seeking solitude and enlightenment amidst the tranquil embrace of nature. Through centuries of upheaval, including wars and natural disasters, Lingyun Temple has stood resilient, its spires reaching towards the heavens, unshaken.
                                    </p>
                                    <ul>
                                        <li><i class="ri-check-double-line"></i> A beacon for pilgrims, the temple has been a site of spiritual journeying, drawing seekers from far and wide.</li>
                                        <li><i class="ri-check-double-line"></i> Survived through the Mongol invasions and stood firm during the turbulence of the Ming and Qing dynasties.</li>
                                        <li><i class="ri-check-double-line"></i> Today, it stands not only as a monument to its founders' vision but as a living, breathing center for Buddhist learning and culture.</li>
                                        <li><i class="ri-check-double-line"></i> The temple's resilience is a testament to its significance, enduring as a symbol of hope and renewal through the ages.</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                    <h3>Architectural Marvels of Lingyun Temple</h3>
                                    <p class="fst-italic py-3">
                                        Lingyun Temple's architectural grandeur is a harmonious blend of spiritual symbolism and natural beauty. Its structures, built according to ancient Feng Shui principles, are designed to be in perfect alignment with the cosmic and natural energies. The Main Hall, a masterpiece of wooden craftsmanship, features intricate carvings of mythical creatures believed to protect the temple from evil spirits.
                                    </p>
                                    <ul>
                                        <li><i class="ri-check-double-line"></i> The temple grounds are a testament to classic Chinese landscape gardening, with each element meticulously placed to enhance spiritual and aesthetic appreciation.</li>
                                        <li><i class="ri-check-double-line"></i> The use of natural materials in construction promotes a sense of unity with the surrounding landscape.</li>
                                        <li><i class="ri-check-double-line"></i> Architectural features like the Dragon's Gate and the Phoenix Pavilion symbolize the pursuit of enlightenment and rebirth.</li>
                                        <li><i class="ri-check-double-line"></i> The design principles of Lingyun Temple have influenced religious architecture across East Asia, embodying a legacy that transcends borders.</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 mt-3 mr-3 mt-lg-0">
                                    <h3>The Cultural Heartbeat of Lingyun Temple</h3>
                                    <p class="fst-italic py-3">
                                        Beyond its architectural splendor, Lingyun Temple serves as a vibrant cultural hub, preserving ancient traditions while fostering a community of mindfulness and compassion. It has been a cradle for Buddhist art, literature, and philosophy, hosting scholars and artists from across the continent. The temple's library, a repository of ancient manuscripts and texts, offers insights into the evolution of Buddhist thought and its intersection with local cultures.
                                    </p>
                                    <ul>
                                        <li><i class="ri-check-double-line"></i> The annual Lotus Festival attracts thousands, symbolizing purity and enlightenment.</li>
                                        <li><i class="ri-check-double-line"></i> Lingyun Temple's monks engage in community service, embodying the Buddhist principles of compassion and selflessness.</li>
                                        <li><i class="ri-check-double-line"></i> Educational programs and meditation retreats offered at the temple provide a pathway for individuals seeking spiritual growth.</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                <h2>Gallery</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 2</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 2</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                </div>

            </div>
        </section>




        <!-- ======= Donation Section ======= -->
        <section id="donation" class="about section-bg">
            <div class="container" data-aos="fade-up">

            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch">
                <div class="content">
                    <h3>Your Generosity Fuels Our Mission</h3>
                    <p>
                    Your donations are instrumental in sustaining the cultural and spiritual heritage of Lingyun Temple. Each contribution aids in maintaining the temple grounds, supporting our monks, and funding our educational and community outreach programs.
                    </p>
                    <a href="#about" class="btn-get-started scrollto">Make a Donation</a>
                </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch">
                <div class="icon-boxes d-flex flex-column justify-content-center">
                    <div class="row">
                    <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-building-house"></i>
                        <h4>Preserve the Sanctuary</h4>
                        <p>Maintain and restore the temple's ancient architecture, ensuring it remains a beacon of peace for future generations.</p>
                    </div>
                    <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-book-open"></i>
                        <h4>Support Education</h4>
                        <p>Contribute to the temple's educational programs, spreading wisdom and nurturing the minds of those seeking knowledge.</p>
                    </div>
                    <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-heart"></i>
                        <h4>Community Care</h4>
                        <p>Help us provide care and support to the community, embodying the compassionate spirit of Buddhism.</p>
                    </div>
                    <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                        <i class="bx bx-world"></i>
                        <h4>Spread Harmony</h4>
                        <p>Your gifts enable us to host cultural exchanges and events that foster harmony and understanding globally.</p>
                    </div>
                    </div>
                </div><!-- End .content-->
                </div>
            </div>

            </div>
        </section><!-- End Donation Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>Contact</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-6">

                <div class="row">
                <div class="col-md-12">
                    <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box mt-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>info@example.com<br>contact@example.com</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box mt-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                    </div>
                </div>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                    <div class="col form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

            </div>

        </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Presento<span>.</span></h3>
                    <p>
                    A108 Adam Street <br>
                    New York, NY 535022<br>
                    United States <br><br>
                    <strong>Phone:</strong> +1 5589 55488 55<br>
                    <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
            &copy; Copyright <strong><span>Presento</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
        <div class="social-links text-center text-md-end pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




    <!-- Authentication Modal -->
    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="authModalLabel">Login / Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tab navs -->
                    <ul class="nav nav-tabs mb-3" id="authTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="authTabContent">
                        <!-- Login Form -->
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form method="POST" id="loginForm">
                                @csrf
                                <div class="mb-3">
                                    <div id="loginAlert" class="alert alert-danger d-none" role="alert">
                                        This is a danger alert—check it out!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="emailLogin" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="emailLogin" name="email" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordLogin" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="passwordLogin" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <p>Don't have an account? <a href="#" id="registerLink" style="color:grey">Register here</a></p>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>

                        <!-- Registration Form -->
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form method="POST" id="registrationForm">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="surnameRegister" class="form-label">姓 Surname</label>
                                        <input type="text" class="form-control" id="surnameRegister" name="surname" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="givenNameRegister" class="form-label">名 Given Name</label>
                                        <input type="text" class="form-control" id="givenNameRegister" name="givenName" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="emailRegister" class="form-label">电邮 Email</label>
                                        <input type="email" class="form-control" id="emailRegister" name="email" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="addressRegister" class="form-label">地址 Address</label>
                                        <input type="text" class="form-control" id="addressRegister" name="address" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="contactRegister" class="form-label">联系电话 Contact Number</label>
                                        <input type="text" class="form-control" id="contactRegister" name="contact" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="passwordRegister" class="form-label">密码 Password</label>
                                        <input type="password" class="form-control" id="passwordRegister" name="password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="passwordConfirmationRegister" class="form-label">确认密码 Confirm Password</label>
                                        <input type="password" class="form-control" id="passwordConfirmationRegister" name="password_confirmation" required>
                                    </div>
                                    <div class="col-12 text-end mt-3">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Donation Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Donate to Lingyun Temple</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="combinedDonationForm" method="POST" class="p-3" action="{{ url('/preview-donation') }}">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Personal Information Section -->
                                    <div class="col-md-6">
                                        <label for="surname" class="form-label">姓 Surname</label>
                                        <input type="text" class="form-control" id="surname" name="surname" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="givenName" class="form-label">名 Given Name</label>
                                        <input type="text" class="form-control" id="givenName" name="givenName" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">地址 Address</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">电邮 Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contact" class="form-label">联系电话 Contact Number</label>
                                        <input type="text" class="form-control" id="contact" name="contact" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Blessing Types Section -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="card-title mb-4">往 生 莲 位 Merit for the Departed Soul</h4>
                                <div class="row g-3">
                                    @foreach ($blessingTypes as $type)
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="blessingType{{ $type->id }}" class="form-label">{{ $type->id }}) {{ $type->title }}</label>
                                                <input type="text" class="form-control" name="answers[{{ $type->id }}][answer]" id="blessingType{{ $type->id }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Donation Amount Section -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="donationAmount" class="form-label">金额 Amount</label>
                                        <input type="number" class="form-control" id="donationAmount" name="amount" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end align-items-center mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Donate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>




    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('registerLink').addEventListener('click', function(e) {
                e.preventDefault();

                var registerTab = new bootstrap.Tab(document.getElementById('register-tab'));
                var authModal = bootstrap.Modal.getInstance(document.getElementById('authModal'));
                authModal.hide();

                authModal._element.addEventListener('hidden.bs.modal', function onModalHidden() {
                    authModal.show();
                    registerTab.show();
                    authModal._element.removeEventListener('hidden.bs.modal', onModalHidden);
                });
            });
        });


        function displayErrors(form, errors) {
            console.log(errors);
            // Clear previous errors
            form.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
                el.nextElementSibling?.remove();
            });

            // Display new errors
            for (const [field, messages] of Object.entries(errors)) {
                const input = form.querySelector(`[name="${field}"]`);
                input.classList.add('is-invalid');
                const errorText = document.createElement('div');
                errorText.className = 'invalid-feedback';
                errorText.innerText = messages.join(' ');
                input.parentNode.insertBefore(errorText, input.nextSibling);
            }
        }




        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            const formData = new FormData(form);

            fetch('/login', { // Adjust this URL to your login route
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (!response.ok) {
                    if (response.status === 401) {
                        // Handle unauthorized access
                        response.json().then(data => {
                            const message = data.message || 'Invalid credentials, please try again.';
                            // Use the Bootstrap alert div to display this message
                            const loginAlert = document.getElementById('loginAlert');
                            loginAlert.textContent = message;
                            loginAlert.classList.remove('d-none'); // Show the alert div
                        });
                    } else {
                        throw response;
                    }
                } else {
                    return response.json();
                }
            })
            .then(data => {
                if (data && data.success) {
                    // Login was successful
                    alert('Login successful');
                    location.reload(); // or redirect to the dashboard or intended page
                }
            })
            .catch(errorResponse => {
                console.error('Fetch error:', errorResponse);
            });
        });




        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            const formData = new FormData(form);

            fetch('/register', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('User has been registered');
                    window.location.href = '/';
                } else {
                    // Handle errors
                    displayErrors(form, data.errors);
                }
            })
            .catch(errorResponse => {
                errorResponse.json().then(errorData => {
                    // Display error messages
                    displayErrors(form, errorData.errors);
                });
            });
        });



        // document.getElementById('combinedDonationForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     // Collect all form data
        //     var formData = new FormData(this);
        //     // Perform the AJAX request
        //     fetch('/submit-donation', {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         }
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         if (data.success) {
        //             alert('Donation submitted successfully!');
        //             $('#registerModal').modal('hide');
        //         } else {
        //             alert('There was a problem submitting your donation.');
        //         }
        //     })
        //     .catch(error => {
        //         console.error('Error:', error);
        //     });
        // });
    </script>

</body>

</html>
