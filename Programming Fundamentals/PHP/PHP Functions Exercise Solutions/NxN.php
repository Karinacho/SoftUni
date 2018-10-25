<?php

$n=intval(readline());

function matrix($n){
    for($i=0;$i<$n;$i++){
       for($k=0;$k<$n;$k++){
           echo $n . " ";
       }
       echo PHP_EOL;
    }
}

matrix($n);