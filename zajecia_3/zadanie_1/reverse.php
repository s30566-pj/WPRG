<?php

$file = "plik.txt";

if (file_exists($file)) {
    $lines = file($file);

    $lines = array_reverse($lines);

    file_put_contents($file, implode("", $lines));

    echo "Kolejność wierszy została odwrócona.\n";
} else {
    echo "Plik nie istnieje!\n";
}

