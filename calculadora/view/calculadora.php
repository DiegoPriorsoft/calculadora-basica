<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>

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
        padding: 24px;
        background: linear-gradient(135deg, #edf2f2, #dce5e5);
        font-family: Arial, sans-serif;
    }

    h1 {
        margin: 0;
        color: #ffffff;
        font-size: 20px;
    }

    .calculadora {
        width: min(100%, 360px);
        padding: 18px;
        border-radius: 24px;
        background: #202a2a;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.28);
    }

    .encabezado {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2px 2px 16px;
    }

    .encabezado span {
        color: #9daaaa;
        font-size: 11px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    form {
        width: 100%;
        padding-top: 14px;
    }

    button {
        width: 100%;
        padding: 13px;
        border: 0;
        border-radius: 8px;
        background: #354141;
        color: #ffffff;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        filter: brightness(1.12);
        transform: translateY(-1px);
    }

    #resultado {
        min-height: 30px;
        margin-top: 18px;
        color: #ffb4a8;
        font-size: 15px;
        font-weight: bold;
        text-align: center;
    }

  .pantalla {
    width: 100%;
    min-height: 110px;
    padding: 18px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    border-radius: 14px;
    background: #101919;
    color: white;
    text-align: right;
    overflow: hidden;
}

#operacion-pantalla {
    min-height: 24px;
    color: #9daaaa;
}

#valor-pantalla {
    font-size: 42px;
    line-height: 1.1;
    white-space: nowrap;
}

.teclado {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
}

.tecla {
    min-height: 60px;
    padding: 10px;
    font-size: 20px;
    border-radius: 10px;
    background: #354141;
    transition: filter 0.15s ease, transform 0.15s ease;
}

.utilidad {
    background: #657070;
}

.operador {
    background: #f28b3c;
}

.igual {
    background: #5bb9a4;
}

.cero {
    grid-column: span 2;
}

</style>


</head>
<body>
<main class="calculadora">
    <div class="encabezado">
        <h1>Calculadora</h1>
        <span>BÁSICA</span>
    </div>

    <div class="pantalla">
        <div id="operacion-pantalla"></div>
        <div id="valor-pantalla">0</div>
    </div>

<form
    id="form-calculadora"
    action="../controller/calculadora.php"
    method="POST"
>
    <input type="hidden" id="numero1" name="numero1">
    <input type="hidden" id="numero2" name="numero2">
    <input type="hidden" id="operacion" name="operacion">

    <div class="teclado">
        <button type="button" class="tecla utilidad" data-accion="limpiar">
            AC
        </button>
        <button type="button" class="tecla utilidad" data-accion="signo">
            ±
        </button>
        <button type="button" class="tecla utilidad" data-accion="porcentaje">
            %
        </button>
        <button type="button" class="tecla operador" data-operacion="dividir">
            ÷
        </button>

        <button type="button" class="tecla numero" data-numero="7">7</button>
        <button type="button" class="tecla numero" data-numero="8">8</button>
        <button type="button" class="tecla numero" data-numero="9">9</button>
        <button type="button" class="tecla operador" data-operacion="multiplicar">
            ×
        </button>

        <button type="button" class="tecla numero" data-numero="4">4</button>
        <button type="button" class="tecla numero" data-numero="5">5</button>
        <button type="button" class="tecla numero" data-numero="6">6</button>
        <button type="button" class="tecla operador" data-operacion="restar">
            −
        </button>

        <button type="button" class="tecla numero" data-numero="1">1</button>
        <button type="button" class="tecla numero" data-numero="2">2</button>
        <button type="button" class="tecla numero" data-numero="3">3</button>
        <button type="button" class="tecla operador" data-operacion="sumar">
            +
        </button>

        <button type="button" class="tecla numero cero" data-numero="0">
            0
        </button>
        <button type="button" class="tecla numero" data-numero=".">.</button>
        <button type="submit" class="tecla igual">=</button>
    </div>
</form>

<p id="resultado"></p>
</main>

<script>
    const formulario = document.getElementById("form-calculadora");
    const resultado = document.getElementById("resultado");
    const valorPantalla = document.getElementById("valor-pantalla");
    const operacionPantalla = document.getElementById("operacion-pantalla");

    const campoNumero1 = document.getElementById("numero1");
    const campoNumero2 = document.getElementById("numero2");
    const campoOperacion = document.getElementById("operacion");

    let valorActual = "0";
    let valorAnterior = null;
    let operacionActual = null;
    let simboloActual = "";
    let reiniciarPantalla = false;

    function actualizarPantalla() {
        valorPantalla.textContent = valorActual;
    }

    document.querySelectorAll("[data-numero]").forEach(function (boton) {
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

    document.querySelectorAll("[data-operacion]").forEach(function (boton) {
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
                valorActual = String(parseFloat(valorActual) * -1);
                actualizarPantalla();
            }
        });

    document
        .querySelector('[data-accion="porcentaje"]')
        .addEventListener("click", function () {
            valorActual = String(parseFloat(valorActual) / 100);
            actualizarPantalla();
        });

    formulario.addEventListener("submit", async function (evento) {
        evento.preventDefault();

        if (valorAnterior === null || operacionActual === null) {
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
            const respuesta = await fetch(formulario.action, {
                method: "POST",
                body: new FormData(formulario)
            });

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
                resultado.textContent = "Error: " + datos.error;
            }
        } catch (error) {
            resultado.textContent =
                "No se pudo establecer comunicación con el servidor.";
        }
    });
</script>
  
</body>
</html>
