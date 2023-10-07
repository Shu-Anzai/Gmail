


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail URL Maker</title>
</head>
<body>
    <header>
        <form action="/mypage" method="get">
            <button type="submit">my page</button>
        </form>
    </header>
    <h1>Gmail URL Maker</h1>
    <form action="" method="post">
        <p>To</p>
        <input type="email" name="to" id="to">

        <p>Cc</p>
        <input type="email" name="Cc1" id="Cc">
        <input type="email" name="Cc2" id="Cc">
        <input type="email" name="Cc3" id="Cc">
        <input type="email" name="Cc4" id="Cc">

        <p>Bcc</p>
        <input type="email" name="Bcc1" id="Bcc">
        <input type="email" name="Bcc2" id="Bcc">
        <input type="email" name="Bcc3" id="Bcc">
        <input type="email" name="Bcc4" id="Bcc">

        <p>件名</p>
        <input type="text" name="subject" id="subject">

        <div>
            <p>本文</p>
            <textarea name="letterBody" id="letterBody" cols="100" rows="10"></textarea>
        </div>

        <input type="submit" value="URLを作成">
        @csrf
    </form>
</body>
</html>

