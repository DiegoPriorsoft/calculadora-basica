<?php

require_once __DIR__ . '/../model/reloj.php';
require_once __DIR__ . '/../model/television.php';

date_default_timezone_set("America/Cancun");

$canales = require __DIR__ . '/../config/iptv.php';

$reloj = new Reloj(
    "Negro",
    "Grande",
    "Gadget Lab",
    "Digital"
);
$reloj->sincronizarConSistema(time());

$television = new Television(
    "Negro",
    "Grande",
    "Gadget Lab",
    "Smart TV",
    $canales
);

$canalPredeterminado = array_key_first($canales);
$canalSolicitado = $_GET["canal"] ?? $canalPredeterminado;
$error = null;

try {
    if (!is_string($canalSolicitado)) {
        throw new InvalidArgumentException(
            "El canal solicitado no es válido."
        );
    }

    $television->seleccionarCanal($canalSolicitado);
} catch (InvalidArgumentException $excepcion) {
    $error = $excepcion->getMessage();
    $television->seleccionarCanal($canalPredeterminado);
}

$canalActual = $television->getCanalActual();
$horaInicial = $reloj->getHoraFormateada();
$fechaInicial = $reloj->getFechaFormateada();

require_once __DIR__ . '/../view/reloj_television.php';
