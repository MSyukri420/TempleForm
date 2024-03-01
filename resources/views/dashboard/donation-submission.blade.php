<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Donation Submission</title>
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

    <style>
        .scrollable-table {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    </style>
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
                    <li class="breadcrumb-item active">Donation Submission</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <form action="{{ route('donation.submissions') }}" method="GET" class="my-3">
            <div class="input-group mb-3">
                <input type="text" id="transaction_id" name="transaction_id" class="form-control" placeholder="Transaction ID" value="{{ request()->input('transaction_id') }}">
                <input type="text" id="surname" name="surname" class="form-control" placeholder="Surname" value="{{ request()->input('surname') }}">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ request()->input('email') }}">
                <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact" value="{{ request()->input('contact') }}">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('donation.submissions') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>


        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Donation Submission</h4>
                        </div>
                        <div class="card-body scrollable-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Linked User ID</th>
                                        <th>Surname</th>
                                        <th>Given Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Created At</th>
                                        <th>Amount</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userForms as $form)
                                    <tr>
                                        <td>{{ $form->id ?? 'N/A' }}</td>
                                        <td>{{ $form->user_id ?? 'N/A' }}</td>
                                        <td>{{ $form->surname ?? 'N/A' }}</td>
                                        <td>{{ $form->givenName ?? 'N/A' }}</td>
                                        <td>{{ $form->email ?? 'N/A' }}</td>
                                        <td>{{ $form->address ?? 'N/A' }}</td>
                                        <td>{{ $form->contact ?? 'N/A' }}</td>
                                        <td>{{ $form->created_at->format('d/m/Y (g.ia)') ?? 'N/A' }}</td>
                                        <td>RM{{ $form->amount }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Form Actions">
                                                <a href="{{ route('dashboard.showFormDetails', $form->id) }}" class="btn btn-primary btn-sm" target="_blank">Form</a>
                                                <a href="{{ route('dashboard.showFullDetails', $form->id) }}" class="btn btn-secondary btn-sm" target="_blank">Full</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="row mt-3">
                                <div class="col-12">
                                    <p>Total Submissions: {{ $userForms->total() }}</p>
                                    @if ($userForms->count() > 0)
                                        <nav>
                                            <ul class="pagination">
                                                @if (!$userForms->onFirstPage())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $userForms->previousPageUrl() . '&' . http_build_query(request()->except('page')) }}" rel="prev">&laquo;</a>
                                                    </li>
                                                @endif

                                                @foreach (range(1, $userForms->lastPage()) as $page)
                                                    <li class="page-item {{ $page == $userForms->currentPage() ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ $userForms->url($page) . '&' . http_build_query(request()->except('page')) }}">{{ $page }}</a>
                                                    </li>
                                                @endforeach

                                                @if ($userForms->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $userForms->nextPageUrl() . '&' . http_build_query(request()->except('page')) }}" rel="next">&raquo;</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </nav>
                                    @else
                                        <p>No results found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




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
