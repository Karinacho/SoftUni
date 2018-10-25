<?php

$password=readline();

function passwordValidator($password){
    if(strlen($password)<6 || strlen($password)>10){
        echo "Password must be between 6 and 10 characters".PHP_EOL;
    }
    $isSymbol=false;
    $countDigits=0;
    for($i=0;$i<strlen($password);$i++){
        if(ctype_digit($password[$i])){
$countDigits++;
        }else if(!ctype_alpha($password[$i])){
     $isSymbol=true;
        }
    }
    if($isSymbol){
        echo "Password must consist only of letters and digits".PHP_EOL;
    }
    if($countDigits<2){
        echo "Password must have at least 2 digits".PHP_EOL;
    }else{
        echo "Password is valid";
    }
}
passwordValidator($password);