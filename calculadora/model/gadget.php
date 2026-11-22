<?php

interface Gadget
{
    public function getColor();
    public function setColor($color);

    public function getTamano();
    public function setTamano($tamano);

    public function getMarca();
    public function setMarca($marca);

    public function getModelo();
    public function setModelo($modelo);

    public function getTipo();
}