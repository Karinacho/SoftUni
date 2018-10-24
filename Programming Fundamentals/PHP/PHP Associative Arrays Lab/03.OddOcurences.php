<?php

$input = array_map('strtolower',explode(' ',readline()));
$arr = [];

for($i = 0; $i < count($input); $i ++){
    $word = $input[$i];
    if(!isset($arr[$word])){
        $arr[$word] = 1;
    }
    else{
        $arr[$word]++;
    }
}
$final = [];
foreach($arr as $key => $value){
    if($value%2 !== 0 ){
        $final[] = $key;
    }
}
echo implode(', ',$final);