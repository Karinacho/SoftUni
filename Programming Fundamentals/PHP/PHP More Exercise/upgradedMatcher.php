<?php


$products = explode(' ',readline());
$quantities = array_map('floatval',explode(' ',readline()));
$prices = explode(' ',readline());
$name=null;
while (($name = readline()) != "done")
{
    $data = explode(' ',$name);
    $productName = $data[0];
    $productQuantity = intval($data[1]);
    $position = array_search($productName,$products);
    if (count($quantities)-1  - $position>= 0 && $quantities[$position]>0) {

            $quantities[$position] -= $productQuantity;

            $orderCost = $prices[$position] * $productQuantity;

            printf("%s x %d costs %.2f ",$productName,$productQuantity, $orderCost);
            echo PHP_EOL;


    }
    else
        {
            echo "We do not have enough $productName" . PHP_EOL;
        }

    }