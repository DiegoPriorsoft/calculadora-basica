<?php

require_once __DIR__ . '/../model/calculadora_cientifica.php';

$calculadora = new CalculadoraCientifica();
$calculadora->setColorCientifico("Verde");
$calculadora->setTamano("Mediana");
$calculadora->setMarca("Gadget Lab");
$calculadora->setModelo("Scientific GL-82");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type: application/json; charset=utf-8");

    $numero1 = $_POST["numero1"] ?? null;
    $numero2 = $_POST["numero2"] ?? null;
    $operacion = $_POST["operacion"] ?? "";

    try {
        if (!is_numeric($numero1)) {
            throw new InvalidArgumentException(
                "Ingresa un primer número válido."
            );
        }

        if ($numero2 === "") {
            $numero2 = null;
        }

        if ($numero2 !== null && !is_numeric($numero2)) {
            throw new InvalidArgumentException(
                "El segundo número no es válido."
            );
        }

        $resultado = $calculadora->calcular(
            $operacion,
            (float) $numero1,
            $numero2 === null ? null : (float) $numero2
        );

        if (is_float($resultado) && is_finite($resultado)) {
            $resultado = round($resultado, 12);
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

require_once __DIR__ . '/../view/calculadora_cientifica.php';
