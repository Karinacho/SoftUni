<?php

$numberOfCommands = intval(readline());

$usernamePlate = [];

for ($i = 0; $i < $numberOfCommands; $i++) {
    $inputLine = readline();
    $elements = explode(' ', $inputLine);
    $command = $elements[0];
    $username = $elements[1];

    if ($command == "register") {
        $licensePlate = $elements[2];

        if (array_key_exists($username, $usernamePlate)) {
            echo "ERROR: already registered with plate number $usernamePlate[$username]" . PHP_EOL;
        } else if (array_key_exists($licensePlate, $usernamePlate)) {
            echo "ERROR: already registered with plate number $licensePlate" . PHP_EOL;
        } else if (!array_key_exists($username, $usernamePlate)) {
            $usernamePlate[$username] = $licensePlate;
            echo "$username registered $licensePlate successfully" . PHP_EOL;
        }
    } else if ($command == "unregister") {
        if (!array_key_exists($username, $usernamePlate)) {
            echo "ERROR: user $username not found" . PHP_EOL;
        } else {
            echo "user $username unregistered successfully" . PHP_EOL;
            unset($usernamePlate[$username]);
            array_values($usernamePlate);
        }
    }
}

foreach ($usernamePlate as $key => $value) {
    echo "$key => $value" . PHP_EOL;
}