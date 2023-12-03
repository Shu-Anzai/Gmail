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

    <div class="container text-center row">
        {{-- <div class=""> --}}
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">新規テンプレート作成</h5>
                        <div class="border rounded">
                            <?php
                            if ($to == "") {
                                echo "<p class='card-text'>To:宛先なし</p>";
                            } else {
                                echo "<p class='card-text'>To:$to</p>";
                            }

                            if ($Cc !== "") {
                                echo "<p class='card-text'>Cc:$Cc</p>";
                            }

                            if ($Bcc !== "") {
                                echo "<p class='card-text'>Bcc:$Bcc</p>";
                            }
                            ?>
                        </div>
                        <div class="border rounded">
                            <?php
                            if ($subject == null) {
                                echo "<p class='card-text'>件名:件名なし</p>";
                            } else {
                                echo "<p class='card-text'>件名:$subject</p>";
                            }
                            ?>
                        </div>
                        <div class="border rounded">
                            <?php
                            if ($letterBody == null) {
                                echo "<p class='card-text'>本文なし</p>";
                            } else {
                                echo "<div>$letterBody</div>";
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php
                        echo "<p>URL:$url</p>";
                        echo "<input type='hidden' id='url' value=$url>";


                        if ($subject == null) {
                            $recommend = "テンプレート";
                        } else {
                            $recommend = $subject . "のメール";
                        }
                        ?>
                    </div>
                    <button type="button" class="btn btn-outline-primary" id="copyUrl">copy</button>
                    <a href="{{$url}}" class="btn btn-link">URLを開く</a>
                </div>
            </div>
            <div class="col-3">

                <form action="/reg" method="post" class="form-group">
                    <input type="hidden" name="to" value="{{$to}}" class="form-control">
                    <input type="hidden" name="Cc" value="{{$Cc}}" class="form-control">
                    <input type="hidden" name="Bcc" value="{{$Bcc}}" class="form-control">
                    <input type="hidden" name="subject" value="{{$subject}}" class="form-control">
                    <input type="hidden" name="letterBody" value="{{$letterBody}}" class="form-control">
                    <h3>テンプレート名</h3>
                    <input type="text" name="url_name" value="{{$recommend}}" class="form-control">
                    <input type="submit" value="登録" class="form-control">
                    @csrf
                </form>
            </div>
        {{-- </div> --}}
        <script></script>
    </div>
</body>
</html>
