<?php
use App\Persona;
use PHPUnit\Framework\TestCase;


class PersonaTest extends TestCase {
    public function testNombreAsignadoCorrectamente() {
        $persona = new Persona("Juan", 25);
        $this->assertEquals("Juan", $persona->nombre);
    }

    public function testEdadAsignadaCorrectamente() {
        $persona = new Persona("Ana", 30);
        $this->assertEquals(30, $persona->edad);
    }

    public function testEdadNegativaLanzaExcepcion() {
        $this->expectException(InvalidArgumentException::class);
        $persona = new Persona("Luis", -5);
    }

    public function testEdadNoNumericaLanzaExcepcion() {
        $this->expectException(TypeError::class);
        $persona = new Persona("Luis", "veinte");
    }

    public function testPresentarseDevuelveMensajeCorrecto() {
        $persona = new Persona("Carlos", 40);
        $this->assertEquals("Hola, mi nombre es Carlos y tengo 40 años.", $persona->presentarse());
    }

    // Prueba para el método isValidEdad
    public function testEdadValida() {
        $persona = new Persona("Laura", 20);
        $this->assertTrue($persona->isValidEdad(20));
    }

    public function testEdadInvalida() {
        $persona = new Persona("Laura", 20);
        $this->assertFalse($persona->isValidEdad(-10));
    }
}
