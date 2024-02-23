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

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    @include('components/header')
    @include('components/sidebar')

    <main id="main" class="main">

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
            <div class="row">

                <section class="section dashboard">
                    <div class="row">
                        {{-- Your other content --}}

                        {{-- Table for Blessing Types --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Blessing Types</h5>
                                    <table class="table table-hover" id="blessingTypesTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Title</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sortable">
                                            @foreach($blessingTypes as $index => $type)
                                            <tr data-id="{{ $type->id }}" class="draggable" style="cursor: pointer">
                                                <td class="handle"><i class="bi bi-grip-vertical"></i></td>
                                                <td>{{ $type->position }}</td>
                                                <td contenteditable="true" class="blessing-title">{{ $type->title }}</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $type->id }}">Delete</button>
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

                        {{-- Form for Adding New Blessing Type --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Add New Blessing Type</h5>
                                    <form id="addBlessingTypeForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="blessingTypeTitle" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="blessingTypeTitle" name="title" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </section>

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <script>
        $(document).ready(function() {
            $("#blessingTypesTable tbody").sortable({
                handle: '.handle',
                update: function(event, ui) {
                    // Update the position visually or prepare for saving
                }
            });
        });




        $(document).ready(function() {
            var el = document.getElementById('sortable');
            var sortable = Sortable.create(el, {
                animation: 150,
                store: {
                    set: function (sortable) {
                        var order = sortable.toArray();
                        fetch('/blessing/update-order', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ order: order })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if(!data.success) {
                                alert('Failed to update order');
                            }
                        })
                        .catch(error => console.error('Error updating order:', error));
                    }
                }
            });
        });






        document.getElementById('addBlessingTypeForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/blessing/add', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    title: formData.get('title')
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Clear the form
                    document.getElementById('blessingTypeTitle').value = '';
                    // Optionally, update the UI here
                    alert('Blessing type added successfully');
                    location.reload();
                } else {
                    // Handle error
                    alert('An error occurred');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });




        document.getElementById('saveOrderBtn').addEventListener('click', function() {
            const rows = document.querySelectorAll('tbody tr');
            const data = Array.from(rows).map((row, index) => {
                return {
                    id: row.getAttribute('data-id'),
                    title: row.querySelector('.blessing-title').innerText,
                    position: index + 1 // Assuming the first position is 1
                };
            });

            fetch('/blessing/update-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({blessings: data})
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if(data.success) {
                    alert('Order and titles updated successfully.');
                    location.reload(); // Reload the page to see the changes
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });





        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this blessing type?')) {
                    const id = this.getAttribute('data-id');
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch('/blessing/delete/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Content-Type': 'application/json'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            window.location.reload();
                        } else {
                            alert('An error occurred');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        });

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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/dashboard.js"></script>

</body>

</html>
