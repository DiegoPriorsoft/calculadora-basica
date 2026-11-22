<?php

/** @var Casio $casio */
/** @var int|float $resultado */
/** @var string $marca */
/** @var string $color */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Casio</title>

    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 24px;
            background: #edf2ef;
            font-family: Arial, sans-serif;
        }
        .tarjeta {
            width: min(100%, 420px);
            padding: 26px;
            border-radius: 22px;
            background: #24312e;
            color: #fff;
            box-shadow: 0 20px 45px rgba(0, 0, 0, .25);
        }
        .marca { color: #aadb7d; font-size: 13px; font-weight: bold; letter-spacing: 1px; }
        h1 { margin: 8px 0 20px; }
        .pantalla {
            padding: 20px;
            border-radius: 10px;
            background: #dbe8b5;
            color: #263028;
            text-align: right;
        }
        .operacion { display: block; font-family: monospace; }
        .resultado { display: block; font-size: 44px; }
        .detalle { margin: 20px 0 0; color: #b9c6c1; }
    </style>
</head>
<body>
    <main class="tarjeta">
        <span class="marca"><?= htmlspecialchars($marca, ENT_QUOTES, "UTF-8"); ?></span>
        <h1>Herencia de Calculadora</h1>

        <section class="pantalla">
            <span class="operacion">5 + 10 =</span>
            <strong class="resultado"><?= htmlspecialchars((string) $resultado, ENT_QUOTES, "UTF-8"); ?></strong>
        </section>

        <p class="detalle">
            La clase Casio hereda las operaciones y los atributos de Calculadora.
            Color configurado: <?= htmlspecialchars($color, ENT_QUOTES, "UTF-8"); ?>.
        </p>
    </main>
</body>
</html>
