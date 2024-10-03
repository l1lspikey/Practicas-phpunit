<?php

use App\Person;
use PHPUnit\Framework\TestCase;
/**
 * @covers \App\Person
 */
class PersonTest extends TestCase
{
    // Test para verificar que setName actualiza correctamente la propiedad
    public function test_it_should_update_name()
    {
        $Person = new Person("Juan", 30);
        $Person->setName("Carlos");
        
        $this->assertSame("Carlos", $Person->name()); 
    }

    // Test para verificar que setAge actualiza correctamente la propiedad
    public function test_it_should_update_age()
    {
        $Person = new Person("Juan", 30);
        $Person->setAge(40); 
        
        $this->assertSame(40, $Person->age());
    }

    // Test para verificar que setAge lanza una excepción con una edad negativa
    public function test_it_should_validate_age_is_not_numerical()
    {
        $this->expectException(TypeError::class);
        
        $Person = new Person("Juan", 30);
        $Person->setAge(-5);  // Lanzará excepción
    }

    // Test para verificar que setAge lanza una excepción con una edad no numérica
    public function test_it_should_validate_age_is_not_string()
    {
        $this->expectException(TypeError::class);
        
        $Person = new Person("Juan", 30);
        $Person->setAge("treinta");  // Lanzará excepción
    }

    // Test para el método greetings
    public function test_it_should_test_greetings()
    {
        $Person = new Person("Carlos", 40);
       
        $this->assertSame("Hi, my name is Carlos and i'm 40 years old.", $Person->greetings());
    }

    // Test para comparar si una Person es mayor que otra
    public function test_it_should_compare_ages()
    {
        $Person1 = new Person("Juan", 30);
        $Person2 = new Person("Carlos", 25);

        // Verificar si Person1 es mayor que Person2
        $this->assertTrue($Person1->greaterThan($Person2));

        // Verificar si Person2 no es mayor que Person1
        $this->assertFalse($Person2->greaterThan($Person1));

        // Caso de edades iguales
        $Person3 = new Person("Luis", 30);
        $this->assertFalse($Person1->greaterThan($Person3));
    }
}
