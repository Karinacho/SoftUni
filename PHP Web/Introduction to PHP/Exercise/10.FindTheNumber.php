<?php

$str=readline();
$elements=readline();

$count=0;

$arr1 = explode(' ',$elements);

$len=strlen($str);

for($i=0;$i<$len;$i++){

    if($str[$i]===$arr1[0]){

        $count++;
        if($count===intval($arr1[1])){
            echo $i;
            return;
        }
    }
}
echo "Find the letter yourself!";