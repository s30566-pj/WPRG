<?php
if ($_GET['num']){
    $number = (int) $_GET['num'];
    $iteration = 0;

    function isPrime()
    {
        global $iteration;
        global $number;
        if ($number <= 1)
            return false;
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i == 0) {return false;}
            $iteration = $i;
        }
        return true;
    }

    $isPrimeBool = isPrime();

    function text()
    {
        global $number;
        if (isPrime($number)) {
            return $number . " Jest liczbą pierwszą";
        } else {
            return $number . " <strong>Nie</strong> jest liczbą pierwsza";
        }
    }

    function result()
    {
        echo "<div id='isPrimeInfo'>
        <h3>Liczba ".text()."</h3>
        </div>";
    }

    function iterationNumber()
    {
        global $iteration;
        echo "<div id='iteration'>
        <p>Sprawdzanie wymagało ".$iteration." kroków</p>
        </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liczba pierwsza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Liczba pierwsza</h1>
</header>
<main>
    <nav>

    </nav>
    <article>
        <form action="index.php" method="get">
            <?php
            if ($_GET['num']){
            result();
            iterationNumber();
            }
            ?>
            <div id="numbers">
            <input type="number" id="num" name="num" placeholder="Podaj liczbe">
            </div>
            <button type="submit">Sprawdź czy to liczba pierwsza</button>
        </form>
    </article>
    <aside>

    </aside>
</main>
<footer>

</footer>


</body>
</html>