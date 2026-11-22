<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Reloj Calculadora</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            background: #edf2ef;
            font-family: Arial, sans-serif;
        }

        .pagina {
            width: min(100%, 780px);
        }

        .encabezado-pagina {
            display: flex;
            justify-content: space-between;
            margin-bottom: 28px;
            color: #34433f;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .contenedor-reloj {
            position: relative;
            width: min(100%, 390px);
            margin: auto;
            padding: 40px 0;
        }

        .contenedor-reloj::before,
        .contenedor-reloj::after {
            content: "";
            position: absolute;
            left: 50%;
            width: 130px;
            height: 90px;
            transform: translateX(-50%);
            border-radius: 18px;
            background:
                repeating-linear-gradient(
                    90deg,
                    #252e2c 0,
                    #252e2c 9px,
                    #1c2422 9px,
                    #1c2422 14px
                );
        }

        .contenedor-reloj::before {
            top: 0;
        }

        .contenedor-reloj::after {
            bottom: 0;
        }

        .reloj {
            position: relative;
            z-index: 1;
            padding: 18px;
            border: 7px solid #202927;
            border-radius: 22px;
            background: #303a37;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.28);
        }

        .marca {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            color: #e7eeea;
            font-size: 12px;
            font-weight: bold;
        }

        .pantalla {
            min-height: 125px;
            padding: 12px;
            border: 5px solid #1c2422;
            background: #dbe8b5;
            color: #263028;
            font-family: "Courier New", monospace;
            overflow: hidden;
        }

        .datos-reloj {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
        }

        #operacion-pantalla {
            min-height: 22px;
            margin-top: 10px;
            text-align: right;
        }

        #valor-pantalla {
            font-size: 42px;
            line-height: 1;
            text-align: right;
            white-space: nowrap;
        }

        form {
            margin-top: 12px;
        }

        .teclado {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 7px;
        }

        .tecla {
            min-height: 48px;
            border: 0;
            border-radius: 5px;
            background: #d9dfcd;
            color: #27312e;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .tecla:hover {
            filter: brightness(0.93);
        }

        .operador {
            background: #aeb9a3;
        }

        .igual {
            background: #d9ef7c;
        }

        .cero {
            grid-column: span 2;
        }

        #resultado {
            min-height: 22px;
            margin: 12px 0 0;
            color: #ffb4a8;
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .pie {
            margin-top: 12px;
            color: #b8c4bf;
            font-size: 10px;
            text-align: center;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <div class="pagina">
        <header class="encabezado-pagina">
            <span>← Gadgets</span>
            <span>Reloj calculadora</span>
        </header>

        <div class="contenedor-reloj">
            <main class="reloj">
                <div class="marca">
                    <span>
                        <?= $relojCalculadora->getMarca(); ?>
                    </span>

                    <span>
                        <?= $relojCalculadora->getModelo(); ?>
                    </span>
                </div>

                <section class="pantalla">
                    <div class="datos-reloj">
                        <span><?= $horaInicial ?? ""; ?></span>
                        <span><?= $fechaInicial ?? ""; ?></span>
                    </div>

                    <div id="operacion-pantalla"></div>
                    <div id="valor-pantalla">0</div>
                </section>

                <form
                    id="form-reloj-calculadora"
                    action="reloj_calculadora.php"
                    method="POST"
                >
                    <input
                        type="hidden"
                        id="numero1"
                        name="numero1"
                    >

                    <input
                        type="hidden"
                        id="numero2"
                        name="numero2"
                    >

                    <input
                        type="hidden"
                        id="operacion"
                        name="operacion"
                    >

                    <div class="teclado">
                        <button
                            type="button"
                            class="tecla"
                            data-accion="limpiar"
                        >AC</button>

                        <button
                            type="button"
                            class="tecla"
                            data-accion="signo"
                        >±</button>

                        <button
                            type="button"
                            class="tecla"
                            data-accion="porcentaje"
                        >%</button>

                        <button
                            type="button"
                            class="tecla operador"
                            data-operacion="dividir"
                        >÷</button>

                        <button type="button" class="tecla" data-numero="7">7</button>
                        <button type="button" class="tecla" data-numero="8">8</button>
                        <button type="button" class="tecla" data-numero="9">9</button>

                        <button
                            type="button"
                            class="tecla operador"
                            data-operacion="multiplicar"
                        >×</button>

                        <button type="button" class="tecla" data-numero="4">4</button>
                        <button type="button" class="tecla" data-numero="5">5</button>
                        <button type="button" class="tecla" data-numero="6">6</button>

                        <button
                            type="button"
                            class="tecla operador"
                            data-operacion="restar"
                        >−</button>

                        <button type="button" class="tecla" data-numero="1">1</button>
                        <button type="button" class="tecla" data-numero="2">2</button>
                        <button type="button" class="tecla" data-numero="3">3</button>

                        <button
                            type="button"
                            class="tecla operador"
                            data-operacion="sumar"
                        >+</button>

                        <button
                            type="button"
                            class="tecla cero"
                            data-numero="0"
                        >0</button>

                        <button
                            type="button"
                            class="tecla"
                            data-numero="."
                        >.</button>

                        <button
                            type="submit"
                            class="tecla igual"
                        >=</button>
                    </div>
                </form>

                <p id="resultado"></p>

                <div class="pie">
                    <?= $relojCalculadora->getTipo(); ?>
                    · <?= $relojCalculadora->getTamano(); ?>
                </div>
            </main>
        </div>
    </div>

    <script>
        const formulario = document.getElementById(
            "form-reloj-calculadora"
        );

        const pantalla = document.getElementById("valor-pantalla");
        const operacionPantalla = document.getElementById(
            "operacion-pantalla"
        );

        const resultado = document.getElementById("resultado");

        const campoNumero1 = document.getElementById("numero1");
        const campoNumero2 = document.getElementById("numero2");
        const campoOperacion = document.getElementById("operacion");

        let valorActual = "0";
        let valorAnterior = null;
        let operacionActual = null;
        let simboloActual = "";
        let reiniciarPantalla = false;

        function actualizarPantalla() {
            pantalla.textContent = valorActual;
        }

        document
            .querySelectorAll("[data-numero]")
            .forEach(function (boton) {
                boton.addEventListener("click", function () {
                    const numero = boton.dataset.numero;

                    if (
                        numero === "." &&
                        valorActual.includes(".") &&
                        !reiniciarPantalla
                    ) {
                        return;
                    }

                    if (reiniciarPantalla) {
                        valorActual = numero === "." ? "0." : numero;
                        reiniciarPantalla = false;
                    } else if (numero === ".") {
                        valorActual += ".";
                    } else {
                        valorActual = valorActual === "0"
                            ? numero
                            : valorActual + numero;
                    }

                    actualizarPantalla();
                });
            });

        document
            .querySelectorAll("[data-operacion]")
            .forEach(function (boton) {
                boton.addEventListener("click", function () {
                    valorAnterior = valorActual;
                    operacionActual = boton.dataset.operacion;
                    simboloActual = boton.textContent.trim();

                    operacionPantalla.textContent =
                        valorAnterior + " " + simboloActual;

                    reiniciarPantalla = true;
                    resultado.textContent = "";
                });
            });

        document
            .querySelector('[data-accion="limpiar"]')
            .addEventListener("click", function () {
                valorActual = "0";
                valorAnterior = null;
                operacionActual = null;
                simboloActual = "";
                reiniciarPantalla = false;

                operacionPantalla.textContent = "";
                resultado.textContent = "";

                actualizarPantalla();
            });

        document
            .querySelector('[data-accion="signo"]')
            .addEventListener("click", function () {
                if (valorActual !== "0") {
                    valorActual = String(
                        parseFloat(valorActual) * -1
                    );

                    actualizarPantalla();
                }
            });

        document
            .querySelector('[data-accion="porcentaje"]')
            .addEventListener("click", function () {
                valorActual = String(
                    parseFloat(valorActual) / 100
                );

                actualizarPantalla();
            });

        formulario.addEventListener(
            "submit",
            async function (evento) {
                evento.preventDefault();

                if (
                    valorAnterior === null ||
                    operacionActual === null
                ) {
                    resultado.textContent =
                        "Selecciona dos números y una operación.";

                    return;
                }

                const segundoNumero = valorActual;

                campoNumero1.value = valorAnterior;
                campoNumero2.value = segundoNumero;
                campoOperacion.value = operacionActual;

                resultado.textContent = "Calculando...";

                try {
                    const respuesta = await fetch(
                        formulario.action,
                        {
                            method: "POST",
                            body: new FormData(formulario)
                        }
                    );

                    const datos = await respuesta.json();

                    if (datos.success) {
                        operacionPantalla.textContent =
                            valorAnterior +
                            " " +
                            simboloActual +
                            " " +
                            segundoNumero +
                            " =";

                        valorActual = String(datos.resultado);
                        actualizarPantalla();

                        resultado.textContent = "";
                        valorAnterior = null;
                        operacionActual = null;
                        reiniciarPantalla = true;
                    } else {
                        resultado.textContent =
                            "Error: " + datos.error;
                    }
                } catch (error) {
                    resultado.textContent =
                        "No se pudo comunicar con el servidor.";
                }
            }
        );
    </script>
</body>
</html>