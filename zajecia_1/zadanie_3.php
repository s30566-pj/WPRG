<?php
$length=10;
$fib=1;
$fib_prev=0;
echo "0\n1\n";
for($i = 1; $i < $length; $i++){
    $next = $fib_prev + $fib;
    echo $next . "\n";
    $fib_prev = $fib;
    $fib = $next;
}