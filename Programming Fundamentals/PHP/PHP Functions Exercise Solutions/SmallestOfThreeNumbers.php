<?php

$a=intval(readline());
$b=intval(readline());
$c=intval(readline());

function smallestOfThree($a,$b,$c){
$smallest=null;
$smallest=min($a,$b,$c);
return $smallest;
}
echo smallestOfThree($a,$b,$c);