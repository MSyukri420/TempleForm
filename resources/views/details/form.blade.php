<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Form Details</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
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
    <div class="container">
        <div class="container my-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-3 col-lg-2 mb-3 text-center">
                    <img src="/assets/img/form_logo.png" class="img-fluid" style="height: 200px;" alt="Logo"/>
                </div>
                <div class="col-sm-9 col-lg-6">
                    <h2 class="text-center fs-3 fw-bold mb-2" style="font-family: 'Chinese font', sans-serif;">佛教金剛乘精舍<span class="fs-6">(釋迦中心)</span></h2>
                    <p class="text-center fs-6 fw-bold mb-1">PUSAT BUDDHA VAJRAYANA KUCHING <br> VAJRAYANA BUDDHIST CENTRE KUCHING</p>
                    <p class="text-center fs-6 fw-bold mb-1">(Sakya Chosphel Ling)</p>
                    <p class="text-center fs-6 fw-bold mb-1">28, PEACE ROAD, 93450 KUCHING. TEL/FAX:6082-337512</p>
                    <p class="text-center fw-bold" style="font-size: 12px">website: www.sakyachosphelling.com &nbsp; email: sakya_chosphel@yahoo.com</p>
                </div>
            </div>
        </div>

        <table class="form-display-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Blessing Type Title</th>
                    <th>Details</th>
                    <th>Participant</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blessingTypes as $typeId => $type)
                @php
                    $answersArray = explode('|', $answers[$typeId]->answer ?? '');
                    $title = $type->title;
                    foreach ($answersArray as $answer) {
                        $title = preg_replace('/（-）/', '<strong> (' . $answer . ') </strong>', $title, 1);
                    }
                @endphp

                    @if ($loop->first)
                        <tr>
                            <td rowspan="2">1-2</td>
                            <td>{{ $type->title }}</td>
                            <td>
                                <strong>{{ $answers[$typeId]->answer ?? '' }}<strong>
                            </td>
                            <td rowspan="2">{{ $userForm->surname }} {{ $userForm->givenName }}</td>
                        </tr>
                    @elseif ($loop->iteration == 2)
                        <tr>
                            <td>{{ $type->title }}</td>
                            <td>
                                <strong>{{ $answers[$typeId]->answer ?? '' }}<strong>
                            </td>
                        </tr>
                    @elseif ($loop->iteration == 3)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $type->title }}</td>
                            <td><strong>{{ $answers[$typeId]->answer ?? '' }}<strong></td>
                                <td>{{ $userForm->surname }} {{ $userForm->givenName }}</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td colspan="2">{!! $title !!}</td>
                            <td>{{ $userForm->surname }} {{ $userForm->givenName }}</td>
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
                <p>隨緣金共  <strong>RM{{ $userForm->amount }}</strong></p>
            </div>
        </div>

        <hr>

        <div class="my-3">
            <p>功德主姓名：<strong>{{ $userForm->surname . ' ' . $userForm->givenName }}</strong></p>
            <p>聯絡電話/電郵：<strong>{{ $userForm->email }}</strong></p>
        </div>
    </div>

</body>
</html>

