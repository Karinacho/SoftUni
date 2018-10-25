<?php

$input=readline();

function getMiddleChars($input){
    if(strlen($input)%2!==0){

       echo $input[(strlen($input)-1)/2];
    }else{
        echo $input[(strlen($input))/2-1];
        echo $input[(strlen($input))/2 ];
    }

}

getMiddleChars($input);