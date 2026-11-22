<?php

require_once __DIR__ . '/calculadora.php';
require_once __DIR__ . '/reloj.php';

class RelojCalculadora extends Calculadora implements RelojInterface
{
    private $reloj;

    public function __construct($color, $tamano, $marca, $modelo)
    {
        $this->setColor($color);
        $this->setTamano($tamano);
        $this->setMarca($marca);
        $this->setModelo($modelo);

        $this->tipo = "Reloj Calculadora";

        $this->reloj = new Reloj(
            $color,
            $tamano,
            $marca,
            $modelo
        );
    }

    public function sincronizarConSistema($timestamp)
    {
        $this->reloj->sincronizarConSistema($timestamp);
    }

    public function getHoraFormateada()
    {
        return $this->reloj->getHoraFormateada();
    }

    public function getFechaFormateada($timestamp = null)
    {
        return $this->reloj->getFechaFormateada($timestamp);
    }

    public function getReloj()
    {
        return $this->reloj;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
}