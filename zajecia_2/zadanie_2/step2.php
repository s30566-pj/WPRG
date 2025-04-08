<?php
session_start();

$pplCount = isset($_POST['pplCountVal']) ? (int) $_POST['pplCountVal'] : -1;
$_SESSION['pplCount'] = $pplCount;
$_SESSION['persons'][0] = $_POST['person'][0];

if ($pplCount == 1) {
    header('Location: summary.php');
    exit;
} elseif ($pplCount < 1) {
    headers_send(422);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/step2Style.css">
</head>
<body>
<header>
    <h1>Rezerwacja</h1>
</header>
<main>
    <nav>

    </nav>
    <article>
        <form action="summary.php" method="post">
            <div id="repeatableSection">
            <?php
            for ($i = 1; $i < $pplCount; $i++) {
                echo "
                <div class = \"basicInfoForm\" >
                    <div class = \"personalInfo\" >
                        <h3 > Osoba " . ($i +1) . " </h3 >
                        <label for=\"fname\" > Imię:</label >
                        <input type = \"text\" id = \"fname\" name = \"person[".$i."][name]\" placeholder = \"Adam\" required >
                        <label for=\"lname\" > Nazwisko:</label >
                        <input type = \"text\" id = \"lname\" name = \"person[".$i."][lastName]\" placeholder = \"Kowalski\" required >
                        <label for=\"bday\" > Data urodzenia:</label >
                        <input type = \"date\" id = \"bday\" name = \"person[".$i."][bday]\" required >
                        <label for=\"email\" > Email:</label >
                        <input type = \"email\" id = \"email\" name = \"person[".$i."][email]\" placeholder = \"adam@domena.tld\" required >
                        <label for=\"phone\" > Numer telefonu:</label >
                        <input type = \"tel\" id = \"phone\" name = \"person[".$i."][phone]\" placeholder = \"+48123456789\" required >
                    </div >
                    
                </div >
            ";
            }
            ?>
            </div>
            <div id="buttonSection">
                <button type="submit">Przejdź dalej</button>
            </div>
        </form>
    </article>
    <aside>

    </aside>
</main>
<footer>

</footer>


</body>
</html>