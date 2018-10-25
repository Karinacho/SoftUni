<?php

$a=intval(readline());
$b=intval(readline());
$c=intval(readline());

function sum($a,$b){
    return $a+$b;
}
 function subtract($sum,$c){
    return $sum-$c;
 }

 echo subtract(sum($a,$b),$c);