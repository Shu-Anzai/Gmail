<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Gmail URL Maker</title>
</head>
<body>
    <h1>新規テンプレート</h1>

    <h2>テンプレート内容</h2>
    <?php
    if ($to == null) {
        echo "<h3>To</h3><p>宛先なし</p>";
    } else {
        echo "<h3>To</h3><p>$to</p>";
    }

    if ($Cc !== "") {
        echo "<h3>Cc</h3><p>$Cc</p>";
    }

    if ($Bcc !== "") {
        echo "<h3>Bcc</h3><p>$Bcc</p>";
    }

    if ($subject == null) {
        echo "<h3>件名</h3><p>件名なし</p>";
    } else {
        echo "<h3>件名</h3><p>$subject</p>";
    }

    if ($letterBody == null) {
        echo "<h3>本文</h3><p>本文なし</p>";
    } else {
        echo "<h3>本文</h3><div>$letterBody</div>";
    }

    echo "<h3>URL</h3><p>$url</p>";


    if ($subject == null) {
        if($to == null){
            $recommend = "テンプレート";
        }else{
            $recommend = $to . "宛のメール";
        }
    } else {
        $recommend = $subject . "のメール";
    }
    ?>




    <a href="{{$url}}">URLを開く</a>
    <form action="/reg" method="post">
        <input type="hidden" name="to" value="{{$to}}">
        <input type="hidden" name="Cc" value="{{$Cc}}">
        <input type="hidden" name="Bcc" value="{{$Bcc}}">
        <input type="hidden" name="subject" value="{{$subject}}">
        <input type="hidden" name="letterBody" value="{{$letterBody}}">
        <br>
        <h3>テンプレート名</h3>
        <input type="text" name="url_name" value="{{$recommend}}">
        <input type="submit" value="登録">
        @csrf
    </form>
</body>
</html>
