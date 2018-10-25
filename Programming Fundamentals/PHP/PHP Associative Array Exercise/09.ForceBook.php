<?php
$book = array();
$k = 0;
while (($force = readline()) != "Lumpawaroo") {
    if (strstr($force, "|")) {
        $forceArr = explode(" | ", $force);
        $forceSide = $forceArr[0];
        $forceUser = $forceArr[1];
        
        if (!array_key_exists($forceUser, $book)) {
            $book[$forceUser] = $forceSide;
        }
    } else {
        $forceArr = explode(" -> ", $force);
        $forceUser = $forceArr[0];
        $forceSide = $forceArr[1];
        $book[$forceUser] = $forceSide;
        if ($k == 0) {
            $k++;
            $row = "";
        } else {
            $row = "\n";
        }

        echo "$forceUser joins the $forceSide side!";
        echo "\n";
    }
}
ksort($book);
$freqs = array_count_values($book);
//
$stats = array();
foreach ($book as $user => $side) {
    if (!isset($stats[$side])) {
        $members = $freqs[$side];
        $stats[$side] = $members;
    }

}
uksort($stats, function ($key1, $key2) use ($stats) {
    $one = $stats[$key1];
    $two = $stats[$key2];
    if ($one == $two) {
        return strcmp($key1, $key2);
    }
    return $two <=> $one;
});
foreach ($stats as $side => $freq) {
    echo "Side: $side, Members: $freq\n";
    foreach ($book as $name => $fside) {
        if ($book[$name] == $side)
            echo "! $name\n";
    }
}