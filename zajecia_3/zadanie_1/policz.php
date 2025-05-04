<?php
require "functions.php";

$AKCJA = $_GET['action'];
$NUM1 = $_GET['num1'];
$NUM2 = $_GET['num2'];


switch ($AKCJA) {
    case 'ADD':
        addNumber($NUM1, $NUM2);
        break;
    case 'SUB':
        subNumber($NUM1, $NUM2);
        break;
    case 'DIV':
        divNumber($NUM1, $NUM2);
        break;

    case 'MUL':
        mulNumber($NUM1, $NUM2);
        break;

    default:
        echo "Nie rób tak.";
        break;
}