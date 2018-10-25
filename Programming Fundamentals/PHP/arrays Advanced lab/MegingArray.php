<?php

$arr1=array_map('intval',explode(' ',readline()));
$arr2=array_map('intval',explode(' ',readline()));
$min=min(count($arr1),count($arr2));
$res=[];

for($i=0;$i<$min;$i++){
    array_push($res,$arr1[$i]);
    array_push($res,$arr2[$i]);


}

if(count($arr1)!==count($arr2)){
    if(count($arr1)>count($arr2)){
        for($i=count($arr2);$i<count($arr1);$i++){
           array_push($res,$arr1[$i]);
        }
    }
    else{
        for($i=count($arr1);$i<count($arr2);$i++){
           array_push($res,$arr2[$i]);
        }
    }
}
echo implode(' ',$res);