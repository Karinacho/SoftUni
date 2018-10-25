<?php

$input = array_map('intval',explode(' ',readline()));
for($i = 0;$i<count($input)/2;$i++){
    if($i===count($input)-1-$i){
        echo $input[$i];
    }else{
        $sum = $input[$i]+ $input[count($input)-1]-$i;
        echo $sum . " ";
    }

}
