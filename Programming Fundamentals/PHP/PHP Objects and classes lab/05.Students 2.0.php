<?php

class Student
{
    private $name;
    private $lastName;
    private $age;
    private $hometown;

    public function __construct($name, $lastName, $age, $hometown)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->hometown = $hometown;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getHometown()
    {
        return $this->hometown;
    }

    /**
     * @param mixed $hometown
     */
    public function setHometown($hometown): void
    {
        $this->hometown = $hometown;
    }
}

$line = readline();
$studentsData = [];
while ($line != 'end') {
    $students = explode(' ', $line);
    $name = $students[0];
    $lastName = $students[1];
    $age = $students[2];
    $hometown = $students[3];
    $student = new Student($name, $lastName, $age, $hometown);
    if (isStudentExisting($studentsData, $name, $lastName, $age, $hometown)) {
        foreach ($studentsData as $stud) {
            if ($stud->getName() == $name and $stud->getLastName() == $lastName) {

                $stud->setAge($age);
                $stud->setHometown($hometown);
                break;
            }

        }
    } else {

        array_push($studentsData, $student);
    }
    $line = readline();
}
$town = readline();

foreach ($studentsData as $value) {
    if ($value->getHometown() == $town) {
        echo "{$value->getName()} {$value->getLastName()} is {$value->getAge()} years old." . PHP_EOL;
    }
}
function isStudentExisting($studentsData, $name, $lastName, $age, $hometown)
{
    foreach ($studentsData as $student) {
        if ($student->getName() == $name and $student->getLastName() == $lastName) {

            return true;
        }
    }

    return false;
}