<?php

$arr=array_map('intval',explode(' ',readline()));

while(true){
    $line = readline();
    if($line === 'end'){
        break;
    }

    $tokens= explode(" ",$line);

    switch($tokens[0]){
        case "Add":
            $numberToAdd=intval($tokens[1]);
            $arr[count($arr)]=$numberToAdd;
            break;

        case "Remove":
            $numberToRemove=intval($tokens[1]);
            array_splice($arr,$numberToRemove,1);
            break;
        case "RemoveAt":
            $indexToRemove=intval($tokens[1]);
            unset($arr[$indexToRemove]);
            break;
        case "Insert":
            $numberToInsert=intval($tokens[1]);
            $indexToInsert=intval($tokens[2]);
            $firstPart=array_slice($arr,0,$indexToInsert);
            $addElement= array($numberToInsert);
            $secondPart=array_slice($arr,$indexToInsert);
            $arr=array_merge($firstPart,$addElement,$secondPart);
            break;

    }

}
echo implode(' ',$arr);