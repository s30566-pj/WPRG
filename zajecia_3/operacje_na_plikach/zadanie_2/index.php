<?php
$views = 0;
$filename="number.txt";
if (! file_exists($filename)){
    file_put_contents($filename, "0");
}
        $views = (int)file_get_contents($filename);
        $views ++;
        file_put_contents($filename, $views);

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
<h2><?php echo $views ?></h2>
</body>
</html>
