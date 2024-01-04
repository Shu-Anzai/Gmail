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
                    <a class="navbar-brand" href="/main">
                        <img src="{{asset('storage/mail_FILL0_wght400_GRAD0_opsz24.png')}}"> UGRL
                    </a>

                    <!-- ml-auto を使用してボタンの間の余白を自動調整 -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/mypage">mypage</a>
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
                @php
                    if (isset($url)) {
                        echo "<h1>必ず1つは埋めてください。</h1>";
                    }
                @endphp
                <form action="/edit/{{$target_url[0]->id}}" method="post" class="form-group">
                    {{-- フォーム追加ボタン --}}
                    <div class="row m-3 btn-group" role="group" aria-label="Basic example">
                        <button type="button" name="tobtn" class="btn btn-outline-primary">Add To</button>
                        <button type="button" name="ccbtn" class="btn btn-outline-primary">Add Cc</button>
                        <button type="button" name="bccbtn" class="btn btn-outline-primary">Add Bcc</button>
                    </div>

                    {{-- Toの入力欄 --}}
                    <div class="row m-3" id="torow">
                        @foreach ($target_url[0]->to as $key => $to)
                            @if ($to !== null)
                                <div class="col-sm" name="inputdiv">
                                    <input type="email" name="To" value="{{ $to }}" class="form-control" placeholder="To">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- Toの確認欄 --}}
                    <div class="row m-3">
                        <div class="col list-group" name="ResultTo"></div>
                    </div>
                    <input type="hidden" name="ToFinResult">

                    {{-- Ccの入力欄 --}}
                    <div class="row m-3" id="ccrow">
                        @foreach ($target_url[0]->Cc as $key => $Cc)
                            @if ($Cc !== null)
                                <div class="col-sm">
                                    <input type="email" name="Cc" value="{{ $Cc }}" class="form-control" placeholder="Cc">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- Ccの確認欄 --}}
                    <div class="row m-3">
                        <div class="col list-group" name="ResultCc"></div>
                    </div>
                    <input type="hidden" name="CcFinResult">

                    {{-- Bccの入力欄 --}}
                    <div class="row m-3" id="bccrow">
                        @foreach ($target_url[0]->Bcc as $key => $Bcc)
                            @if ($Bcc !== null)
                                <div class="col-sm">
                                    <input type="email" name="Bcc" value="{{ $Bcc }}" class="form-control" placeholder="Bcc">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- Bccの確認欄 --}}
                    <div class="row m-3">
                        <div class="col list-group" name="ResultBcc"></div>
                    </div>
                    <input type="hidden" name="BccFinResult">

                    {{-- 件名の入力欄 --}}
                    <div class="row m-3">
                        <div class="col">
                            <input type="text" name="subject" value="{{$target_url[0]->subject}}" class="form-control" placeholder="件名">
                        </div>
                    </div>

                    {{-- 本文の入力欄 --}}
                    <div class="row m-3">
                        <div class="col">
                            <textarea name="letterBody" class="form-control" rows="5" placeholder="本文">{{$target_url[0]->letter_body}}</textarea>
                        </div>
                    </div>

                    {{-- URLボタン --}}
                    <div class="row m-3 d-flex align-items-center justify-content-center">
                        <div class="centered-buttons">
                            <a href="/mypage" class="btn btn-outline-danger mr-2">MYPAGE</a>
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
