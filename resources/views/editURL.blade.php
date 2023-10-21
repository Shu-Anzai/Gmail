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
    <form action="" method="post">
        <p>To</p>
        <input type="email" name="to" value="{{$target_url[0]->to}}">

        {{-- <p>Cc</p>
        <input type="email" name="Cc1" value="{{}}">
        <input type="email" name="Cc2" value="{{}}">
        <input type="email" name="Cc3" value="{{}}">
        <input type="email" name="Cc4" value="{{}}">

        <p>Bcc</p>
        <input type="email" name="Bcc1" value="{{}}">
        <input type="email" name="Bcc2" value="{{}}">
        <input type="email" name="Bcc3" value="{{}}">
        <input type="email" name="Bcc4" value="{{}}"> --}}

        <p>件名</p>
        <input type="text" name="subject" value="{{$target_url[0]->subject}}">

        <div>
            <p>本文</p>
            <textarea name="letterBody" cols="100" rows="10">{{$target_url[0]->letter_body}}</textarea>
        </div>

        <input type="submit" value="保存">
        @csrf
    </form>
    <div>{{$target_url}}</div>

</body>
</html>
