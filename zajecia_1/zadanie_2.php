<?php
$max_range=100;
$check=0;

for($i=1;$i<=$max_range;$i++){
    $check=0;
    for($j=1;$j<=$i;$j++){
        if($i%$j==0){
            $check++;
        }
    }
    if($check==2){
        echo $i."\n";
    }
}