<?php
$txt = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
galley of type and scrambled it to make a type specimen book. It has survived not only five
centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
and more recently with desktop publishing software like Aldus PageMaker including versions of
Lorem Ipsum.";


$array = explode(" ", str_replace(["\n", "\r"], " ", $txt));


$len = count($array);


for ($i = 0; $i < $len; $i++) {
    $cleanWord = "";

    for ($j = 0; $j < strlen($array[$i]); $j++) {
        if (!in_array($array[$i][$j], [',', '.', '!', '?', ':', ';', '"', "'", '(', ')'])) {
            $cleanWord .= $array[$i][$j];
        }
    }

    $array[$i] = $cleanWord;
}


$filteredArray = [];
for ($i = 0; $i < $len; $i++) {
    if ($array[$i] !== "") {
        $filteredArray[] = $array[$i];
    }
}
$array = $filteredArray;
$len = count($array);

$assocArray = [];
for ($i = 0; $i < $len - 1; $i += 2) {
    $assocArray[$array[$i]] = $array[$i + 1];
}

foreach ($assocArray as $key => $value) {
    echo "$key => $value\n";
}
