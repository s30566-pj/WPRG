<?php
$filename="tekst.txt";
$tekst = $_POST['podajTekst'] . "\n";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zapis</title>
</head>
<body>
<form action="index.php" method="post">
    <label for="podajTekst">Wpisz poniżej tekst</label>
    <br>
    <input type="text" id="podajTekst" name="podajTekst">
    <button type="submit">Zapisz</button>
    <?php
    if (isset($_POST['podajTekst'])){
        file_put_contents($filename, $tekst, FILE_APPEND);
        echo "<h3>Pomyślnie zapisano tekst do pliku!\n</h3>";
        echo "Treść:\n".$tekst;
    }
    ?>
</form>
</body>
</html>