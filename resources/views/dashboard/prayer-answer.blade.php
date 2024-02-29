<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Prayer Answer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/dashboard.css" rel="stylesheet">

</head>

<body>

    <main id="main" class="main">

        @include('components/header')
        @include('components/sidebar')

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Prayer Answer</li>
                </ol>
            </nav>
        </div>



        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blessingType->title }}</h4>
                            <form action="{{ route('print.answers') }}" method="GET">
                                @csrf
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <button type="button" id="selectAll">All</button>
                                            </th>
                                            <th>No</th>
                                            <th>Transaction ID</th>
                                            <th>Name</th>
                                            <th>Answer</th>
                                            <th>Created At</th>
                                            <th>Print Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userFormBlessings as $blessing)
                                        <tr>
                                            <td><input type="checkbox" name="userFormBlessings[]" value="{{ $blessing->id }}"></td>
                                            <td>{{ $loop->iteration }})</td>
                                            <td>#{{ $blessing->user_form_id }}</td>
                                            <td>{{ $blessing->userForm->surname }} {{ $blessing->userForm->givenName }}</td>
                                            <td>{{ $blessing->answer }}</td>
                                            <td>{{ $blessing->created_at->format('M d, Y g:i A') }}</td>
                                            <td>{{ $blessing->print_count }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit">Print Selected Answers</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



    <script>
        // When the document is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Listen for a click event on the 'Select All' button
            document.getElementById('selectAll').addEventListener('click', function() {
                // Get all input elements within the table
                const checkboxes = document.querySelectorAll('input[name="userFormBlessings[]"]');

                // Check if any checkbox is not checked to determine the action to apply
                const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

                // Toggle the checked status of each checkbox
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = !allChecked;
                });
            });
        });
    </script>



    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/vendor/quill/quill.min.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Template Main JS File -->
    <script src="/assets/js/dashboard.js"></script>

</body>

</html>
