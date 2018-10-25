<?php

$companyBook = [];
$tokens = explode(' -> ', readline());

while ($tokens[0] != "End") {
    $company = $tokens[0];
    $id = $tokens[1];

    if (array_key_exists($company, $companyBook) == false) {
        $companyBook[$company] = [];
        array_push($companyBook[$company], $id);

    } else if (array_key_exists($company, $companyBook)) {
        if (in_array($id, $companyBook[$company]) == false) {
            array_push($companyBook[$company], $id);
        }
    }
    $tokens = explode(' -> ', readline());
}
uksort($companyBook, function ($key1, $key2) use ($companyBook) {

    return $key1 <=> $key2;
});

foreach ($companyBook as $key => $value) {
    echo "$key" . PHP_EOL;

    foreach ($value as $id) {
        echo "-- $id" . PHP_EOL;
    }
}