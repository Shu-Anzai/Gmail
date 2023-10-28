<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        if (isset($url)) {
            echo "<h1>必ず1つは埋めてください。</h1>";
        }
    @endphp
    <form action="/edit/{{$target_url[0]->id}}" method="post">
        <p>To</p>
        <input type="email" name="to" value="{{$target_url[0]->to}}">

        {{-- {{$target_url[0]}} --}}
        <p>Cc</p>
        @foreach ($target_url[0]->Cc as $key => $Cc)
            @if ($Cc !== "")
                <input type="email" name="Cc{{ $key + 1 }}" value="{{ $Cc }}">
            @else
                @php
                    $key = -1;
                @endphp
            @endif
        @endforeach
        @for ($i = $key +1; $i < 4; $i++)
            <input type='email' name='Cc{{ $i + 1 }}'>
        @endfor

        <p>Bcc</p>
        @foreach ($target_url[0]->Bcc as $key => $Bcc)
            @if ($Bcc !== "")
                <input type="email" name="Bcc{{ $key + 1 }}" value="{{ $Bcc }}">
            @else
                @php
                    $key = -1;
                @endphp
            @endif
        @endforeach
        @for ($i = $key +1; $i < 4; $i++)
            <input type='email' name='Bcc{{ $i + 1 }}'>
        @endfor

        <p>件名</p>
        <input type="text" name="subject" value="{{$target_url[0]->subject}}">

        <div>
            <p>本文</p>
            <textarea name="letterBody" cols="100" rows="10">{{$target_url[0]->letter_body}}</textarea>
        </div>

        <input type="submit" value="保存">
        @csrf
    </form>

</body>
</html>
