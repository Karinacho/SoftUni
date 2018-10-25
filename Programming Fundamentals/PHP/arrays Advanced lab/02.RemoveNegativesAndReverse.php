<?php

$input=array_map('intval',explode(' ',readline()));
$filterArray = array_filter($input, function ($var) {
    return ($var>0);
});
$result=array_reverse($filterArray);
if(count($filterArray)!==0){
    echo implode(' ',array_reverse($filterArray));
}else{
    echo "empty";
}
