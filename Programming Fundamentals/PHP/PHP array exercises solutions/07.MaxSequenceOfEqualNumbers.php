<?php

$arr=explode(' ',readline());
$arr=array_map('intval',$arr);

$currentBestcount=1;
$currentCount=1;
$currentStart=-1;
$currentBestStart=-1;

for($i=0;$i<count($arr);$i++){

    if($i!==count($arr)-1 && $arr[$i]===$arr[$i+1]){

        $currentCount++;

        if($currentStart===-1){
            $currentStart=$i;

        }

    }

    else if($i!==count($arr)-1 && $arr[$i]!==$arr[$i+1]){
        if($currentCount>$currentBestcount){
            $currentBestCount=$currentCount;
            $currentBestStart=$currentStart;
        }
        else if($currentCount===$currentBestcount){
            if($currentBestStart>$currentStart){

                $currentBestStart=$currentStart;//
            }
        }

        $currentCount=1;
        $currentStart=-1;

    }

    if($currentCount>$currentBestcount){
        $currentBestcount=$currentCount;
        $currentBestStart=$currentStart;


    }

}
for($k=0;$k<$currentBestcount;$k++){
    echo $arr[$currentBestStart]. ' ';
}

