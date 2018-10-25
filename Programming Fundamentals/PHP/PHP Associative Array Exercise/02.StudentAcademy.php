<?php
$studentsCounts = intval(readline());
$academy = [];

for ($i = 0; $i < $studentsCounts; $i++) {
    $name = readline();
    $grade = floatval(readline());
    if (key_exists($name, $academy) == false) {
        $academy[$name] = [];
    }
    array_push($academy[$name], $grade);
}
$filtered = array_filter($academy, function ($k) {
    $avg = array_sum($k) / count($k);
    if ($avg >= 4.50) {
        return $k;
    }
});

uksort($filtered, function ($key1, $key2) use ($filtered) {
    $student2 = $filtered[$key2];
    $student1 = $filtered[$key1];

    return array_sum($student2) / count($student2) <=> (array_sum($student1) / count($student1));
});

foreach ($filtered as $key => $value) {
    $avg = array_sum($value) / count($value);
    printf("$key -> %.2f ", $avg);
    echo PHP_EOL;
}
