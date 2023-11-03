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
    <div class=”container”>
        <div class="col-6">
            <h1>Gmail URL Maker</h1>
            @php
                if (isset($url)) {
                    echo "<h1>必ず1つは埋めてください。</h1>";
                }
            @endphp
            <form method="post" class="form-group">

                <div class="row m-3">
                    <div class="col">
                        <input type="email" name="To1" class="form-control" placeholder="To1">
                    </div>
                    <div class="col">
                        <input type="email" name="To2" class="form-control" placeholder="To2">
                    </div>
                    <div class="col">
                        <input type="email" name="To3" class="form-control" placeholder="To3">
                    </div>
                    <div class="col">
                        <input type="email" name="To4" class="form-control" placeholder="To4">
                    </div>
                </div>

                <div class="row m-3">
                    <div class="col">
                        <input type="email" name="Cc1" class="form-control" placeholder="Cc1">
                    </div>
                    <div class="col">
                        <input type="email" name="Cc2" class="form-control" placeholder="Cc2">
                    </div>
                    <div class="col">
                        <input type="email" name="Cc3" class="form-control" placeholder="Cc3">
                    </div>
                    <div class="col">
                        <input type="email" name="Cc4" class="form-control" placeholder="Cc4">
                    </div>
                </div>

                <div class="row m-3">
                    <div class="col">
                        <input type="email" name="Bcc1" class="form-control" placeholder="Bcc1">
                    </div>
                    <div class="col">
                        <input type="email" name="Bcc2" class="form-control" placeholder="Bcc2">
                    </div>
                    <div class="col">
                        <input type="email" name="Bcc3" class="form-control" placeholder="Bcc3">
                    </div>
                    <div class="col">
                        <input type="email" name="Bcc4" class="form-control" placeholder="Bcc4">
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
                    <input type="submit" value="URLを作成" class="col form-control">
                </div>
                @csrf
            </form>
        </div>
    </div>
</body>
</html>

