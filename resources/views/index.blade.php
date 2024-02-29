<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Temple</title>
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
                    <h1>Welcome to Lingyun Temple</h1>
                    <h2>A Sanctuary of Serenity and Spirituality Amidst the Yellow Mountains</h2>
                    <a href="#tabs" class="btn-get-started scrollto">Discover More</a>
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




        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Events and Programs</h2>
                <p>Explore the rich tapestry of cultural and spiritual events at Lingyun Temple. From traditional festivals to meditation retreats, each program is designed to enhance understanding, promote peace, and foster community engagement.</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <!-- Event 1 -->
                    <div class="swiper-slide entries">
                        <article class="entry">
                            <div class="entry-img">
                                <img src="assets/img/home-temple.jpg" alt="Image" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                            <a href="event-details.html">Spring Meditation Retreat</a>
                            </h2>
                            <div class="entry-content">
                                <p>
                                    Refresh your mind with our Spring Meditation Retreat. Experience guided sessions focused on mindfulness and inner peace amidst the blossoming gardens.
                                </p>
                            </div>
                        </article>
                    </div>

                    <!-- Event 2 -->
                    <div class="swiper-slide entries">
                        <article class="entry">
                            <div class="entry-img">
                                <img src="assets/img/home-temple.jpg" alt="Image" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                            <a href="event-details.html">Cultural Exchange Meet</a>
                            </h2>
                            <div class="entry-content">
                                <p>
                                    Discover the rich tapestry of our heritage at the Cultural Exchange Meet, featuring traditional arts, crafts, and performances by local artisans.
                                </p>
                            </div>
                        </article>
                    </div>

                    <!-- Event 3 -->
                    <div class="swiper-slide entries">
                        <article class="entry">
                            <div class="entry-img">
                                <img src="assets/img/home-temple.jpg" alt="Image" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                            <a href="event-details.html">Summer Festival</a>
                            </h2>
                            <div class="entry-content">
                                <p>
                                    Celebrate the summer solstice with us at the Summer Festival, a day of joyous festivities, music, and communal feasting under the sun.
                                </p>
                            </div>
                        </article>
                    </div>

                </div>

                <div class="swiper-pagination"></div>
            </div>

        </div>
        </section><!-- End Testimonials Section -->



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



</body>

</html>
