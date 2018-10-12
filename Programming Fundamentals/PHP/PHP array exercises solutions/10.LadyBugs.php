<?php


$size=intval(readline());
$indexes=array_map('intval',explode(' ',readline()));
$commands='';
$arr=[];
for($i=0;$i<$size;$i++){

                if (in_array($i,$indexes))
                {
                    $arr[$i] = 1;
                }else{
                    $arr[$i]=0;
                }

}

while(($commands=readline())!=='end') {
    $commands = explode(' ', $commands);
    // print_r($commands);
    $index = intval($commands[0]);


    $direction = $commands[1] === "left" ? -1 : 1;
    $steps = intval($commands[2])*$direction;
                if ($index < 0 || $index >= $size || !$arr[$index])
                    continue;
                $arr[$index] =0;
                while (($index += $steps) >= 0 && $index < $size)
                {
                    if ($arr[$index]) continue;
                    $arr[$index] = 1;
                    break;
                }
            }






echo implode(' ',$arr);
