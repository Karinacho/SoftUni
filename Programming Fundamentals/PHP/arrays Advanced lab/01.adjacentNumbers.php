<?php

$input=array_map('intval',explode(' ',readline()));

for($i=0;$i<count($input)-1;$i++){
    if($input[$i]===$input[$i+1]){
        $element=$input[$i+1] + $input[$i+1];
        $input[$i]=$element;
        array_splice($input,$i+1,1);
        $i=-1;
    }
}
echo implode(' ',$input);