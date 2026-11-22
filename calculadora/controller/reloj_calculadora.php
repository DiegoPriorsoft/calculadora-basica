<?php

require_once __DIR__ . '/../model/reloj_calculadora.php';

date_default_timezone_set("America/Cancun");

$relojCalculadora = new RelojCalculadora(
    "Negro",
    "Mediano",
    "Gadget Lab",
    "Digital"
);

$relojCalculadora->sincronizarConSistema(time());

$horaInicial = $relojCalculadora->getHoraFormateada();
$fechaInicial = $relojCalculadora->getFechaFormateada();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type: application/json; charset=utf-8");

    $numero1 = $_POST["numero1"] ?? null;
    $numero2 = $_POST["numero2"] ?? null;
    $operacion = $_POST["operacion"] ?? "";

    try {
        if (!is_numeric($numero1) || !is_numeric($numero2)) {
            throw new InvalidArgumentException(
                "Debes ingresar dos números válidos."
            );
        }

        $numero1 = (float) $numero1;
        $numero2 = (float) $numero2;

        switch ($operacion) {
            case "sumar":
                $resultado = $relojCalculadora->sumar(
                    $numero1,
                    $numero2
                );
                break;

            case "restar":
                $resultado = $relojCalculadora->restar(
                    $numero1,
                    $numero2
                );
                break;

            case "multiplicar":
                $resultado = $relojCalculadora->multiplicar(
                    $numero1,
                    $numero2
                );
                break;

            case "dividir":
                $resultado = $relojCalculadora->dividir(
                    $numero1,
                    $numero2
                );
                break;

            default:
                throw new InvalidArgumentException(
                    "Selecciona una operación válida."
                );
        }

        echo json_encode([
            "success" => true,
            "resultado" => $resultado
        ]);
    } catch (InvalidArgumentException $error) {
        http_response_code(400);

        echo json_encode([
            "success" => false,
            "error" => $error->getMessage()
        ]);
    }

    exit;
}

require_once __DIR__ . '/../view/reloj_calculadora.php';