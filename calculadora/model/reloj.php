<?php

require_once __DIR__ . '/gadget.php';

interface RelojInterface
{
    public function sincronizarConSistema($timestamp);

    public function getHoraFormateada();

    public function getFechaFormateada($timestamp = null);
}

class Reloj implements Gadget, RelojInterface
{
    private $color;
    public $tamano;
    protected $marca;
    public $modelo;
    public $tipo = "Reloj";
    private $timestamp;

    public function __construct($color, $tamano, $marca, $modelo)
    {
        $this->color = $color;
        $this->tamano = $tamano;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->timestamp = time();
    }

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

    public function sincronizarConSistema($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function getHoraFormateada()
    {
        return date("H:i:s", $this->timestamp);
    }

    public function getFechaFormateada($timestamp = null)
    {
        if ($timestamp === null) {
            $timestamp = $this->timestamp;
        }

        return date("d/m/Y", $timestamp);
    }
}