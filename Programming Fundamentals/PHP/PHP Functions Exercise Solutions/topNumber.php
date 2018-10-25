<?php

$n=intval(readline());

function topNumber($n){

    for($i=1;$i<=$n;$i++){
        $k=$i;
        $sum=0;
        $odd=false;
        while($k!==0){
            $current=intval($k%10);
            if($current%2!==0){
                $odd=true;
            }
            $k=intval($k/10);
            $sum+=$current;
        }
        if($odd && $sum%8===0){
            echo $i .PHP_EOL;
        }
    }

}
topNumber($n);