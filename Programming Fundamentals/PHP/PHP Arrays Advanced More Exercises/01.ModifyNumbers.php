<?php

$input=array_map('intval',explode(' ',readline()));

$line=null;

while(($line=readline())!=='end') {

    $commands = explode(' ', $line);

    if ($commands[0] === 'swap') {
        $firstIndex = intval($commands[1]);
        $secondIndex = intval($commands[2]);
        if (($firstIndex >= 0 && $firstIndex < count($input))
            && ($secondIndex < count($input) && $secondIndex >= 0)) {
            $temp = $input[$firstIndex];
            $input[$firstIndex] = $input[$secondIndex];
            $input[$secondIndex] = $temp;
        }
    } else if ($commands[0] === 'multiply') {
        $firstIndex = intval($commands[1]);
        $secondIndex = intval($commands[2]);
        if (($firstIndex >= 0 && $firstIndex < count($input))
            && ($secondIndex < count($input) && $secondIndex >= 0)) {
$result=$input[$firstIndex]* $input[$secondIndex];
$input[$firstIndex]=$result;
        }


    }
    else if($commands[0]==='decrease'){
$num=intval($commands[1]);
for($i=0;$i<count($input);$i++){
    $input[$i]-=$num;
}

    }
    else if($commands[0]==='increase'){
        $num=intval($commands[1]);
        for($i=0;$i<count($input);$i++){
            $input[$i]+=$num;
        }

    }
    else if($commands[0]==='remove'){
        $firstIndex = intval($commands[1]);
        if ($firstIndex >= 0 && $firstIndex < count($input)){
            unset($input[$firstIndex]);
            $input = array_values($input);
        }
    }

}
echo implode(', ',$input);


