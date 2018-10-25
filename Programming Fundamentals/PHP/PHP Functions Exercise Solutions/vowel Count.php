<?php

$input=readline();

function vowelCount($input){
    $count=0;
    $tolower=strtolower($input);
    for($i=0;$i<strlen($input);$i++){

        if($tolower[$i]==='o' || $tolower[$i]==='a' || $tolower[$i]==='u' || $tolower[$i]==='e'
            || $tolower[$i]==='i'){

            $count++;
        }
    }
    return $count;
}
echo vowelCount($input);