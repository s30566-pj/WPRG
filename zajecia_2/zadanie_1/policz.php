<?php
$AKCJA = $_GET['action'];
$NUM1 = $_GET['num1'];
$NUM2 = $_GET['num2'];
switch ($AKCJA) {
    case 'ADD':
        echo $NUM1 + $NUM2;
        break;
    case 'SUB':
        echo $NUM1 - $NUM2;
        break;
    case 'DIV':
        echo $NUM1 / $NUM2;
        break;

    case 'MUL':
        echo $NUM1 * $NUM2;
        break;

    default:
        echo "Nie rób tak.";
        break;
}