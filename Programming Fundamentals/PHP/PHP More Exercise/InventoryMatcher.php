<?php

$products = explode(' ',readline());
$quantities = explode(' ',readline());
$prices = explode(' ',readline());
$name=null;
            while (($name = readline()) != "done")
            {
               $position = array_search($name,$products);
                echo(" $name costs: $prices[$position]; Available quantity: $quantities[$position]") . PHP_EOL;
            }