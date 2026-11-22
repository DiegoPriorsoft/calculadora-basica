<?php

require_once __DIR__ . '/gadget.php';

class Calculadora implements Gadget
{
    private $color;
    public $tamano;
    protected $marca;
    public $modelo;
    public $tipo = "Calculadora";

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getTamano()
    {
        return $this->tamano;
    }

    public function setTamano($tamano)
    {
        $this->tamano = $tamano;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function sumar($numero1, $numero2)
    {
        return $numero1 + $numero2;
    }

    public function restar($numero1, $numero2)
    {
        return $numero1 - $numero2;
    }

    public function multiplicar($numero1, $numero2)
    {
        return $numero1 * $numero2;
    }

    public function dividir($numero1, $numero2)
    {
        if ($numero2 == 0) {
            throw new InvalidArgumentException(
                "No se puede dividir entre cero."
            );
        }

        return $numero1 / $numero2;
    }
}