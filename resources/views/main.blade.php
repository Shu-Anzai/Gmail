<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Gmail URL Maker</title>
</head>
<body>
    {{-- <header>
        <form action="/mypage" method="get" class="form-group">
            <button type="submit" class="btn">my page</button>
        </form>
    </header> --}}
    <div class="container">
        <div class="col-10">
            <h1>Gmail URL Maker</h1>
            @php
                if (isset($url)) {
                    echo "<h1>必ず1つは埋めてください。</h1>";
                }
            @endphp
            <form method="post" class="form-group">

                <div class="row m-3">
                    <div class="col">
                        <input type="email" name="To" class="form-control" placeholder="To">
                    </div>
                    <div class="col">
                        <input type="email" name="To" class="form-control" placeholder="To">
                    </div>
                    <div class="col">
                        <input type="email" name="To" class="form-control" placeholder="To">
                    </div>
                    <div class="col">
                        <input type="email" name="To" class="form-control" placeholder="To">
                    </div>
                </div>

                <div class="row m-3">
                    <div class="col">
                        <input type="email" name="Cc" class="form-control" placeholder="Cc">
                    </div>
                    <div class="col">
                        <input type="email" name="Cc" class="form-control" placeholder="Cc">
                    </div>
                    <div class="col">
                        <input type="email" name="Cc" class="form-control" placeholder="Cc">
                    </div>
                    <div class="col">
                        <input type="email" name="Cc" class="form-control" placeholder="Cc">
                    </div>
                </div>

                <div class="row m-3">
                    <div class="col">
                        <input type="email" name="Bcc" class="form-control" placeholder="Bcc">
                    </div>
                    <div class="col">
                        <input type="email" name="Bcc" class="form-control" placeholder="Bcc">
                    </div>
                    <div class="col">
                        <input type="email" name="Bcc" class="form-control" placeholder="Bcc">
                    </div>
                    <div class="col">
                        <input type="email" name="Bcc" class="form-control" placeholder="Bcc">
                    </div>
                </div>

                <div class="row m-3">
                    <div class="col">
                        <input type="text" name="subject" class="form-control" placeholder="件名">
                    </div>
                </div>

                <div class="row m-3">
                    <div class="col">
                        <textarea name="letterBody" class="form-control" rows="10" placeholder="本文"></textarea>
                    </div>
                </div>

                <div class="row m-3">
                    <div class="col">
                        <input type="submit" value="URLを作成" class="form-control">
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
</body>
</html>

