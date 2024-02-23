<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profile</title>
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

    <div class="container my-5">
        <h2 class="mb-4">Previous Participation</h2>
        @foreach ($userForms as $index => $userForm)
            <!-- This is the button that will be clicked to expand the form details -->
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#formDetails{{ $userForm->id }}" aria-expanded="false" aria-controls="formDetails{{ $userForm->id }}">
                Form Submission #{{ $index + 1 }}
            </button>

            <!-- This is the collapsible area containing the form details -->
            <div class="collapse" id="formDetails{{ $userForm->id }}">
                <div class="card card-body mt-2">
                    <div class="row">
                        <div class="col-12">
                            <p>Donation Amount: {{ $userForm->amount }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>User Details</h5>
                            <p>Surname: {{ $userForm->surname }}</p>
                            <p>Given Name: {{ $userForm->givenName }}</p>
                            <p>Address: {{ $userForm->address }}</p>
                            <p>Email: {{ $userForm->email }}</p>
                            <p>Contact Number: {{ $userForm->contact }}</p>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Blessing Type</th>
                                <th>Answer</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userForm->userFormBlessings as $blessing)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blessing->blessingType->title }}</td> <!-- Assuming you have a relationship to the BlessingType -->
                                    <td>{{ $blessing->answer }}</td>
                                    <td>{{ $userForm->surname }} {{ $userForm->givenName }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>




    <script>

    </script>


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
