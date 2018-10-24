<?php

$text = readline();
$letters = [];

for($i = 0;$i < strlen($text); $i++){
    $char = $text[$i];
    if (!isset($letters[$char])){
        $letters[$char] = 1;
    }else{
        $letters[$char]++;
    }
}
foreach($letters as $key => $value){
    echo "$key -> $value" . PHP_EOL;
}