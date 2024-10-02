<?php

namespace App;

class Persona {
    public string $nombre;
    public int $edad;

    public function __construct(string $nombre, int $edad) {
        if (!$this->isValidEdad($edad)) {
            throw new \InvalidArgumentException("La edad debe ser un número entero positivo.");
        }
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Método para validar la edad
    public function isValidEdad(int $edad): bool {
        return $edad >= 0;
    }

    public function presentarse(): string {
        return "Hola, mi nombre es {$this->nombre} y tengo {$this->edad} años.";
    }
}
