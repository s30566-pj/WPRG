<?php
$fruits=array("apple", "banana", "orange");
$len=0;
$rev="";
foreach($fruits as $fruit){
    $rev="";
    while(isset($fruit[$len])){
        $len++;
    }
    for ($i = $len - 1; $i >= 0; $i--) {
        $rev .= $fruit[$i];

    }
    $rev .= "\n";
    echo $rev;
}