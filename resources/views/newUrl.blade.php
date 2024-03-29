<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>UGRL</title>
    <style>
        .centered-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .centered-buttons .btn {
            margin: 0 10px;
        }

        input[name="url_name"] {
        font-weight: bold;
        }

        p {
            margin-bottom: 0;
        }

        #title:hover {
            box-shadow: 0 0 5px rgba(0, 100, 255, 0.5); /* 例: 青い影、5pxのぼかし */
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid d-flex">
                <a class="navbar-brand" href="main">
                    <img src="{{asset('storage/mail_FILL0_wght400_GRAD0_opsz24.png')}}"> UGRL
                </a>

                <!-- ml-auto を使用してボタンの間の余白を自動調整 -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" id="mypageButton" href="mypage">mypage</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://mail.google.com/mail/u/0/#inbox?compose=new">Gmail</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="card mx-auto w-75 my-3">
            <div class="card-body">
                <h4 class="card-title">新規メール登録</h4>
                <div class="border rounded my-3">
                    <?php
                    if ($to == null) {
                        echo "<p class='card-text p-2'>To:宛先なし</p>";
                    } else {
                        echo "<p class='card-text p-2'>To:$to</p>";
                    }

                    if ($Cc !== null) {
                        echo "<p class='card-text p-2'>Cc:$Cc</p>";
                    }

                    if ($Bcc !== null) {
                        echo "<p class='card-text p-2'>Bcc:$Bcc</p>";
                    }
                    ?>
                </div>
                <div class="border rounded my-3">
                    <?php
                    if ($subject == null) {
                        echo "<p class='card-text p-2'>件名なし</p>";
                    } else {
                        echo "<p class='card-text p-2'>件名:$subject</p>";
                    }
                    ?>
                </div>
                <div class="border rounded my-3">
                    <?php
                    if ($letterBody == null) {
                        echo "<p class='card-text p-2'>本文なし</p>";
                    } else {
                        echo "<p class='card-text p-2'>$letterBody</p>";
                    }
                    ?>
                </div>
                <div class="border rounded my-3">
                    <p class="card-text p-2" id='URL'>URL:{{$url}}</p>
                    <input type='hidden' id='url' value="{{$url}}">
                </div>
                <form action="/reg" method="post" class="form-group my-2 needs-toccbcc-validation" novalidate>
                    <input type="hidden" name="to" value="{{$to}}" class="form-control">
                    <input type="hidden" name="Cc" value="{{$Cc}}" class="form-control">
                    <input type="hidden" name="Bcc" value="{{$Bcc}}" class="form-control">
                    <input type="hidden" name="subject" value="{{$subject}}" class="form-control">
                    <input type="hidden" name="letterBody" value="{{$letterBody}}" class="form-control">
                    <input type="text" name="url_name" placeholder="下書きタイトルを入力" class="form-control" id="title" required>
                    @php
                        echo "<div class='invalid-feedback text-center' id='feedback'>入力してください</div>";
                    @endphp
                    <div class="centered-buttons">
                        <a href="" class="btn btn-outline-danger back">TOP</a>
                        <button type="button" class="btn btn-outline-success" id="copyUrl">COPY</button>
                        <a href="{{$url}}" target="_blank" class="btn btn-outline-primary">OPEN URL</a>
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <script src='{{ asset("/js/new-confirm.js") }}'></script>
</body>

</html>
