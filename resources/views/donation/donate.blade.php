<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Donate</title>
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


    <style>
        .readonly-background, .readonly-background:active {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>

    <main id="main">

        <div class="container my-5">
            @auth
                <h2 class="mb-4">Participate under {{ auth()->user()->surname }}</h2>
            @else
                <h2 class="mb-4">Participate as Guest</h2>
            @endauth

            <form id="combinedDonationForm" method="POST" class="p-3" action="{{ url('/preview-donation') }}">
                @csrf
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Personal Information Section -->
                            <div class="col-md-6">
                                <label for="surname" class="form-label">姓 Surname</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="Eg. Zhang / 张" required value="{{ old('surname') }}">
                                @error('surname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="givenName" class="form-label">名 Given Name</label>
                                <input type="text" class="form-control @error('givenName') is-invalid @enderror" id="givenName" name="givenName" placeholder="Eg. San Feng / 三丰" required value="{{ old('givenName') }}">
                                @error('givenName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">地址 Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Eg. No.123, Jalan ABC, 912340 Kuching, Sarawak" required value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">电邮 Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Eg. zhangsanfeng@gmail.com" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="contact" class="form-label">联系电话 Contact Number</label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="Eg. 01234567890" required value="{{ old('contact') }}">
                                @error('contact')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blessing Types Section -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title mb-4">往 生 莲 位 Merit for the Departed Soul</h4>
                        <div class="row g-3">
                            @foreach ($blessingTypes as $index => $type)
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input class="form-check-input me-2 blessing-checkbox" type="checkbox" id="enableBlessingType{{ $type->id }}" checked>
                                        <label for="blessingType{{ $type->id }}" class="form-label">{{ $index + 1 }}) {{ $type->title }}</label>
                                        @if ($index == 5)
                                            <div class="d-flex">
                                                <input type="text" class="form-control" id="blessingType{{ $type->id }}_1" placeholder="Eg. Surname">
                                                <input type="text" class="form-control" id="blessingType{{ $type->id }}_2" placeholder="Eg. 1">
                                            </div>
                                            <input type="hidden" name="answers[{{ $type->id }}][answer]" id="blessingType{{ $type->id }}">
                                        @else
                                            <input type="text"
                                                class="form-control {{ in_array($index, [3, 4, 6]) ? 'auto-populate-surname' : '' }}
                                                                {{ $index == 8 ? 'auto-populate-address' : '' }}
                                                                {{ $index == 9 ? 'auto-populate-fullname' : '' }}"
                                                name="answers[{{ $type->id }}][answer]"
                                                id="blessingType{{ $type->id }}">
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Donation Amount Section -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="donationAmount" class="form-label">金额 Amount</label>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="donationAmount" name="amount" placeholder="Eg. 50" required value="{{ old('amount') }}">
                                @error('amount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end align-items-center mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">Preview</button>
                </div>
            </form>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', setupForm);
        window.addEventListener('pageshow', setupForm); // Add this line

        function setupForm() {
            function toggleInputs(checkbox) {
                const inputIdBase = checkbox.id.replace('enableBlessingType', 'blessingType');
                const inputs = document.querySelectorAll('#' + inputIdBase + ', #' + inputIdBase + '_1, #' + inputIdBase + '_2');
                inputs.forEach(function(input) {
                    input.disabled = !checkbox.checked;
                    if (!checkbox.checked) {
                        input.value = '';
                        input.removeAttribute('required'); // Remove required attribute when checkbox is unchecked
                    } else {
                        input.setAttribute('required', ''); // Add required attribute when checkbox is checked
                    }
                });
            }

            document.querySelectorAll('.blessing-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    toggleInputs(this);
                });
                toggleInputs(checkbox); // Ensure correct initial state
            });
        }



        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('combinedDonationForm');
            const surnameInput = document.getElementById('surname');
            const givenNameInput = document.getElementById('givenName');
            const addressInput = document.getElementById('address');

            function updateFullName() {
                const fullName = `${surnameInput.value} ${givenNameInput.value}`;
                document.querySelectorAll('.auto-populate-fullname').forEach(function(input) {
                    input.value = fullName;
                });
            }

            surnameInput.addEventListener('input', updateFullName);
            givenNameInput.addEventListener('input', updateFullName);

            surnameInput.addEventListener('input', function() {
                document.querySelectorAll('.auto-populate-surname').forEach(function(input) {
                    input.value = surnameInput.value;
                });
                // Additional logic for specific inputs that should be populated with surname
                @foreach ($blessingTypes as $index => $type)
                if ({{$index}} === 5) { // Assuming index 5 requires special handling
                    document.getElementById('blessingType{{$type->id}}_1').value = surnameInput.value;
                }
                @endforeach
            });

            addressInput.addEventListener('input', function() {
                document.querySelectorAll('.auto-populate-address').forEach(function(input) {
                    input.value = addressInput.value;
                });
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                @foreach ($blessingTypes as $index => $type)
                if ({{$index}} == 5) {
                    const input1 = document.getElementById('blessingType{{$type->id}}_1');
                    const input2 = document.getElementById('blessingType{{$type->id}}_2');
                    const combinedValue = input1.value + '|' + input2.value;
                    document.getElementById('blessingType{{$type->id}}').value = combinedValue;
                }
                @endforeach

                // Now submit the form programmatically
                form.submit();
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
