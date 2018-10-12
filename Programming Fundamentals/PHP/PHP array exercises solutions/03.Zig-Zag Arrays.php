<?php

$n=intval(readline());
$first=[];
$second=[];
for($i=1;$i<=$n;$i++){
    $line=explode(' ',readline());

if($i%2!==0){
    array_push($first,$line[0]);
    array_push($second,$line[1]);
}else{
    array_push($first,$line[1]);
    array_push($second,$line[0]);
}

}
echo (implode(" ",$first)).PHP_EOL;
echo (implode(" ",$second));