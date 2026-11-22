<?php

require_once __DIR__ . '/../model/casio.php';

$casio = new Casio();

$resultado = $casio->sumar(5, 10);

$casio->setColor("Morado");

$marca = $casio->getMarca();
$color = $casio->getColor();

require_once __DIR__ . '/../view/casio.php';
