<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Podsumowanie Rezerwacji</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$pplCount = isset($_POST['pplCountVal']) ? intval($_POST['pplCountVal']) : -1;
$fname = isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : '';
$lname = isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$childBedSelection = isset($_POST['childBedSelection']) ? intval($_POST['childBedSelection']) : -1;
}
?>
</body>
</html>