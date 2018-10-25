<?php
$resources = [];
$junk = [];

$resources['shards'] = 0;
$resources['fragments'] = 0;
$resources['motes'] = 0;
$notEnoughMaterial = true;

while ($notEnoughMaterial) {
    $command = array_map('strtolower', explode(' ', readline()));

    for ($i = 0; $i < count($command); $i += 2) {
        $quantity = intval($command[$i]);
        $material = $command[$i + 1];

        if (array_key_exists($material, $resources)) {
            $resources[$material] += $quantity;

            if ($resources[$material] >= 250) {
                $resources[$material] -= 250;
                $result = null;

                switch ($material) {
                    case "shards":
                        $result = "Shadowmourne";
                        break;
                    case "fragments":
                        $result = "Valanyr";
                        break;
                    case "motes":
                        $result = "Dragonwrath";
                        break;
                }

                echo "$result obtained!" . PHP_EOL;

                $notEnoughMaterial = false;
                break;
            }

        } else {
            if (!array_key_exists($material, $junk)) {
                $junk[$material] = 0;
            }

            $junk[$material] += $quantity;
        }
    }
}

uksort($resources, function ($key1, $key2) use ($resources) {
    $one = $resources[$key1];
    $two = $resources[$key2];
    if ($one == $two) {
        return strcmp($key1, $key2);
    }
    return $two <=> $one;
});

uksort($junk, function ($key1, $key2) use ($junk) {
    $one = $junk[$key1];
    $two = $junk[$key2];

    return strcmp($key1, $key2);

});

foreach ($resources as $key => $value) {
    echo "$key : $value" . PHP_EOL;
}

foreach ($junk as $k => $v) {
    echo "$k : $v" . PHP_EOL;
}
