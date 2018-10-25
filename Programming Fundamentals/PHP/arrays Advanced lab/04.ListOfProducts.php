<?php
$n=intval(readline());
$arr=[];
for($i=0;$i<$n;$i++){
    $element=readline();
    $arr[$i]=$element;

}
 sort($arr);

for($i=0;$i< count($arr);$i++){
    echo $i + 1 . "." . $arr[$i] .PHP_EOL;
}