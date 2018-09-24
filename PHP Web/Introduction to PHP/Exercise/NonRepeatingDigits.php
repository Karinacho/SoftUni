<?php

$n=intval(readline());
$count=0;
$arr=array();
    for($i=1;$i<=9;$i++) {

        for ($j = 0; $j <= 9; $j++) {


            for ($k = 0; $k <= 9; $k++) {
                $numStr = $i . $j . $k;
                $number = (int)$numStr;
                if ($number > $n) {
                    break;
                }
                $firstDigit = floor($number / 100);
                $secondDigit = floor(($number / 10) % 10);
                $thirdDigit = floor($number % 10);

                if ($firstDigit != $secondDigit && $firstDigit != $thirdDigit) {
                    if ($secondDigit != $thirdDigit) {
                        array_push($arr, $firstDigit.$secondDigit.$thirdDigit);
                        $count++;
                    }
                }
            }

        }

    }
if ($count == 0) {
    echo "no";
}else if(count($arr) > 0) {
    echo implode(', ', $arr);
}
