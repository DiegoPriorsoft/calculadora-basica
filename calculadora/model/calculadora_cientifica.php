<?php

require_once __DIR__ . '/calculadora.php';

class CalculadoraCientifica extends Calculadora
{
    public $tipo = "Calculadora Científica";

    public function getColorCientifico()
    {
        return $this->getColor();
    }

    public function setColorCientifico($color)
    {
        $this->setColor($color);
    }

    public function potencia($base, $exponente)
    {
        return pow($base, $exponente);
    }

    public function raizCuadrada($numero)
    {
        if ($numero < 0) {
            throw new InvalidArgumentException(
                "No se puede calcular la raíz de un número negativo."
            );
        }

        return sqrt($numero);
    }

    public function seno($grados)
    {
        return sin(deg2rad($grados));
    }

    public function coseno($grados)
    {
        return cos(deg2rad($grados));
    }

    public function tangente($grados)
    {
        $radianes = deg2rad($grados);

        if (abs(cos($radianes)) < 0.000000000001) {
            throw new InvalidArgumentException(
                "La tangente no está definida para ese ángulo."
            );
        }

        return tan($radianes);
    }

    public function logaritmo($numero)
    {
        if ($numero <= 0) {
            throw new InvalidArgumentException(
                "El logaritmo requiere un número mayor que cero."
            );
        }

        return log10($numero);
    }

    public function logaritmoNatural($numero)
    {
        if ($numero <= 0) {
            throw new InvalidArgumentException(
                "El logaritmo natural requiere un número mayor que cero."
            );
        }

        return log($numero);
    }

    public function factorial($numero)
    {
        if ($numero < 0 || floor($numero) != $numero) {
            throw new InvalidArgumentException(
                "El factorial requiere un número entero no negativo."
            );
        }

        if ($numero > 170) {
            throw new InvalidArgumentException(
                "El número es demasiado grande para calcular su factorial."
            );
        }

        $resultado = 1;

        for ($i = 2; $i <= $numero; $i++) {
            $resultado *= $i;
        }

        return $resultado;
    }

    public function calcular($operacion, $numero1, $numero2 = null)
    {
        switch ($operacion) {
            case "sumar":
                return $this->sumar(
                    $numero1,
                    $this->validarSegundoNumero($numero2)
                );

            case "restar":
                return $this->restar(
                    $numero1,
                    $this->validarSegundoNumero($numero2)
                );

            case "multiplicar":
                return $this->multiplicar(
                    $numero1,
                    $this->validarSegundoNumero($numero2)
                );

            case "dividir":
                return $this->dividir(
                    $numero1,
                    $this->validarSegundoNumero($numero2)
                );

            case "potencia":
                return $this->potencia(
                    $numero1,
                    $this->validarSegundoNumero($numero2)
                );

            case "raiz":
                return $this->raizCuadrada($numero1);

            case "seno":
                return $this->seno($numero1);

            case "coseno":
                return $this->coseno($numero1);

            case "tangente":
                return $this->tangente($numero1);

            case "logaritmo":
                return $this->logaritmo($numero1);

            case "logaritmo_natural":
                return $this->logaritmoNatural($numero1);

            case "factorial":
                return $this->factorial($numero1);

            default:
                throw new InvalidArgumentException(
                    "Selecciona una operación científica válida."
                );
        }
    }

    private function validarSegundoNumero($numero)
    {
        if ($numero === null || !is_numeric($numero)) {
            throw new InvalidArgumentException(
                "Esta operación requiere un segundo número."
            );
        }

        return (float) $numero;
    }
}
