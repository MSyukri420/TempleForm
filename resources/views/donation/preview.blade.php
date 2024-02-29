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


    <style>
        @font-face {
            font-family: chinese;
            src: url(wt064.ttf);
        }

        /* Add your custom styles here */
        .form-display-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .form-display-table th, .form-display-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .form-display-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        @auth
            <h2 class="mb-4">Preview under {{ auth()->user()->surname }}</h2>
        @else
            <h2 class="mb-4">Preview as Guest</h2>
        @endauth

        <!-- Donation Amount -->
        <div class="card mb-3">
            <div class="card-header">Amount</div>
            <div class="card-body">
                <h5 class="card-title">RM {{ $data['amount'] }}</h5>
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

        <div>
            <div style="display:flex;width:80%;align-items:center;justify-content:center;margin:auto;padding:30px 0;">
                <img src="assets/img/form_logo.png" style="width:15%"/>
                <div style="display:flex;flex-direction:column;gap:0;align-items:center;width:75%">
                    <div style="font-size:2.5vw;font-weight:600;text-align:center;letter-spacing:1.5px;font-family:chinese;">佛教金剛乘精舍<span style="font-size:12px">(釋迦中心)</span></div>
                    <div style="font-size:1.39vw;font-family:Roboto;font-weight:900;letter-spacing:0.5px;text-align:center;">PUSAT BUDDHA VAJRAYANA KUCHING <br> VAJRAYANA BUDDHIST CENTRE KUCHING</div>
                    <div style="font-size:1.25vw;font-family:Roboto;font-weight:900;text-align:center;">(Sakya Chosphel Ling)</div>
                    <div style="font-size:1.32vw;font-family:Roboto;font-weight:900;text-align:center;">28, PEACE ROAD, 93450 KUCHING. TEL/FAX:6082-337512</div>
                    <div style="font-size:1.11vw;font-family:Roboto;font-weight:900;text-align:center;">website: www.sakyachosphelling.com &nbsp; email: sakya_chosphel@yahoo.com </div>
                </div>
            </div>

            <!-- Answers Table -->
            <table class="form-display-table">
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Prayer Title</th>
                        <th>#Details</th>
                        <th>Participant</th>
                    </tr>
                    @if(count($data['answers']) >= 2)
                        <tr>
                            <td rowspan="2">1-2</td>
                            <td rowspan="2">
                                {{ $blessingTypes[key($data['answers'])] }}<br>
                                {{ $blessingTypes[key(array_slice($data['answers'], 1, 1, true))] }}
                            </td>
                            <td rowspan="2">
                                <strong>{{ reset($data['answers'])['answer'] }}<br>
                                {{ next($data['answers'])['answer'] }}</strong>
                            </td>
                            <td rowspan="2">{{ $data['surname'] }} {{ $data['givenName'] }}</td>
                        </tr>
                        <tr></tr>
                    @endif


                    @foreach ($data['answers'] as $blessingTypeId => $answerData)
                        @if ($loop->iteration == 3)
                            <tr>
                                <td>3</td>
                                <td>{{ $blessingTypes[$blessingTypeId] }}</td>
                                <td><strong>{{ $answerData['answer'] }}</strong></td>
                                <td>{{ $data['surname'] }} {{ $data['givenName'] }}</td>
                            </tr>
                        @elseif ($loop->iteration > 2)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td colspan="2">
                                    @php
                                        $answers = explode('|', $answerData['answer']);
                                        $titleWithAnswer = $blessingTypes[$blessingTypeId];
                                        foreach ($answers as $answer) {
                                            $titleWithAnswer = preg_replace('/（-）/', ' (<strong>' . trim($answer) . '</strong>) ', $titleWithAnswer, 1);
                                        }
                                    @endphp
                                    {!! $titleWithAnswer !!}
                                </td>
                                <td>{{ $data['surname'] }} {{ $data['givenName'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>



            <div class="user-details pt-3">
                <p>中心全体仝仁以慈悲欢喜心来启建普明大日如来沙坛城超渡及火供大法会，一律随缘，不分种族贫富。愿以此功德力普皆回向佛法常往，世界和平，国泰民安，风调雨顺，五谷丰登。愿十方一切父母众生，丰衣足食，离苦得乐，各满其愿，往生善道，解冤释结，早证菩提</p>
                <p>祝愿：吉祥安详，如意富裕，福寿安康，福慧双修</p>
                <div class="d-flex justify-content-between">
                    <p>（如家境貧困，請注 “貧困” 超渡免費 一切隨緣）</p>
                    <p>隨緣金共  <strong>RM{{ $data['amount'] }}</strong></p>
                </div>
            </div>

            <hr>

            <div class="my-3">
                <p>功德主姓名：<strong>{{ $data['surname'] }} {{ $data['givenName'] }}</strong></p>
                <p>聯絡電話/電郵：<strong>{{ $data['email'] }}</strong></p>
            </div>
        </div>


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
                    window.location.href = '/thankyou';
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
