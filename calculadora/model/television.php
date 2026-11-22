<?php

require_once __DIR__ . '/gadget.php';

class Television implements Gadget
{
    private $color;
    public $tamano;
    protected $marca;
    public $modelo;
    public $tipo = "Televisión";

    private $canales = [];
    private $canalActual = null;

    public function __construct(
        $color,
        $tamano,
        $marca,
        $modelo,
        $canales = []
    ) {
        $this->color = $color;
        $this->tamano = $tamano;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->canales = $canales;

        if (!empty($canales)) {
            $this->canalActual = array_key_first($canales);
        }
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

    public function getCanales()
    {
        return $this->canales;
    }

    public function seleccionarCanal($canal)
    {
        if (!array_key_exists($canal, $this->canales)) {
            throw new InvalidArgumentException(
                "El canal seleccionado no existe."
            );
        }

        $this->canalActual = $canal;

        return $this->canales[$canal];
    }

    public function getCanalActual()
    {
        if ($this->canalActual === null) {
            return null;
        }

        return $this->canales[$this->canalActual];
    }
}