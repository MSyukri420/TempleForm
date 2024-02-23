<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Donate</title>
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

    <main id="main">

        <div class="container my-5">
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
                    <button type="submit" class="btn btn-primary btn-lg">Preview</button>
                </div>
            </form>
        </div>

    </main>




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
