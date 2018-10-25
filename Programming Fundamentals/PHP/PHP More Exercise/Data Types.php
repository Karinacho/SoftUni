<?php

$input=readline();
$num=readline();

if($input==='int'){
    echo(intval($num*=2));
}
else if($input==='real'){
    intval($num *=1.5);
    printf("%.2f",$num);
}
else if($input==='string'){
   printf("$%s$",$num);
}