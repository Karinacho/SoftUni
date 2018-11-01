<?php

class Truck
{
    private $brand;
    private $model;
    private $weight;

    public function __construct($brand, $model, $weight)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->weight = $weight;
    }


    public function getBrand()
    {
        return $this->brand;
    }


    public function getModel()
    {
        return $this->model;
    }


    public function getWeight()
    {
        return $this->weight;
    }

}

class Car
{
    private $brand;
    private $model;
    private $horsePower;

    public function __construct($brand, $model, $horsePower)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->horsePower = $horsePower;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getHorsePower()
    {
        return $this->horsePower;
    }
}

class Catalog
{
    private $cars = [];
    private $trucks = [];

    public function __construct($cars, $trucks)
    {
        $this->cars = $cars;
        $this->trucks = $trucks;
    }

    public function getCars(): array
    {
        return $this->cars;
    }

    public function getTrucks(): array
    {
        return $this->trucks;
    }
}

$line = readline();
$trucks = [];
$cars = [];
$catalog = [];
while ($line != 'end') {
    $data = explode('/', $line);

    $type = $data[0];
    $brand = $data[1];
    $model = $data[2];
    $car = null;
    $truck = null;
    if ($type === 'Car') {
        $horsePower = $data[3];
        $car = new Car($brand, $model, $horsePower);
        $cars[] = $car;
    } else {
        $weight = $data[3];
        $truck = new Truck($brand, $model, $weight);
        $trucks[] = $truck;
    }

    $line = readline();
}

usort($cars, function (Car $a, Car $b) {
    return $a->getBrand() <=> $b->getBrand();
});
usort($trucks, function (Truck $a, Truck $b) {
    return $a->getBrand() <=> $b->getBrand();
});
$catalog = new Catalog($cars, $trucks);

if (count($catalog->getCars()) != 0) {
    echo "Cars: " . PHP_EOL;
    foreach ($catalog->getCars() as $value) {
        echo $value->getBrand() . ": " . $value->getModel() . " - "
            . $value->getHorsePower() . "hp" . PHP_EOL;
    }
}
if (count($catalog->getTrucks()) != 0) {
    echo "Trucks: " . PHP_EOL;
    foreach ($catalog->getTrucks() as $value) {
        echo $value->getBrand() . ": " . $value->getModel() . " - "
            . $value->getWeight() . "kg" . PHP_EOL;
    }
}
