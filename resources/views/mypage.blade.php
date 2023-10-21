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
            <button type="submit">Back to TOP Page</button>
        </form>
    </header>
    <?php
        use app\Http\Controllers\Testcontroller;

        foreach ($urls as $key => $url) {

            $name = $url->name;
            $to = $url->to;
            $Cc = $url->cc;
            $Bcc = $url->bcc;
            $subject = $url->subject;
            $letterBody = $url->letter_body;
            $id = $url->id;
            $key += 1;
            echo "<div>";
                echo "<p>".$name."</p>";
                echo "<p>".$to."</p>";
                echo "<p>".$Cc."</p>";
                echo "<p>".$Bcc."</p>";
                echo "<p>".$subject."</p>";
                echo "<p>".$letterBody."</p>";
                echo "<a href=".$URL.">開く</a>";
                echo "<p>".$key."</p>";
                echo "<form action='/edit/{$id}' method='get'><button type='submit'>edit</button></form>";
            echo "</div><br>";
        }
    ?>

</body>
</html>
