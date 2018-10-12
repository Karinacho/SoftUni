<?php

$array=explode(' ',readline());
$array=array_map('intval',$array);
$tops=" ";

for($i=0;$i<count($array);$i++){

if(max($array) === $array[$i]){
    $tops.=$array[$i]. " ";
}
array_shift($array);
$i=-1;
}
echo ($tops);