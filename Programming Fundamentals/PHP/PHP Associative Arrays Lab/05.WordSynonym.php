<?php

$n = intval(readline());

$arr = [];

for($i = 0; $i< $n*2; $i+=2){
    $word = readline();

    if(!isset($arr[$word])){
        $arr[$word] = [];
    }
        $synonym = readline();

        array_push($arr[$word],$synonym);


}
uksort($arr, function($key1, $key2) use($arr) {
    $word2 = $arr[$key2];
    $word1 = $arr[$key1];
    if ( $word1 == $word2){
        return $key1 <=> $key2;
    } return $word2 <=> $word1;
});

foreach($arr as $key => $val){


    echo $key . " - ".  implode(', ',$val).PHP_EOL;
}
