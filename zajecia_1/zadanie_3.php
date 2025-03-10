<?php
$length=10;
$fib=1;
$fib_prev=0;
$tab=[];
for($i = 1; $i < $length; $i++){
    $next = $fib_prev + $fib;
    //echo $next . "\n";
    array_push($tab, $next);
    $fib_prev = $fib;
    $fib = $next;
}

do{
    if ( (current($tab)%2) == 0)
        echo current($tab)." ";
}while(next($tab));