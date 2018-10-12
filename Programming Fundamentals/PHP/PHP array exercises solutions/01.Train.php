<?php

$n=intval(readline());
$train='';
$sum=0;
for($i=0;$i<$n;$i++){
    $people=intval(readline());
    $train.="$people ";
    $sum+=$people;
}
echo $train . PHP_EOL;
echo $sum;