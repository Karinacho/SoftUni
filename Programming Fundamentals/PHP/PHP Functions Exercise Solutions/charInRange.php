<?php

$a=readline();
$b=readline();
function charRange($a,$b){
    $min=min(ord(($a)),ord($b));
    $max=max(ord(($a)),ord($b));
    for($i=$min+1;$i<$max;$i++){
        echo chr($i)." ";
    }
}

charRange($a,$b);