<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        @media print {
            main * {
                display: none;
            }

            .page-break {
                display: block;
            }

            .printable-table, .printable-table * {
                display: block
            }

            .printable-table {
                width: 100%;
                position: absolute;
                left: 0;
                top: 100px;
            }

            .printable-table th, .printable-table td {
                border: 1px solid #000;
                text-align: center;
                padding: 8px;
            }

            .printable-table th {
                background-color: #f2f2f2;
            }
        }

        .printable-table {
            display: none;
        }

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
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>


        <section class="section dashboard">
            <div class="row">

                <div class="col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Form Submission</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalFormsSubmitted }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Submitted Form</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalUsers }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Registered Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Amount Collected</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>RM{{ number_format($totalAmountCollected, 2) }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total Donations</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Donation Submissions</h4>
                            <a href="/dashboard/donation-submissions" class="btn btn-primary btn-sm">View More</a>
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
                                        <td>{{ $form->id }}</td>
                                        <td>{{ $form->user_id }}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="section dashboard">
            <section class="section dashboard">
                <div class="row">
                    {{-- Table for Blessing Types --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Prayer Types</h4>
                                <a href="/dashboard/prayers" class="btn btn-primary btn-sm">View More</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover" id="blessingTypesTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable">
                                        @foreach($blessingTypes as $index => $type)
                                        <tr data-id="{{ $type->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td contenteditable="true" class="blessing-title">{{ $type->title }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Form Actions">
                                                    <a href="/dashboard/prayers/view/{{ $type->id }}" class="btn btn-primary btn-sm view-btn mb-2">View</a>
                                                    <button class="btn btn-danger btn-sm delete-btn mb-2" data-id="{{ $type->id }}"><i class="bi bi-trash-fill"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <button id="saveOrderBtn" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- Users Section -->
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Users</h4>
                                <a href="/dashboard/users" class="btn btn-primary btn-sm">View More</a>
                            </div>
                            <div class="card-body scrollable-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Surname</th>
                                            <th>Given Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id  ?? 'N/A' }}</td>
                                                <td>{{ $user->surname ?? 'N/A' }}</td>
                                                <td>{{ $user->givenName ?? 'N/A' }}</td>
                                                <td>{{ $user->email ?? 'N/A' }}</td>
                                                <td>{{ $user->address ?? 'N/A' }}</td>
                                                <td>{{ $user->contact ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </section>

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <div class="printable-table" id="printableTable">
        <h2></h2>
        <table>
        </table>
    </div>






    <script>
        function printBlessingAnswers(blessingTypeId, blessingTypeTitle) {
            var answers = document.querySelectorAll('#answers_for_' + blessingTypeId + ' .answer');
            var printableTable = document.getElementById('printableTable');

            printableTable.innerHTML = '';
            var h2 = document.createElement('h2');
            h2.innerText = blessingTypeTitle;
            printableTable.appendChild(h2);

            var tableDiv = document.createElement('div');
            tableDiv.className = 'table-responsive mb-4';
            var table = document.createElement('table');
            table.className = 'table';
            var tbody = table.createTBody();

            for (let i = 0; i < answers.length; i++) {
                if (i % 2 === 0 || i === 0) {
                    var row = tbody.insertRow();
                }

                let cell = row.insertCell();
                cell.innerText = answers[i].textContent;

                if (i + 1 < answers.length) {
                    let nextCell = row.insertCell();
                    nextCell.innerText = answers[i + 1].textContent;
                }

                i++;
            }

            tableDiv.appendChild(table);
            printableTable.appendChild(tableDiv);

            printableTable.style.display = 'block';
            window.print();
            printableTable.style.display = 'none';
        }

    </script>




    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/dashboard.js"></script>

</body>

</html>
