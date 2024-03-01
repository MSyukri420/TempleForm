<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Thank You</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/dashboard.css" rel="stylesheet">

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="container py-5">
        <div class="text-center">
            <h1 class="mb-3">Thank You!</h1>
            @if(isset($userForm))
                <p class="lead">Your submission has been received. An email has been sent to you for reference as well</p>
                <p>Your Transaction ID is: <strong>#{{ $userForm->id ?? 'N/A' }}</strong></p>
                <p>Submission Time: <strong>{{ $userForm->created_at ? $userForm->created_at->format('d/m/Y (g.ia)') : 'N/A' }}</strong></p>
                <p>Donation Amount: <strong>RM{{ number_format($userForm->amount ?? 0, 2) }}</strong></p>
            @else
                <p class="lead">We could not find your submission details. Please contact support if you think this is an error.</p>
            @endif
            <a href="/" class="btn btn-primary mt-4">Back to Homepage</a>
        </div>
    </div>

</body>

</html>
