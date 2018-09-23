<?php
$n = readline();
$rest = substr($n, 0, 20);
$len=strlen($rest);
$diff=20-$len;
$asterisk=str_repeat('*',$diff);

echo $rest . $asterisk;