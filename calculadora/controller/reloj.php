<?php

require_once __DIR__ . '/../model/reloj.php';

date_default_timezone_set("America/Cancun");

$timestampInicial = time();

$reloj = new Reloj(
    "Negro",
    "Mediano",
    "Gadget Lab",
    "Analógico"
);

$reloj->sincronizarConSistema($timestampInicial);

$horaInicial = $reloj->getHoraFormateada();
$fechaInicial = $reloj->getFechaFormateada($timestampInicial);

require_once __DIR__ . '/../view/reloj.php';