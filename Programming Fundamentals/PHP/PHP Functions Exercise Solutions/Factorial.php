<?php

$a=intval(readline());
$b=intval(readline());

function firstFactorial($a){
    $n=$a;
    $finalsum=0;
    while($n!==0){
        $sum=0;
        $faktoriel=1;

        $currentNum=intval($n%10);
        for($i=$currentNum;$i>0;$i--){
            $faktoriel*=$i;
        }
        $sum+=$faktoriel;
        $n=intval($n/10);
        $finalsum+=$sum;
    }
 return $finalsum;
}
function secondFactorial($b){
    $n=$b;
    $finalsum=0;
    while($n!==0){
        $sum=0;
        $faktoriel=1;

        $currentNum=intval($n%10);
        for($i=$currentNum;$i>0;$i--){
            $faktoriel*=$i;
        }
        $sum+=$faktoriel;
        $n=intval($n/10);
        $finalsum+=$sum;
    }
    return $finalsum;
}

function result($sum1,$sum2){

    $res=(float)$sum1/$sum2;
    return printf("%.2f",$res);
}
 result(firstFactorial($a),secondFactorial($b));
//echo(firstFactorial($a));