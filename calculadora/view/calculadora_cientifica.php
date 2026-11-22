<?php

/** @var CalculadoraCientifica $calculadora */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Científica</title>

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
        .calculadora {
            width: min(100%, 560px);
            padding: 22px;
            border-radius: 24px;
            background: #24312e;
            color: #fff;
            box-shadow: 0 24px 50px rgba(0, 0, 0, .28);
        }
        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
        h1 { margin: 0; font-size: 22px; }
        .modelo { color: #aebbb7; font-size: 12px; }
        .pantalla {
            min-height: 105px;
            padding: 16px;
            border-radius: 12px;
            background: #dbe8b5;
            color: #263028;
            text-align: right;
        }
        #expresion { min-height: 24px; font-family: monospace; }
        #valor { font-size: 38px; overflow-wrap: anywhere; }
        form { margin-top: 16px; }
        .campos {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        input, select, button {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 8px;
            font-size: 16px;
        }
        input, select { background: #35413e; color: #fff; }
        select { margin-top: 10px; }
        button {
            margin-top: 10px;
            background: #d9ef7c;
            color: #263028;
            font-weight: bold;
            cursor: pointer;
        }
        #mensaje {
            min-height: 22px;
            margin: 12px 0 0;
            color: #ffb4a8;
            text-align: center;
            font-weight: bold;
        }
        .nota { color: #aebbb7; font-size: 12px; text-align: center; }
        @media (max-width: 520px) {
            .campos { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <main class="calculadora">
        <header class="encabezado">
            <h1><?= htmlspecialchars($calculadora->getTipo(), ENT_QUOTES, "UTF-8"); ?></h1>
            <span class="modelo"><?= htmlspecialchars($calculadora->getModelo(), ENT_QUOTES, "UTF-8"); ?></span>
        </header>

        <section class="pantalla">
            <div id="expresion">Lista para calcular</div>
            <div id="valor">0</div>
        </section>

        <form id="form-cientifica" action="calculadora_cientifica.php" method="POST">
            <div class="campos">
                <input type="number" step="any" name="numero1" id="numero1" placeholder="Primer número" required>
                <input type="number" step="any" name="numero2" id="numero2" placeholder="Segundo número (si aplica)">
            </div>

            <select name="operacion" id="operacion" required>
                <option value="sumar">Sumar</option>
                <option value="restar">Restar</option>
                <option value="multiplicar">Multiplicar</option>
                <option value="dividir">Dividir</option>
                <option value="potencia">Potencia</option>
                <option value="raiz">Raíz cuadrada</option>
                <option value="seno">Seno (grados)</option>
                <option value="coseno">Coseno (grados)</option>
                <option value="tangente">Tangente (grados)</option>
                <option value="logaritmo">Logaritmo base 10</option>
                <option value="logaritmo_natural">Logaritmo natural</option>
                <option value="factorial">Factorial</option>
            </select>

            <button type="submit">Calcular</button>
        </form>

        <p id="mensaje"></p>
        <p class="nota">El segundo número solo se usa en operaciones binarias.</p>
    </main>

    <script>
        const formulario = document.getElementById("form-cientifica");
        const expresion = document.getElementById("expresion");
        const valor = document.getElementById("valor");
        const mensaje = document.getElementById("mensaje");

        formulario.addEventListener("submit", async function (evento) {
            evento.preventDefault();
            mensaje.textContent = "Calculando...";

            try {
                const respuesta = await fetch(formulario.action, {
                    method: "POST",
                    body: new FormData(formulario)
                });
                const datos = await respuesta.json();

                if (!datos.success) {
                    mensaje.textContent = "Error: " + datos.error;
                    return;
                }

                const operacion = document.getElementById("operacion");
                expresion.textContent = operacion.options[operacion.selectedIndex].text;
                valor.textContent = datos.resultado;
                mensaje.textContent = "";
            } catch (error) {
                mensaje.textContent = "No se pudo comunicar con el servidor.";
            }
        });
    </script>
</body>
</html>
