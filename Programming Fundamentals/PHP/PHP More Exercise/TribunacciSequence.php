<?php
$num = intval(readline());
$a = 1;
$b = 1;
$c = 2;
echo $a . " " . $b . " " . $c . " " ;
for($i = 3; $i < $num; $i++) {
    $d = $a + $b + $c;
    $a = $b;
    $b = $c;
    $c = $d;
    echo $d." " ;
}