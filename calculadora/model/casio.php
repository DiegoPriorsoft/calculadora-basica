<?php

require_once __DIR__ . '/calculadora.php';

class Casio extends Calculadora
{
    public function __construct()
    {
        $this->marca = "Casio";
    }
}