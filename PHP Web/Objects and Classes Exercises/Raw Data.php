<?php
class Car{
    private $model;
    private $engine;
    private $cargo;
    private $tires;

    /**
     * Car constructor.
     * @param $model
     * @param Engine $engine
     * @param Cargo $cargo
     * @param array $tires
     */
    public function __construct($model, Engine $engine,Cargo $cargo, array $tires)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires = $tires;
    }
    public function __toString()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * @return array
     */
    public function getTires(): array
    {
        return $this->tires;
    }


}
class Engine {
private $engineSpeed;
private $enginePower;

    /**
     * Engine constructor.
     * @param $engineSpeed
     * @param $enginePower
     */
    public function __construct($engineSpeed, $enginePower)
    {
        $this->engineSpeed = $engineSpeed;
        $this->enginePower = $enginePower;
    }

    /**
     * @return mixed
     */
    public function getEngineSpeed()
    {
        return $this->engineSpeed;
    }

    /**
     * @return mixed
     */
    public function getEnginePower()
    {
        return $this->enginePower;
    }

}
class Tire{
private $pressure;
private $age;

    /**
     * Tire constructor.
     * @param $pressure
     * @param $age
     */
    public function __construct($pressure, $age)
    {
        $this->pressure = $pressure;
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

}
class Cargo{
private $cargoWeight;
private $cargoType;

    /**
     * Cargo constructor.
     * @param $cargoWeight
     * @param $cargoType
     */
    public function __construct($cargoWeight, $cargoType)
    {
        $this->cargoWeight = $cargoWeight;
        $this->cargoType = $cargoType;
    }

    /**
     * @return mixed
     */
    public function getCargoWeight()
    {
        return $this->cargoWeight;
    }

    /**
     * @return mixed
     */
    public function getCargoType()
    {
        return $this->cargoType;
    }


}
$cars=[];
$n=intval(readline());
for($i=0;$i<$n;$i++){
    $line=explode(' ',readline());
    $model= $line[0];
    $engineSpeed = intval($line[1]);
    $enginePower = intval($line[2]);
    $cargoWeight = intval($line[3]);
    $cargoType = $line[4];
    $tire1Pressure = floatval($line[5]);
    $tire1Age = intval($line[6]);
    $tire2Pressure = floatval($line[7]);
    $tire2Age = intval($line[8]);
    $tire3Pressure = floatval($line[9]);
    $tire3Age = intval($line[10]);
    $tire4Pressure = floatval($line[11]);
    $tire4Age = intval($line[12]);
    $tire1 = new Tire($tire1Pressure,$tire1Age);
    $tire2 = new Tire ($tire2Pressure,$tire2Age);
    $tire3 = new Tire($tire3Pressure,$tire3Age);
    $tire4= new Tire ($tire4Pressure,$tire4Age);
    $tires = [$tire1,$tire2,$tire3,$tire4];
    $engine = new Engine($engineSpeed,$enginePower);
    $cargo = new Cargo ($cargoWeight,$cargoType);
    $cars[]=new Car($model, $engine,$cargo,$tires);

}
$command = readline();
if($command == 'fragile'){
        array_filter($cars,function(Car $car){
        if($car->getCargo()->getCargoType() == 'fragile'){
            foreach($car->getTires() as $tire){
                if($tire->getPressure() < 1){
                    echo $car .PHP_EOL;
                    break;
                }
            }
        }

    });

}
else{
    array_filter($cars,function(Car $car){
        if($car->getCargo()->getCargoType() == 'flamable'){
            if ($car->getEngine()->getEnginePower() > 250) {
                echo $car->getModel(). PHP_EOL;
            }
        }

    });
}