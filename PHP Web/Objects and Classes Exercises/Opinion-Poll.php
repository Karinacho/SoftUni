<?php


class Person
{
    private $age;
    private $name;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __toString()
    {
        return "{$this->getName()} - {$this->getAge()}" . PHP_EOL;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}

$n = intval(readline());
$people = [];
for ($i = 0; $i < $n; $i++) {
    $person = explode(' ', readline());
    $name = $person[0];
    $age = intval($person[1]);
    $people[] = new Person($name, $age);
}
$filtered = array_filter($people, function (Person $p) {
    return $p->getAge() > 30;
});
usort($filtered, function (Person $p1, Person $p2) {
    return $p1->getName() <=> $p2->getName();
});
foreach($filtered as $p){
    echo $p;
}
