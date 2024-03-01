<!DOCTYPE html>
<html>
<head>
    <title>Selected Answers</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/css/dashboard.css" rel="stylesheet">
    <style>
        body {
            background: 0;
        }
        .download {
            background: white;
        }
        .answer-wrapper {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            margin-bottom: 50px;
        }
        .answer-group {
            display: flex;
            flex-direction: column;
        }
        .answer {
            display: flex;
            justify-content: center;
            background-image: url('/assets/img/form.png');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            height: 500px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #000;
            padding: 120px 10px 90px 10px;
            position: relative;
        }
        .vertical-text {
            writing-mode: vertical-lr;
            text-orientation: upright;
            font-weight: bold;
            margin: 0;
        }
    </style>
</head>


<body>
    <main id="main" class="main">

        @include('components/header')
        @include('components/sidebar')

        <div class="container">
            <button onclick="captureContent()" class="btn btn-primary my-4">Download</button>
            <h1 class="my-3">{{ $blessingTypeTitle }}</h1>
            <div class="download">
                @foreach($answers as $index => $answer)
                    @php
                        switch ($answer->blessingType->id) {
                            case 1:
                                $modifiedTitle = "顯考 " . $answer->answer;
                                break;
                            case 2:
                                $modifiedTitle = "顯妣 " . $answer->answer;
                                break;
                            case 3:
                                $modifiedTitle = "祖先 " . $answer->answer;
                                break;
                            default:
                            $answersArray = explode('|', $answer->answer ?? '');
                            $modifiedTitle = $answer->blessingType->title;

                            foreach ($answersArray as $answerPart) {
                                $modifiedTitle = preg_replace('/（-）/', $answerPart, $modifiedTitle, 1);
                            }
                        }
                    @endphp


                    @if($index % 10 == 0)
                        @if(!$loop->first)
                        @endif
                        <div class="answer-wrapper">
                    @endif

                    @if($index % 2 == 0)
                        <div class="answer-group">
                    @endif

                            <div class="answer">
                                <p class="vertical-text">{{ $modifiedTitle }}</p>
                            </div>

                    @if(($index + 1) % 2 == 0 || $loop->last)
                        </div>
                    @endif

                    @if(($index + 1) % 10 == 0 || $loop->last)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </main>


    <script>
        function captureContent() {
            var node = document.querySelector('.download');
            domtoimage.toPng(node)
                .then(function(dataUrl) {
                    var link = document.createElement('a');
                    link.download = 'answer.png';
                    link.href = dataUrl;
                    link.click();
                    incrementPrintCount();
                })
                .catch(function(error) {
                    console.error('oops, something went wrong!', error);
                });
        }

        function incrementPrintCount() {
            fetch('/dashboard/prayer-answer/download', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ answerIds: @json($answerIds) })
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>


</body>
</html>
