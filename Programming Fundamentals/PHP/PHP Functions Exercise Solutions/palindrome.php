<?php

$input=null;

function palindome($input)
{
$isPalindrome=true;
    $n = Strlen($input);
    for ($i = 0; $i < $n / 2; $i++) {
if(intval($input[$i])!==intval($input[$n-$i-1])){
    $isPalindrome=false;
    return 'false'.PHP_EOL;
}
}
return 'true'.PHP_EOL;

}

while(($input=readline())!=='END'){

    echo palindome($input);
}