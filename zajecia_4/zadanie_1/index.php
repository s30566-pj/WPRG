<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/indexStyle.css">
</head>
<body>
<header>
    <h1>Rezerwacja</h1>
</header>
<main>
    <nav>

    </nav>
    <article>
        <form action="step2.php" method="post">
            <div id="basicInfo">
                <div id="basicInfoHeading"><h2>Podstawowe informacje</h2></div>
                <div id="basicInfoForm">
                    <div id="firstInfo">
                        <div id="pplCount">
                            <label id="pplCountLabel" for="pplCountVal">Ilość osób</label>
                            <select <?php echo isset($_COOKIE['pplCount']) ? "value=\"".htmlspecialchars($_COOKIE['pplCount'])."\"" : '';?> id="pplCountVal" name="pplCountVal">
                                <option value="1" <?php echo isset($_COOKIE['pplCount']) && $_COOKIE['pplCount'] == 1 ? "selected" : '';?>>1</option>
                                <option value="2" <?php echo isset($_COOKIE['pplCount']) && $_COOKIE['pplCount'] == 2 ? "selected" : '';?>>2</option>
                                <option value="3" <?php echo isset($_COOKIE['pplCount']) && $_COOKIE['pplCount'] == 3 ? "selected" : '';?>>3</option>
                                <option value="4" <?php echo isset($_COOKIE['pplCount']) && $_COOKIE['pplCount'] == 4 ? "selected" : '';?>>4</option>
                            </select>
                        </div>
                        <div id="startEndDate">
                            <div id="startDateHeading"><h3>Czas pobytu</h3></div>
                            <div id="startEndDatesInputs">
                                <label for="startDate">Od:</label>
                                <input type="date" id="startDate" name="stay[start]" required>
                                <label for="endDate">Do:</label>
                                <input type="date" id="endDate" name="stay[end]" required>
                            </div>
                        </div>
                    </div>
                    <div id="personalInfo">
                        <h3>Informacje osobowe</h3>
                        <label for="fname">Imię:</label>
                        <input type="text" id="fname" name="person[0][name]" placeholder="Adam" required>
                        <label for="lname">Nazwisko:</label>
                        <input type="text" id="lname" name="person[0][lastName]" placeholder="Kowalski" required>
                        <label for="bday">Data urodzenia:</label>
                        <input type="date" id="bday" name="person[0][bday]" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="person[0][email]" placeholder="adam@domena.tld" required>
                        <label for="phone">Numer telefonu:</label>
                        <input type="tel" id="phone" name="person[0][phone]" placeholder="+48123456789" required>
                    </div>
                    <div id="paymentInfo">
                        <h3>Karta płatnicza</h3>
                        <label for="creditFname">Imię:</label>
                        <input type="text" id="creditFname" name="credit[name]" required>
                        <label for="creditLname">Nazwisko:</label>
                        <input type="text" id="creditLname" name="credit[surname]" required>
                        <label for="cardNumber">Numer karty:</label>
                        <input type="number" id="cardNumber" name="credit[number]" pattern="[0-9]{13,16}" placeholder="np. 1234123412341234"  required>
                        <div id="smallerCardInfo">
                        <label for="cvv">CVV:</label>
                        <input type="number" id="cvv" name="credit[cvv]" pattern="[0-9]{3}" placeholder="123" required>
                            <label for="exp">Exp</label>
                            <input type="text" id="exp" name="credit[expiry]" pattern="[0-9]{2}\/[0-9]{2}" placeholder="03/29" required>
                        </div>
                    </div>
                </div>
            </div>
            <div id="udogodnienia">
                <div id="udogodnieniaHeading"><h2>Udogodnienia</h2></div>
                <div id="selectUdogodnienia">
                    <div id="childBed">
                        <div id="childBedHeading"><h3>Łóżeczko dla dziecka</h3></div>
                        <div id="selectChildBed">
                            <input type="radio" id="childBedYes" name="childBedSelection" value="1">
                            <label for="childBedYes">Tak</label>
                            <input type="radio" id="childBedNo" name="childBedSelection" value="0">
                            <label for="childBedNo">Nie</label>
                        </div>
                    </div>
                    <div id="otherUdogodnienia">
                        <div id="otherUdogodnieniaHeading"><h3>Pozostałe</h3></div>
                        <div id="otherUdogodnieniaList">
                            <div class="checkbox">
                                <input type="checkbox" id="otherUdogodnieniaPopielniczka" name="otherUdogodnieniaOption[0]" value="popielniczka">
                                <label for="otherUdogodnieniaPopielniczka">Popielniczka</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="otherUdogodnieniaKlimatyzacja" name="otherUdogodnieniaOption[1]" value="klimatyzacja">
                                <label for="otherUdogodnieniaKlimatyzacja">Klimatyzacja</label>
                            </div>
                        </div>
                    </div>

                </div>
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