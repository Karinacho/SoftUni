<?php

class Item
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }


    public function getPrice()
    {
        return $this->price;
    }
}

class Box
{
    private $serialNumber;
    private $item;
    private $quantity;
    private $priceForBox;

    public function __construct($serialNumber, Item $item, $quantity, $priceForBox)
    {
        $this->serialNumber = $serialNumber;
        $this->item = $item;
        $this->quantity = $quantity;
        $this->priceForBox = $priceForBox;
    }

    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPriceForBox()
    {
        return $this->priceForBox;
    }
}

$arrayBoxes = [];
$itemArray = [];
$line = readline();
while ($line != 'end') {
    $data = explode(' ', $line);
    $serial = $data[0];
    $item = $data[1];
    $itemQuantity = intval($data[2]);
    $price = floatval($data[3]);
    $items = new Item($item, $price);
    $pricePerBox = $price * $itemQuantity;
    $box = new Box($serial, $items, $itemQuantity, $pricePerBox);
    array_push($arrayBoxes, $box);
    array_push($itemArray, $items);

    $line = readline();
}
usort($arrayBoxes, function ($a, $b) {
    return $b->getPriceForBox() <=> $a->getPriceForBox();
});

foreach ($arrayBoxes as $box) {

    echo $box->getSerialNumber() . PHP_EOL;
    printf("-- {$box->getItem()->getName()} - $%.2f : {$box->getQuantity()} " . PHP_EOL, $box->getItem()->getPrice());
    printf("-- $%.2f" . PHP_EOL, $box->getPriceForBox());


}
