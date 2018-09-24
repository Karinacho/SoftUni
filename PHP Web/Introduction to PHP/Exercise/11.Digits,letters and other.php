<?php

$input=readline();

$len=strlen($input);
$digits="";
$letters="";
$special="";

for($i=0;$i<$len;$i++){
   // echo $i;
    //echo $input[$i];
    if(ctype_digit($input[$i])){
        $digits.=$input[$i];
    }
    else if(ctype_alpha($input[$i])){
        $letters.=$input[$i];
    }
    else{
        $special.=$input[$i];
    }
}
echo $digits . PHP_EOL;
echo $letters . PHP_EOL;
echo $special . PHP_EOL;