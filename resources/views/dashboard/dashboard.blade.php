<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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
        </div><!-- End Page Title -->


        <section class="section dashboard">
            <!-- Blessing Types and Answers Section -->
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Blessing Types and Answers</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Blessing Type</th>
                                            <th>Answers</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blessingTypes as $type)
                                            <tr>
                                                <td>{{ $type->title }}</td>
                                                <td id="answers_for_{{ $type->id }}">
                                                    @foreach ($userFormBlessings->where('blessing_type_id', $type->id) as $blessing)
                                                        <span class="answer">{{ $blessing->answer }}</span><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <button onclick="printBlessingAnswers({{ $type->id }}, '{{ addslashes($type->title) }}')" class="btn btn-primary">Print</button>
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



            <!-- Blessing Types Section -->
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Blessing Types</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blessingTypes as $type)
                                            <tr>
                                                <td>{{ $type->id }}</td>
                                                <td>{{ $type->title }}</td>
                                                <td>{{ $type->position }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Users Section -->
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Users</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
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
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->surname }}</td>
                                                <td>{{ $user->givenName }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ $user->contact }}</td>
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


    <!-- Add a hidden div for the printable table -->
    <div class="printable-table" id="printableTable">
        <h2></h2>
        <table>
        <!-- The content of this table will be populated by the print function -->
        </table>
    </div>


    <script>
        function printBlessingAnswers(blessingTypeId, blessingTypeTitle) {
            var answers = document.querySelectorAll('#answers_for_' + blessingTypeId + ' .answer');
            var printableTable = document.getElementById('printableTable');
            var table = printableTable.querySelector('table');
            table.innerHTML = '';

            printableTable.querySelector('h2').innerText = blessingTypeTitle;

            // Create a new table after every 3 answers
            for (let i = 0; i < answers.length; i += 3) {
                var tableDiv = document.createElement('div');
                tableDiv.className = 'table-responsive mb-4'; // Add Bootstrap classes for styling if desired

                var table = document.createElement('table');
                table.className = 'table';

                var tbody = table.createTBody();

                // Add rows with up to 2 answers each
                for (let j = i; j < i + 3 && j < answers.length; j += 2) {
                    var row = tbody.insertRow();
                    let cell1 = row.insertCell();
                    cell1.innerText = answers[j].textContent;

                    // Add second cell if there is another answer
                    if (j + 1 < answers.length) {
                        let cell2 = row.insertCell();
                        cell2.innerText = answers[j + 1].textContent;
                    }
                }

                tableDiv.appendChild(table);
                printableTable.appendChild(tableDiv);

                // Break after adding one table which can have up to 3 answers
                if (i + 3 < answers.length) {
                    var pageBreak = document.createElement('div');
                    pageBreak.className = 'page-break'; // Ensure you define this class in CSS
                    printableTable.appendChild(pageBreak);
                }
            }

            // Print the contents
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

    <!-- Template Main JS File -->
    <script src="assets/js/dashboard.js"></script>

</body>

</html>
