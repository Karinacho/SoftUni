<?php
$participants = [];
$submissions = [];

$line = explode('-', readline());


while ($line[0] != "exam finished") {
    $name = $line[0];

    if ($line[1] == "banned") {
        unset($participants[$name]);

    } else {
        $language = $line[1];
        $points = intval($line[2]);

        if (array_key_exists($name, $participants) == false) {
            $participants[$name] = $points;

            if (array_key_exists($language, $submissions) == false) {
                $submissions[$language] = 1;
            } else {
                $submissions[$language]++;
            }
        } else {
            if ($participants[$name] < $points) {
                $participants[$name] = $points;

                $submissions[$language]++;
            } else {
                if (array_key_exists($language, $submissions) == false) {
                    $submissions[$language] = 1;
                } else {
                    $submissions[$language]++;
                }
            }
        }
    }

    $line = explode('-', readline());
}

echo "Results:" . PHP_EOL;
uksort($participants, function ($key1, $key2) use ($participants) {
    $one = $participants[$key1];
    $two = $participants[$key2];
    if ($one == $two) {
        return strcmp($key1, $key2);
    }
    return $two <=> $one;
});
uksort($submissions, function ($key1, $key2) use ($submissions) {
    $one = $submissions[$key1];
    $two = $submissions[$key2];
    if ($one == $two) {
        return strcmp($key1, $key2);
    }
    return $two <=> $one;
});
foreach ($participants as $key => $value) {
    echo "$key | $value" . PHP_EOL;
}

echo "Submissions:" . PHP_EOL;

foreach ($submissions as $k => $v) {
    echo "$k - $v" . PHP_EOL;
}