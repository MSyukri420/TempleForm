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


        <form action="{{ url('/dashboard/donation-submissions/search') }}" method="GET" class="my-3">
            <div class="row g-3 align-items-center">
                <div class="col-md-2">
                    <label for="transaction_id" class="form-label">Transaction ID:</label>
                    <input type="text" id="transaction_id" name="transaction_id" class="form-control" value="{{ request()->input('transaction_id') }}">
                </div>
                <div class="col-md-3">
                    <label for="surname" class="form-label">Surname:</label>
                    <input type="text" id="surname" name="surname" class="form-control" value="{{ request()->input('surname') }}">
                </div>
                <div class="col-md-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ request()->input('email') }}">
                </div>
                <div class="col-md-2">
                    <label for="contact" class="form-label">Contact:</label>
                    <input type="text" id="contact" name="contact" class="form-control" value="{{ request()->input('contact') }}">
                </div>
                <div class="col-md-2 align-self-end">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Donation Submissions</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Surname</th>
                                        <th>Given Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Amount</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userForms as $form)
                                    <tr>
                                        <td>{{ $form->id }}</td>
                                        <td>{{ $form->surname ?? 'N/A' }}</td>
                                        <td>{{ $form->givenName ?? 'N/A' }}</td>
                                        <td>{{ $form->email ?? 'N/A' }}</td>
                                        <td>{{ $form->address ?? 'N/A' }}</td>
                                        <td>{{ $form->contact ?? 'N/A' }}</td>
                                        <td>RM{{ $form->amount }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('dashboard.showFormDetails', $form->id) }}" class="d-block" target="_blank">Form Details</a>
                                                <a href="{{ route('dashboard.showFullDetails', $form->id) }}" class="d-block" target="_blank">View Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <p>Total Submissions: {{ $userForms->total() }}</p>
                                    @if ($userForms->count() > 0)
                                        <nav>
                                            <ul class="pagination">
                                                <!-- Previous Page Link -->
                                                @if (!$userForms->onFirstPage())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $userForms->previousPageUrl() }}" rel="prev">&laquo;</a>
                                                    </li>
                                                @endif

                                                <!-- Pagination Elements Here -->
                                                @foreach ($userForms->links()->elements as $element)
                                                    @foreach ($element as $page => $url)
                                                        @if ($page == $userForms->currentPage())
                                                            <li class="page-item active" aria-current="page">
                                                                <span class="page-link">{{ $page }}</span>
                                                            </li>
                                                        @else
                                                            <li class="page-item">
                                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endforeach

                                                <!-- Next Page Link -->
                                                @if ($userForms->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $userForms->nextPageUrl() }}" rel="next">&raquo;</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </nav>
                                    @else
                                        <p>No results</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        </section>

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Add a hidden div for the printable table -->
    <div class="printable-table" id="printableTable">
        <h2></h2>
        <table>
        </table>
    </div>






    <script>
        function printBlessingAnswers(blessingTypeId, blessingTypeTitle) {
            var answers = document.querySelectorAll('#answers_for_' + blessingTypeId + ' .answer');
            var printableTable = document.getElementById('printableTable');

            // Reset the printableTable content before appending new tables
            printableTable.innerHTML = '';
            var h2 = document.createElement('h2');
            h2.innerText = blessingTypeTitle;
            printableTable.appendChild(h2);

            var tableDiv = document.createElement('div');
            tableDiv.className = 'table-responsive mb-4';
            var table = document.createElement('table');
            table.className = 'table';
            var tbody = table.createTBody();

            // Create rows with up to 2 answers per row
            for (let i = 0; i < answers.length; i++) {
                // Create a new row for every two answers or if it's the beginning of the answers
                if (i % 2 === 0 || i === 0) {
                    var row = tbody.insertRow();
                }

                // Insert the answer into the cell
                let cell = row.insertCell();
                cell.innerText = answers[i].textContent;

                // Add a second cell if there is another answer
                if (i + 1 < answers.length) {
                    let nextCell = row.insertCell();
                    nextCell.innerText = answers[i + 1].textContent;
                }

                // Skip the next answer since it's already added in the second cell
                i++;
            }

            tableDiv.appendChild(table);
            printableTable.appendChild(tableDiv);

            // Print the contents
            printableTable.style.display = 'block';
            window.print();
            printableTable.style.display = 'none';
        }

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
