<?php

class Song
{
    private $typeSong;
    private $name;
    private $time;

    public function __construct($typeSong, $name, $time)
    {
        $this->typeSong = $typeSong;
        $this->name = $name;
        $this->time = $time;
    }

    public function getTypeSong()
    {
        return $this->typeSong;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTime()
    {
        return $this->time;
    }
}

$songs = intval(readline());
$arraySongs = [];
for ($i = 0; $i < $songs; $i++) {
    $current = explode('_', readline());
    $type = $current[0];
    $name = $current[1];
    $time = $current[2];
    $song = new Song($type, $name, $time);
    array_push($arraySongs, $song);
}
$typeSong = readline();

if ($typeSong == 'all') {
    foreach ($arraySongs as $value) {
        echo $value->getName() . PHP_EOL;
    }
} else {
    foreach ($arraySongs as $value) {

        if ($value->getTypeSong() === $typeSong) {
            echo $value->getName() . PHP_EOL;
        }
    }
}