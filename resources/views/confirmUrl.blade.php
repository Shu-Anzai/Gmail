<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>UGRL</title>
</head>
<body>
    <nav class="nav-bar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid d-flex">
            <a class="navbar-brand mr-auto" href="https://mail.google.com/mail/u/0/#inbox?compose=new">
                <img src="{{asset('storage/mail_FILL0_wght400_GRAD0_opsz24.png')}}"> UGRL
            </a>
            <div class=" justify-content-end">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/mypage">mypage</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container text-center">
        <div class="card">
            <div class="card-body">
                <h1>{{$name}}</h1>

                <h2>テンプレート内容</h2>
                <?php
                if ($to == "") {
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
                ?>

                <a href="{{$url}}">URLを開く</a>
                <form action="/save/{{$id}}" method="post">
                    <input type="hidden" name="to" value="{{$to}}">
                    <input type="hidden" name="Cc" value="{{$Cc}}">
                    <input type="hidden" name="Bcc" value="{{$Bcc}}">
                    <input type="hidden" name="subject" value="{{$subject}}">
                    <input type="hidden" name="letterBody" value="{{$letterBody}}">
                    <br>
                    <h3>テンプレート名</h3>
                    <input type="text" name="url_name" value="{{$name}}">
                    <input type="submit" value="保存">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</body>
</html>
