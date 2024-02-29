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
        <div style="display:flex;width:80%;align-items:center;justify-content:center;margin:auto;max-width:595px;max-width:595px;padding:30px 0;">
            <img src="/assets/img/form_logo.png" style="width:25%"/>
            <div style="display:flex;flex-direction:column;gap:0;align-items:center;width:75%">
                <div style="font-size:32px;font-weight:600;text-align:center;letter-spacing:1.5px;font-family:chinese;">佛教金剛乘精舍<span style="font-size:12px">(釋迦中心)</span></div>
                <div style="font-size:16px;font-family:Roboto;font-weight:900;letter-spacing:0.5px;text-align:center;">PUSAT BUDDHA VAJRAYANA KUCHING <br> VAJRAYANA BUDDHIST CENTRE KUCHING</div>
                <div style="font-size:14px;font-family:Roboto;font-weight:900;text-align:center;">(Sakya Chosphel Ling)</div>
                <div style="font-size:15px;font-family:Roboto;font-weight:900;text-align:center;">28, PEACE ROAD, 93450 KUCHING. TEL/FAX:6082-337512</div>
                <div style="font-size:12px;font-family:Roboto;font-weight:900;text-align:center;">website: www.sakyachosphelling.com &nbsp; email: sakya_chosphel@yahoo.com </div>
            </div>
        </div>

        <table class="form-display-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Blessing Type Title</th>
                    <th>People</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <!-- First two rows are merged -->
                @for ($index = 0; $index < min(2, count($userForm->userFormBlessings)); $index++)
                    <tr>
                        @if ($index == 0)
                            <td rowspan="2">1-2</td>
                            <td rowspan="2">
                                {{ $userForm->userFormBlessings[0]->blessingType->title }}<br>
                                {{ $userForm->userFormBlessings[1]->blessingType->title }}
                            </td>
                            <td rowspan="2">
                                <strong>{{ $userForm->userFormBlessings[0]->answer }}<br>
                                {{ $userForm->userFormBlessings[1]->answer }}</strong>
                            </td>
                        @endif
                        <td>{{ $userForm->surname }} {{ $userForm->givenName }}</td>
                    </tr>
                @endfor

                <!-- Third row with separate columns for Blessing Type Title and People -->
                @if (count($userForm->userFormBlessings) > 2)
                    <tr>
                        <td>3</td>
                        <td>{{ $userForm->userFormBlessings[2]->blessingType->title }}</td>
                        <td><strong>{{ $userForm->userFormBlessings[2]->answer }}</strong></td>
                        <td>{{ $userForm->surname }} {{ $userForm->givenName }}</td>
                    </tr>
                @endif

                @foreach ($userForm->userFormBlessings as $index => $blessing)
                    @if ($index > 2)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td colspan="2">
                                @php
                                    $answers = explode('|', $blessing->answer);
                                    $titleWithAnswer = $blessing->blessingType->title;
                                    foreach ($answers as $key => $answer) {
                                        // Replace the first occurrence of `(-)` with each answer
                                        $titleWithAnswer = preg_replace('/（-）/', ' (<strong>' . trim($answer) . '</strong>) ', $titleWithAnswer, 1);
                                    }
                                @endphp
                                {!! $titleWithAnswer !!}
                            </td>
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

