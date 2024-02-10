<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    {{-- <style>
        .custom-btn-group .btn { margin-right: 5px; margin-left: 5px; }
    </style> --}}
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
                        <a class="nav-link" href="main">create URL</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://mail.google.com/mail/u/0/#inbox?compose=new">Gmail</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            @php
                $testController = new \App\Http\Controllers\TestController();
                foreach ($urls as $url) {

                    $name = $url->name;
                    $to = $testController->inputVal($url->to, "To：");
                    $Cc = $testController->inputVal($url->cc, "Cc：");
                    $Bcc = $testController->inputVal($url->bcc, "Bcc：");
                    $subject = $testController->inputVal($url->subject, "件名：");
                    $letterBody = $url->letter_body;
                    $URL = $url->URL;
                    $id = $url->id;

                    echo "<div class='col-md-4 my-2'>";
                        echo "<div class='card'>";
                            echo "<ul class='list-group list-group-flush'>";
                                echo "<li class='list-group-item'><h5 class='card-title'>".$name."</h5></li>";
                                echo $to;
                                echo $Cc;
                                echo $Bcc;
                                echo $subject;
                                if ($letterBody) {
                                    echo "<li class='list-group-item'><p class='card-text'>".$letterBody."</p></li>";
                                }
                            echo "</ul>";

                            // 横に並べるための div を追加
                            echo "<div class='card-body'>";
                                echo "<div class='d-flex justify-content-between mt-1'>";
                                    // OPEN ボタン
                                    echo "<a href=".$URL." target='_blank' class='card-link btn btn-outline-primary mx-3'>OPEN</a>";
                                    // EDIT ボタン
                                    echo "<form action='/edit/{$id}' method='get' class='mx-3'><button type='submit' class='btn btn-outline-success'>EDIT</button></form>";
                                    // DELETE ボタン
                                    echo "<form action='/delete/{$id}' method='get' class='mx-3'><button type='submit' class='btn btn-outline-danger'>DELETE</button></form>";
                                echo "</div>";
                            echo "</div>"; // card-body の終了
                        echo "</div>"; // card の終了
                    echo "</div>"; // col-md-4 の終了
                }
            @endphp
        </div>
    </div>
    <script src='{{ asset("/js/mypage.js") }}'></script>
</body>
</html>
