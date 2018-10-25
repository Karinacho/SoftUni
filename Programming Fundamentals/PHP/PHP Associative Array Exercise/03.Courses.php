<?php

$courseMembers = [];
$tokens = explode(' : ', readline());

while ($tokens[0] != "end") {
    $course = $tokens[0];
    $member = $tokens[1];

    if (array_key_exists($course, $courseMembers) == false) {
        $courseMembers[$course] = [];

    }
    array_push($courseMembers[$course], $member);

    $tokens = explode(' : ', readline());
}
uksort($courseMembers, function ($a, $b) use ($courseMembers) {
    return count($courseMembers[$b]) <=> count($courseMembers[$a]);
});
uksort($courseMembers, function ($key1, $key2) use ($courseMembers) {
    $student2 = $courseMembers[$key2];
    $student1 = $courseMembers[$key1];

    return $student2 <=> $student1;
});
foreach ($courseMembers as $key => $value) {

    echo ("$key : " . count($value)) . PHP_EOL;
    uksort($value, function ($key1, $key2) use ($value) {
        $student2 = $value[$key2];
        $student1 = $value[$key1];

        return $student1 <=> $student2;
    });
    foreach ($value as $k => $val) {
        echo "-- $val" . PHP_EOL;
    }
}