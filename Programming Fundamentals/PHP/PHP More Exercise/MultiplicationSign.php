<?php

$n1=intval(readline());
$n2=intval(readline());
$n3=intval(readline());

function multiplicationSign($n1,$n2,$n3){
    $result=null;
    if ($n1>= 0 && $n2 >= 0 && $n3 >= 0){
        $result = 'positive';
    } else if ($n1< 0 && $n2 >= 0 && $n3 >= 0) {
        $result = 'negative';
        if($n2===0 || $n3===0){
            $result='positive';
        }
    } else if ($n1 >= 0 && $n2 < 0 && $n3 >= 0) {
        $result = 'negative';
        if($n1===0 || $n3===0){
            $result='positive';
        }
    } else if ($n1 >= 0 && $n2 >= 0 && $n3 < 0) {
        $result = 'negative';
        if($n2===0 || $n3===0){
            $result='positive';
        }
    } else if ($n1 < 0 && $n2 < 0 && $n3 < 0) {
        $result = 'negative';
    } else {
        $result = 'positive';
    }
    return $result;
}


echo multiplicationSign($n1,$n2,$n3);