<?php
if (! file_exists("number.txt") || filesize("number.txt") > 0){
    $openedFile = fopen("number.txt", "w+");
    if ($openedFile) {
    fwrite($openedFile, "0");
    fclose($openedFile);
    }
    else{
        echo "Błąd! Czy plik istnieje?\n";
    }
} else {
    $openedFile = fopen("number.txt", "w");
    $size = filesize("number.txt");
    $view = fread($openedFile, $size);
    fwrite($openedFile, $view+1);
    fclose($openedFile);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Odwiedzin:</h1>
<h2><? echo $view ?></h2>
</body>
</html>
