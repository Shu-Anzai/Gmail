<?php
    if ($subject == null) {
        $recommend = "テンプレート名";
    } else {
        $recommend = $subject . "のメール";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Gmail URL Maker</title>
</head>
<body>
    <header>
        <nav class="nav-bar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid d-flex">
                <a class="navbar-brand mr-auto" href="https://mail.google.com/mail/u/0/#inbox?compose=new">
                    <img src="{{asset('storage/mail_FILL0_wght400_GRAD0_opsz24.png')}}"> Gmail URL Maker
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
    </header>

    <div class="container">
        <div class="card mx-auto w-75 my-3">
            <div class="card-body">
                <h5 class="card-title">新規メール登録</h5>
                <div class="border rounded my-2">
                    <?php
                    if ($to == "") {
                        echo "<p class='card-text p-2'>To:宛先なし</p>";
                    } else {
                        echo "<p class='card-text p-2'>To:$to</p>";
                    }

                    if ($Cc !== "") {
                        echo "<p class='card-text p-2'>Cc:$Cc</p>";
                    }

                    if ($Bcc !== "") {
                        echo "<p class='card-text p-2'>Bcc:$Bcc</p>";
                    }
                    ?>
                </div>
                <div class="border rounded my-2">
                    <?php
                    if ($subject == null) {
                        echo "<p class='card-text p-2'>件名:件名なし</p>";
                    } else {
                        echo "<p class='card-text p-2'>件名:$subject</p>";
                    }
                    ?>
                </div>
                <div class="border rounded my-2">
                    <?php
                    if ($letterBody == null) {
                        echo "<p class='card-text p-2'>本文なし</p>";
                    } else {
                        echo "<p class='card-text p-2'>$letterBody</p>";
                    }
                    ?>
                </div>
                <div class="border rounded my-2">
                    <p class="card-text p-2">URL:{{$url}}</p>
                    <input type='hidden' id='url' value="{{$url}}">
                </div>
                <form action="/reg" method="post" class="form-group my-2">
                    <input type="hidden" name="to" value="{{$to}}" class="form-control">
                    <input type="hidden" name="Cc" value="{{$Cc}}" class="form-control">
                    <input type="hidden" name="Bcc" value="{{$Bcc}}" class="form-control">
                    <input type="hidden" name="subject" value="{{$subject}}" class="form-control">
                    <input type="hidden" name="letterBody" value="{{$letterBody}}" class="form-control">
                    <input type="text" name="url_name" value="{{$recommend}}" class="form-control">
                    <div class="row my-2">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-primary">登録</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-primary" id="copyUrl">copy</button>
                        </div>
                        <div class="col">
                            <a href="{{$url}}" class="btn btn-outline-primary">URLを開く</a>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        <script></script>
    </div>
</body>
</html>
