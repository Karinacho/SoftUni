<?php

$arr=explode(' ',readline());
$arr=array_map('intval',$arr);
$n=intval(readline());
for ( $i = 0; $i < count($arr); $i++){
    $temp = $arr[$i];

        $arr[$i] = $temp;
    }
for ($i = 0; $i < count($arr)-1; $i++){
    for ($j = $i + 1; $j < count($arr); $j++){
        $first = $arr[$i];
        $second = $arr[$j];

        if ($first + $second === $n){
            echo "$first $second ".PHP_EOL;
        }

    }
}