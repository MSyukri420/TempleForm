<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gallery Upload</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    <li class="breadcrumb-item active">Gallery Upload</li>
                </ol>
            </nav>
        </div>

        <div class="container mt-5">
            <h2>Uploaded Images</h2>
            <div class="row g-4 mt-3">
                @foreach($images as $image)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/'.$image->image) }}" class="card-img-top" alt="{{ $image->title }}">
                            <div class="card-body">
                                <h5 class="card-title pb-0">{{ $image->title }}</h5>
                                <p class="card-text pb-2">{{ $image->category }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <a href="{{ route('dashboard.gallery.edit', $image->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $image->id }}">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        <div class="container mt-5">
            <h2>Upload New Image</h2>
            <form action="{{ route('dashboard.gallery.upload') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Image Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category">
                        <option value="scenery">Scenery</option>
                        <option value="praying">Praying</option>
                        <option value="activities">Activities</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image File</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const imageId = this.getAttribute('data-id');

                    if(confirm('Are you sure you want to delete this image?')) {
                        fetch(`/dashboard/gallery-delete/${imageId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if(data.success) {
                                window.location.reload();
                            } else {
                                alert('Something went wrong. Please try again.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
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
