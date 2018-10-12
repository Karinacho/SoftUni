<?php

$first=explode(' ',readline());
$second=explode(' ',readline());
$common=" ";
for($i=0;$i<count($second);$i++){
    if(in_array($second[$i],$first)){
        $common.="$second[$i] ";
    }
}
echo $common;