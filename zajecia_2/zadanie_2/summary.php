<?php
session_start();
$startDay = date("d.m.Y", strtotime($_SESSION['stay']['start']));
$endDay = date("d.m.Y", strtotime($_SESSION['stay']['end']));
if (isset($_POST['person'])){
$other_ppl = $_POST['person'];
    foreach ($other_ppl as $index => $data) {
        $_SESSION['persons'][$index] = $data;
    }
    }
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


        </div>
        <div class="bttm">
            <a href="closeSession.php"><div>Zamknij sesje</div></a>
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
