<?php
session_start();
$fileName="rezerwacje.csv";
function startReservationInFile($fileName, $content, $start, $stop)
{
    $firstRow="\nlp;imie;nazwisko;data urodzenia;email;telefon;start;stop";
    file_put_contents($fileName, $firstRow, FILE_APPEND);
    $m=1;
    foreach ($content['persons'] as $person) {
        $bday = date("d.m.Y", strtotime($person['bday']));
        $person= "\n".$m.';'.htmlspecialchars($person['name']).';'.htmlspecialchars($person['lastName']).';'.htmlspecialchars($bday).';'.htmlspecialchars($person['email']).';'.htmlspecialchars($person['phone']).';'.htmlspecialchars($start).';'.htmlspecialchars($stop);
        file_put_contents($fileName, $person, FILE_APPEND);
        $m++;
    }
}

function showReservations($fileName){
    $file = fopen($fileName, "r");
    while(! feof($file))
    {
        $values=fgetcsv($file);
        foreach ($values as $value){
            echo $value."\n";
        }
    }

    fclose($file);
}

$startDay = date("d.m.Y", strtotime($_SESSION['stay']['start']));
$endDay = date("d.m.Y", strtotime($_SESSION['stay']['end']));
if (isset($_POST['person'])){
$other_ppl = $_POST['person'];
    foreach ($other_ppl as $index => $data) {
        $_SESSION['persons'][$index] = $data;
    }
    }
startReservationInFile($fileName, $_SESSION, $startDay, $endDay);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/summaryAsideStyle.css">
    <link rel="stylesheet" href="styles/summaryArticleStyle.css">
</head>
<body>
<header>
    <h1>Rezerwacja</h1>
</header>
<main>
    <nav>

    </nav>
    <article>
        <div class="top">
            <h2>Podsumowanie</h2>
        </div>
        <div class="mid">
        <table>
            <tr>
                <th>Lp.</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Data urodzenia</th>
                <th>Adres email</th>
                <th>Numer telefonu</th>
            </tr>
            <?php
            $n=1;
            foreach ($_SESSION['persons'] as $person) {
                $bday = date("d.m.Y", strtotime($person['bday']));
                echo "<tr>
                    <td>".$n."</td>
                    <td>".$person['name']."</td>
                    <td>".$person['lastName']."</td>
                    <td>".$bday."</td>
                    <td>".$person['email']."</td>
                    <td>".$person['phone']."</td>
                    </tr>";
            $n++;
            }
            ?>
        </table>
        <p>    <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['showcsv'])){
                showReservations($fileName);
            }
            ?>
        </p>
        </div>
        <div class="bttm">
            <a href="closeSession.php"><div>Zamknij sesje</div></a>
        </div>
        <div class="bttm">
            <form action="summary.php" method="post">
                <button type="submit" name="showcsv" value="1">Wczytaj</button>
            </form>
        </div>
    </article>
    <aside>
        <div id="pplCount" class="asideBox">
            <div id="pplCountTop" class="asideBoxTop">
                <h3>Ilość osób</h3>
            </div>
            <div id="pplCountBttm" class="asideBoxBttm">
                <p><?php echo $_SESSION['pplCount'] ?></p>
            </div>
        </div>
        <div id="dates" class="asideBox">
            <div id="datesTop" class="asideBoxTop">
                <h3>Pobyt</h3>
            </div>
            <div id="datesBttm" class="asideBoxBttm">
                <p id="startDate">Od: <?php echo $startDay ?></p>
                <p id="startDate">Do: <?php echo $endDay ?></p>
            </div>
        </div>
        <div id="contact" class="asideBox">
            <div id="contactTop" class="asideBoxTop">
                <h3>Kontakt</h3>
            </div>
            <div id="contactBttm" class="asideBoxBttm">
                <p id="contactEmail">Mail: <?php echo $_SESSION['persons'][0]['email'] ?></p>
                <p id="contactPhone">Tel: <?php echo $_SESSION['persons'][0]['phone'] ?></p>
            </div>
        </div>
        <div id="payment" class="asideBox">
            <div id="paymentTop" class="asideBoxTop">
                <h3>Płatność</h3>
            </div>
            <div id="paymentBttm" class="asideBoxBttm">
                <p id="paymentName"><?php echo $_SESSION['credit']['name'] . " " . $_SESSION['credit']['surname'] ?></p>
                <p id="contactPhone"><?php echo (str_repeat('*',10).substr($_SESSION['credit']['number'], 10)) ?></p>
            </div>
        </div>
        <div id="features" class="asideBox">
            <div id="featuresTop" class="asideBoxTop">
                <h3>Udogodnienia</h3>
            </div>
            <div id="featuresBttm" class="asideBoxBttm">
                <?php
                if ($_SESSION['childBed'] == 1){
                    echo "<p class=\"featureName\">Łóżko dla dziecka</p>";
                }
                foreach ($_SESSION['otherUdogodnieniaOption'] as $udogodnienie) {
                    echo "<p class=\"featureName\">" . $udogodnienie . "</p>";
                }
                ?>
            </div>
        </div>
    </aside>
</main>
<footer>

</footer>


</body>
</html>
