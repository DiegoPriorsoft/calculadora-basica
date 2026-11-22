<?php

require_once __DIR__ . '/../model/television.php';

$canales = require __DIR__ . '/../config/iptv.php';

$television = new Television(
    "Negro",
    "Grande",
    "Gadget Lab",
    "Smart TV",
    $canales
);

$canalPredeterminado = array_key_first($canales);

$canalSolicitado = $_GET["canal"]
    ?? $canalPredeterminado;

$error = null;

try {
    if (!is_string($canalSolicitado)) {
        throw new InvalidArgumentException(
            "El canal solicitado no es válido."
        );
    }

    $television->seleccionarCanal(
        $canalSolicitado
    );
} catch (InvalidArgumentException $excepcion) {
    $error = $excepcion->getMessage();

    $television->seleccionarCanal(
        $canalPredeterminado
    );
}

$canalActual = $television->getCanalActual();

require_once __DIR__ . '/../view/television.php';