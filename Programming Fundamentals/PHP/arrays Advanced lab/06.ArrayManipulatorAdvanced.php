<?php

$arr=array_map('intval',explode(' ',readline()));

while(true) {
    $line = readline();
    if ($line === 'end') {
        break;
    }
    $tokens = explode(" ", $line);

    switch($tokens[0]){
        case "Contains":
            $number=intval($tokens[1]);
            if(in_array($number,$arr)){
                echo 'Yes' . PHP_EOL;
            }else{
                echo "No such number" . PHP_EOL;
            }
            break;

        case "Print":
            if($tokens[1]==='even'){
                $filterArray = array_filter($arr, function ($var) {
                    return ($var%2===0);
                });
                echo implode(' ',$filterArray) . PHP_EOL;
            }else if($tokens[1] ==='odd'){
                $filterArray = array_filter($arr, function ($var) {
                    return ($var%2!==0);
                });
                echo implode(' ',$filterArray) . PHP_EOL;
            }
            break;
        case "Get":
            $result=array_sum($arr);
            echo $result .PHP_EOL;
            break;
        case "Filter":
            $condition=$tokens[1];
            $num=intval($tokens[2]);

            if($condition ==='<'){

                $filterArray = array_filter($arr, function ($var) use($num) {
                    return ($var<$num );
                });
                echo implode(' ',$filterArray) . PHP_EOL;
            }
           else if($condition ==='>'){

                $filterArray = array_filter($arr, function ($var) use($num) {
                    return ($var>$num );
                });
                echo implode(' ',$filterArray) . PHP_EOL;
            }
           else if($condition ==='<='){

                $filterArray = array_filter($arr, function ($var) use($num) {
                    return ($var<=$num );
                });
                echo implode(' ',$filterArray) . PHP_EOL;
            }
            if($condition ==='>='){

                $filterArray = array_filter($arr, function ($var) use($num) {
                    return ($var>=$num );
                });
                echo implode(' ',$filterArray) . PHP_EOL;
            }

    }
}