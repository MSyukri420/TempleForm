<!DOCTYPE html>
<html>
<head>
    <title>Selected Answers</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
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
    <button onclick="captureContent()">Download</button>
    <div class="container">
        <h1>{{ $blessingTypeTitle }}</h1>
        @foreach($answerPairs  as $index => $pair)
            @php
                $modifiedTitle1 = '';
                $modifiedTitle2 = '';
                $modifiedTitle3 = '';
                if (in_array($pair[0]->blessingType->id, [1, 2])) {
                    $modifiedTitle1 = $pair[0]->blessingType->id == 1 ? "顯考" : "顯妣";
                } elseif ($pair[0]->blessingType->id == 3) {
                    $modifiedTitle3 = "祖先";
                }
                if (isset($pair[1])) {
                    if (in_array($pair[1]->blessingType->id, [1, 2])) {
                        $modifiedTitle2 = $pair[1]->blessingType->id == 1 ? "顯考" : "顯妣";
                    } elseif ($pair[1]->blessingType->id == 3) {
                        $modifiedTitle3 = "祖先";
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

                @if(in_array($pair[0]->blessingType->id, [1, 2]))
                    <div class="answer">
                        <th><p class="vertical-text">{{ $modifiedTitle1 }} {{ $pair[0]->answer }}</p></th>
                        @if(isset($pair[1]))
                            <p class="vertical-text">{{ $modifiedTitle2 }} {{ $pair[1]->answer }}</p>
                        @endif
                    </div>

                @elseif($pair[0]->blessingType->id == 3)
                    <div class="answer">
                        <p class="vertical-text">{{ $modifiedTitle3 }} {{ $pair[0]->answer }}</p>
                    </div>

                @else
                    <div class="answer">
                        @php
                            $answers = explode('|', $pair[0]->answer);
                            $formattedAnswer = e($pair[0]->blessingType->title);

                            foreach ($answers as $key => $answer) {
                                $formattedAnswer = preg_replace('/（-）/', '（' . trim($answer) . '）', $formattedAnswer, 1);
                            }
                        @endphp
                        <p class="vertical-text">{!! $formattedAnswer !!}</p>
                        @if(isset($pair[1]))
                            <p class="vertical-text">{{ $pair[1]->blessingType->id }}: {{ $pair[1]->answer }}</p>
                        @endif
                    </div>

                @endif

            @if(($index + 1) % 2 == 0 || $loop->last)
                </div>
            @endif

            @if(($index + 1) % 10 == 0 || $loop->last)
                </div>
            @endif
        @endforeach
    </div>



    <script>
        function captureContent() {
            var node = document.querySelector('.container');
            domtoimage.toPng(node)
                .then(function(dataUrl) {
                    var link = document.createElement('a');
                    link.download = 'answer.png';
                    link.href = dataUrl;
                    link.click();

                    // After downloading the image, send an AJAX request to increment print count
                    incrementPrintCount();
                })
                .catch(function(error) {
                    console.error('oops, something went wrong!', error);
                });
        }

        function incrementPrintCount() {
            const answerIds = @json($answerPairs->flatMap(function ($pair) { return collect($pair)->pluck('id'); })->unique()->values());
            fetch('/dashboard/prayer-answer/download', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ answerIds: answerIds })
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
