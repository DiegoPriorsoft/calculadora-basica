<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Gadgets</title>

    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            padding: 48px 20px;
            background: #edf2ef;
            color: #24312e;
            font-family: Arial, sans-serif;
        }
        main { width: min(100%, 980px); margin: auto; }
        header { margin-bottom: 30px; }
        h1 { margin: 0 0 8px; font-size: clamp(34px, 7vw, 64px); }
        header p { margin: 0; color: #62716c; font-size: 18px; }
        .cuadricula {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 16px;
        }
        .tarjeta {
            min-height: 170px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 22px;
            border-radius: 18px;
            background: #24312e;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 14px 30px rgba(0, 0, 0, .16);
            transition: transform .15s ease, filter .15s ease;
        }
        .tarjeta:hover { transform: translateY(-4px); filter: brightness(1.08); }
        .numero { color: #aadb7d; font-size: 12px; font-weight: bold; }
        .tarjeta h2 { margin: 18px 0 6px; }
        .tarjeta p { margin: 0; color: #b9c6c1; line-height: 1.45; }
    </style>
</head>
<body>
    <main>
        <header>
            <h1>Gadgets PHP</h1>
            <p>Interfaces, herencia, composición y MVC.</p>
        </header>

        <section class="cuadricula">
            <a class="tarjeta" href="view/calculadora.php">
                <span class="numero">01</span>
                <div><h2>Calculadora</h2><p>Operaciones básicas mediante PHP y Fetch.</p></div>
            </a>

            <a class="tarjeta" href="controller/calculadora_cientifica.php">
                <span class="numero">02</span>
                <div><h2>Científica</h2><p>Trigonometría, raíces, potencias y logaritmos.</p></div>
            </a>

            <a class="tarjeta" href="controller/casio.php">
                <span class="numero">03</span>
                <div><h2>Casio</h2><p>Ejemplo sencillo de herencia.</p></div>
            </a>

            <a class="tarjeta" href="controller/reloj.php">
                <span class="numero">04</span>
                <div><h2>Reloj</h2><p>Interfaz de tiempo y sincronización.</p></div>
            </a>

            <a class="tarjeta" href="controller/reloj_calculadora.php">
                <span class="numero">05</span>
                <div><h2>Reloj calculadora</h2><p>Herencia y composición en un solo gadget.</p></div>
            </a>

            <a class="tarjeta" href="controller/television.php">
                <span class="numero">06</span>
                <div><h2>Smart TV</h2><p>Canales configurables y reproducción de video.</p></div>
            </a>

            <a class="tarjeta" href="controller/reloj_television.php">
                <span class="numero">07</span>
                <div><h2>Reloj televisión</h2><p>Video y reloj digital combinados.</p></div>
            </a>
        </section>
    </main>
</body>
</html>
