<?php

$arr = [];
$resource = readline();
$quantity = intval(readline());

while (true) {
    if (isset($arr[$resource]) == false) {
        $arr[$resource] = $quantity;
    } else if (isset($arr[$resource])) {
        $arr[$resource] += $quantity;
    }
    $resource = readline();

    if ($resource == "stop") {
        break;
    }
    $quantity = intval(readline());
}

foreach ($arr as $key => $value) {
    echo "$key -> $value" . "K" . PHP_EOL;
}