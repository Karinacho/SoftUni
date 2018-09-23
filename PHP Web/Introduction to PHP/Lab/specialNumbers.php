<?php

$n=(int)readline();
$digit=0;
$sum=0;
$numb=0;
for($i=1;$i<=$n;$i++){

      $numb=$i;


    while($numb!==0){

        $digit=(int)substr($numb, -1);

        $numb=intval($numb/10);

        $sum+=$digit;

    }
    if($sum===5 || $sum===7 || $sum===11){
        echo "$i -> True" . PHP_EOL;
    }
    else{
        echo "$i -> False" . PHP_EOL;
    }
    $sum=null;
}