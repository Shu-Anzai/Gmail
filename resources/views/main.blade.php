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
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid d-flex">
                <a class="navbar-brand" href="main">
                    <img src="{{asset('storage/mail_FILL0_wght400_GRAD0_opsz24.png')}}"> UGRL
                </a>

                <!-- ml-auto を使用してボタンの間の余白を自動調整 -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="mypage">mypage</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://mail.google.com/mail/u/0/#inbox?compose=new">Gmail</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container text-center">
        <div class="gy-2">
            {{-- フォーム追加ボタン --}}
            <form method="post" class="form-group needs-toccbcc-validation" novalidate>
                <div class="row m-3 btn-group" role="group" aria-label="Basic example">
                    <button type="button" name="tobtn" class="btn btn-outline-primary">Add To</button>
                    <button type="button" name="ccbtn" class="btn btn-outline-primary">Add Cc</button>
                    <button type="button" name="bccbtn" class="btn btn-outline-primary">Add Bcc</button>
                </div>

                {{-- Toの入力欄 --}}
                <div class="row m-3" id="torow">
                    <div class="col-sm" name="inputdiv">
                        <input type="email" id="To" name="To" class="form-control" placeholder="To" required>
                        <div class='invalid-feedback' id='Tofeedback'></div>
                    </div>
                </div>

                {{-- Toの確認欄 --}}
                <div class="row m-3">
                    <div class="col text-break" name="ResultTo"></div>
                </div>

                <input type="hidden" name="ToFinResult">



                {{-- Ccの入力欄 --}}
                <div class="row m-3" id="ccrow">
                    <div class="col-sm" name="inputdiv">
                        <input type="email" id="Cc" name="Cc" class="form-control" placeholder="Cc" required>
                        <div class='invalid-feedback' id='Ccfeedback'></div>
                    </div>
                </div>

                {{-- Ccの確認欄 --}}
                <div class="row m-3">
                    <div class="col text-break" name="ResultCc"></div>
                </div>

                <input type="hidden" name="CcFinResult">



                {{-- Bccの入力欄 --}}
                <div class="row m-3" id="bccrow">
                    <div class="col-sm" name="inputdiv">
                        <input type="email" id="Bcc" name="Bcc" class="form-control" placeholder="Bcc" required>
                        <div class='invalid-feedback' id='Bccfeedback'></div>
                    </div>
                </div>

                {{-- Bccの確認欄 --}}
                <div class="row m-3">
                    <div class="col text-break" name="ResultBcc"></div>
                </div>

                <input type="hidden" name="BccFinResult">

                {{-- 件名の入力欄 --}}
                <div class="row m-3">
                    <div class="col">
                        <input type="text" name="subject" class="form-control" placeholder="件名" required>
                    </div>
                </div>

                {{-- 本文の入力欄 --}}
                <div class="row m-3">
                    <div class="col">
                        <textarea name="letterBody" class="form-control" rows="5" placeholder="本文" required></textarea>
                        @php
                            echo "<div class='invalid-feedback' id='feedback'></div>";
                        @endphp

                    </div>
                </div>

                {{-- URLボタン --}}
                <div class="row m-3 d-flex align-items-center justify-content-center">
                    <div class="col-2">
                        <button type="submit" class="btn btn-outline-secondary mr-2">URLを作成</button>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
    <script src='{{ asset("/js/main.js") }}'></script>
</body>
</html>

