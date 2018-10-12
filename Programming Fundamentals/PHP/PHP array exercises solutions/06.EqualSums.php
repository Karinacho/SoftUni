<?php

$array=explode(' ',readline());
$array=array_map('intval',$array);
$index=null;
$haveEqual=false;
for($i=0;$i<count($array);$i++){
    $leftSum=0;
    $rightSum=0;
    for($j=0;$j<count($array);$j++){
        if($j<$i){
            $leftSum+=$array[$j];
        }else if($j>$i){
            $rightSum+=$array[$j];
        }
    }
    if($leftSum===$rightSum){
        $haveEqual=true;
        $index=$i;
    }

}
if($haveEqual){
    echo $index;
}else{
    echo "no";
}