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


        <form action="{{ route('viewBlessingType', $blessingType->id) }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Transaction ID" name="transaction_id" value="{{ request('transaction_id') }}">
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ request('name') }}">
                <input type="text" class="form-control" placeholder="Answer" name="answer" value="{{ request('answer') }}">
                <button class="btn btn-primary" type="submit">Search</button>
                <a href="{{ route('viewBlessingType', $blessingType->id) }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>



        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('print.answers') }}" method="GET">
                            @csrf
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title">{{ $blessingType->title }}</h4>
                                    <div>
                                        <button type="button" id="selectAll" class="btn btn-secondary btn-sm mr-2">Select All</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Print Selected Answers</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">No</th>
                                                <th scope="col">Transaction ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Answer</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Print Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userFormBlessings as $blessing)
                                            <tr>
                                                <td><input type="checkbox" name="userFormBlessings[]" value="{{ $blessing->id }}"></td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>#{{ $blessing->user_form_id ?? 'N/A'}}</td>
                                                <td>{{ $blessing->userForm->surname ?? 'N/A' }} {{ $blessing->userForm->givenName }}</td>
                                                <td>{{ $blessing->answer ?? 'N/A' }}</td>
                                                <td>{{ $blessing->created_at->format('M d, Y g:i A') ?? 'N/A' }}</td>
                                                <td>{{ $blessing->print_count ?? 'N/A' }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <p>Total Submissions: {{ $userFormBlessings->total() }}</p>
                                    @if ($userFormBlessings->count() > 0)
                                        <nav>
                                            <ul class="pagination">
                                                @if (!$userFormBlessings->onFirstPage())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $userFormBlessings->previousPageUrl() . '&' . http_build_query(request()->except('page')) }}" rel="prev">&laquo;</a>
                                                    </li>
                                                @endif

                                                @foreach (range(1, $userFormBlessings->lastPage()) as $page)
                                                    <li class="page-item {{ $page == $userFormBlessings->currentPage() ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ $userFormBlessings->url($page) . '&' . http_build_query(request()->except('page')) }}">{{ $page }}</a>
                                                    </li>
                                                @endforeach

                                                @if ($userFormBlessings->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $userFormBlessings->nextPageUrl() . '&' . http_build_query(request()->except('page')) }}" rel="next">&raquo;</a>
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



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('selectAll').addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('input[name="userFormBlessings[]"]');
                const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

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
