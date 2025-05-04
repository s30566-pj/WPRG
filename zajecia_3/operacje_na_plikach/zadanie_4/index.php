<?php
$plik = "ip.txt";

$userIp = $_SERVER['REMOTE_ADDR'];

$allowedIp = file($plik);

if (in_array($userIp, $allowedIp)) {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Wybrani</title>
    </head>
    <body>
    <h1>Witaj, wybrany użytkowniku z IP: <?php echo $userIp; ?></h1>
    <p>To jest specjalna wersja strony dostępna tylko dla Ciebie.</p>
    </body>
    </html>
    <?php
} else {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Wszyscy</title>
    </head>
    <body>
    <h1>Witaj na stronie ogólnej</h1>
    <p>Twoje IP: <?php echo $userIp; ?> nie znajduje się na liście wyjątków.</p>
    </body>
    </html>
    <?php
}
?>
