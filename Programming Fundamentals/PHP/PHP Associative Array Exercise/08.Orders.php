<?php

$lines = readline();

$database = [];

$totalAmount = 0.0;

while ($lines != "buy") {
    $line = explode(' ', $lines);
    $item = $line[0];

    $price = ($line[1]);
    $quantity = floatval($line[2]);

    if (!array_key_exists($item, $database)) {
        $database[$item] = [];
    }

    if (!array_key_exists($price, $database[$item])) {
        $database[$item][$price] = 0;
    }

    $database[$item][$price] += $quantity;

    $lines = readline();
}

foreach ($database as $key => $value) {
    $nameOfProduct = $key;


    $quantity = 0;
    foreach ($value as $k => $v) {
        $pr = $k;
        $quantity += $v;
    }
    $totalAmount = ($quantity * $pr);

    printf("$nameOfProduct -> %.2f", $totalAmount);
    echo PHP_EOL;
}