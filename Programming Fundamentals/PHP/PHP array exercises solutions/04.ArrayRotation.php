<?php

$arr=explode(' ',readline());
$rotations=intval(readline());
for($i=0;$i<$rotations;$i++){
    $firstElement=array_shift($arr);
    array_push($arr,$firstElement);
}
echo (implode(' ',$arr));