
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Full Details</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        .form-display-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .form-display-table th, .form-display-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .form-display-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="my-3">
            <h4 class="mb-2">Donation Details</h4>
            <p class="lead fw-bold">RM{{ $userForm->amount }}</p>
        </div>

        <hr>

        <div class="user-details py-3">
            <h4 class="mb-3">User Details</h4>
            <ul class="list-unstyled">
                <li class="mb-2"><strong>Surname:</strong> <span class="text-secondary">{{ $userForm->surname }}</span></li>
                <li class="mb-2"><strong>Given Name:</strong> <span class="text-secondary">{{ $userForm->givenName }}</span></li>
                <li class="mb-2"><strong>Email:</strong> <span class="text-secondary">{{ $userForm->email }}</span></li>
                <li class="mb-2"><strong>Address:</strong> <span class="text-secondary">{{ $userForm->address }}</span></li>
                <li><strong>Phone Number:</strong> <span class="text-secondary">{{ $userForm->contact }}</span></li>
            </ul>
        </div>

        <hr>

        <div class="table-responsive">
            <h4 class="mb-3">Blessing Details</h4>
            <table class="form-display-table">
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Blessing Type Title</th>
                        <th>Answer</th>
                        <th>Name</th>
                    </tr>
                    @foreach ($userForm->userFormBlessings as $blessing)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blessing->blessingType->title }}</td>
                        <td>{{ $blessing->answer }}</td>
                        <td>{{ $userForm->surname }} {{ $userForm->givenName }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

