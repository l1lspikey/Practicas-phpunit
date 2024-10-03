<?php

namespace App;

use InvalidArgumentException;

class Person
{
    private string $name;
    private int $age;

    public function __construct(string $name, int $age)
    {
       $this->name = $name;
       $this->setAge($age) ;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function age(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void 
    {
        if (!is_int($age) || $age < 0) { 
            throw new InvalidArgumentException("Age should be a positive numerical number.");
        }
        $this->age = $age;
    }

   
    public function greetings(): string
    {
        return "Hi, my name is {$this->name()} and i'm {$this->age()} years old."; 
    }


    public function greaterThan(Person $another): bool
    {
        return $this->age > $another->age();
    }
}
