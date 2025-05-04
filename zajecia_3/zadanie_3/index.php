<?php
$plik = "linki.txt";

if (!file_exists($plik)) {
    echo "Plik nie istnieje.";
    exit;
}

$linie = file($plik);
?>

<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Linki</title>
</head>
<body>
<h1>Lista hiperłączy</h1>
<ul>
    <?php
    foreach ($linie as $wiersz) {
        $czesci = explode(" ", $wiersz, 2);
        if (count($czesci) == 2) {
            $adres = htmlspecialchars($czesci[0]);
            $opis = htmlspecialchars($czesci[1]);
            echo "<li><a href=\"$adres\">$opis</a></li>";
        }
    }
    ?>
</ul>
</body>
</html>
