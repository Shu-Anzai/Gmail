
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>my page</title>
</head>
<body>
    <header>
        <form action="/main" method="get">
            <button type="submit">create URL page</button>
        </form>
    </header>
    <?php
        foreach ($urls as $key => $url) {
            $name = $url->name;
            $to = $url->to;
            $Cc = $url->cc;
            $Bcc = $url->bcc;
            $subject = $url->subject;
            $letterBody = $url->letter_body;
            echo "<div>";
                echo "<p>".$name."</p>";
                echo "<p>".$to."</p>";
                echo "<p>".$Cc."</p>";
                echo "<p>".$Bcc."</p>";
                echo "<p>".$subject."</p>";
                echo "<p>".$letterBody."</p>";
            echo "</div>";
        }
    ?>

</body>
</html>
