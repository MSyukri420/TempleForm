<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Preview</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container my-5">
        <h2 class="mb-4">Preview Your Donation</h2>

        <!-- Donation Amount -->
        <div class="card mb-3">
            <div class="card-header">Donation Amount</div>
            <div class="card-body">
                <h5 class="card-title">{{ $data['amount'] }}</h5>
            </div>
        </div>

        <!-- User Details -->
        <div class="card mb-3">
            <div class="card-header">User Details</div>
            <div class="card-body">
                <p class="card-text"><strong>Surname:</strong> {{ $data['surname'] }}</p>
                <p class="card-text"><strong>Given Name:</strong> {{ $data['givenName'] }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $data['address'] }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $data['email'] }}</p>
                <p class="card-text"><strong>Contact Number:</strong> {{ $data['contact'] }}</p>
            </div>
        </div>

        <!-- Answers Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Blessing Type</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['answers'] as $blessingTypeId => $answerData)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $blessingTypes[$blessingTypeId] }}</td>
                        <td>{{ $answerData['answer'] }}</td>
                        <td>{{ $data['surname'] }} {{ $data['givenName'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Payment Method Selection -->
        <div class="card my-3">
            <div class="card-header">Choose Your Payment Method</div>
            <div class="card-body">
                <!-- You can replace this section with actual payment methods and logic -->
                <div class="payment-methods">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="creditCard" checked>
                        <label class="form-check-label" for="creditCard">
                            Credit Card
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal">
                        <label class="form-check-label" for="paypal">
                            PayPal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer" value="bankTransfer">
                        <label class="form-check-label" for="bankTransfer">
                            Bank Transfer
                        </label>
                    </div>
                    <!-- Add more payment methods as needed -->
                </div>
            </div>
        </div>


        <!-- Confirmation Button -->
        <form id="combinedDonationForm" method="POST">
            @csrf
            <input type="hidden" name="surname" value="{{ $data['surname'] }}">
            <input type="hidden" name="givenName" value="{{ $data['givenName'] }}">
            <input type="hidden" name="address" value="{{ $data['address'] }}">
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <input type="hidden" name="contact" value="{{ $data['contact'] }}">
            <input type="hidden" name="amount" value="{{ $data['amount'] }}">
            @foreach ($data['answers'] as $blessingTypeId => $answerData)
                <input type="hidden" name="answers[{{ $blessingTypeId }}][answer]" value="{{ $answerData['answer'] }}">
            @endforeach
            <button type="submit" class="btn btn-primary">Confirm Donation</button>
        </form>
    </div>


    <script>
        document.querySelectorAll('.payment-methods .form-check-input').forEach(input => {
            input.addEventListener('change', function() {
                document.getElementById('selectedPaymentMethod').value = this.value;
            });
        });


        document.getElementById('combinedDonationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Collect all form data
            var formData = new FormData(this);
            // Perform the AJAX request
            fetch('/submit-donation', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Donation submitted successfully!');
                    window.location.href = '/';
                } else {
                    alert('There was a problem submitting your donation.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>


    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
