
<?php

$arr=[];

$line=null;

while(($line=readline())!=='Print'){
    $tokens=explode(' ',$line);

    if($tokens[0]==='Push'){
        array_unshift($arr,$tokens[1]);
    }
    else if($tokens[0]==="Add"){
        array_push($arr,$tokens[1]);
    }
    else if($tokens[0]==="Pop"){
        array_shift($arr);
    }
    else if($tokens[0]==="Enqueue"){
        array_pop($arr);
    }


}
echo implode(' ',$arr);