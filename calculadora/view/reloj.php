<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reloj PHP</title>

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
            background: #e8eeee;
            font-family: Arial, sans-serif;
        }

        .reloj {
            width: min(100%, 380px);
            padding: 24px;
            border-radius: 28px;
            background: #202a2a;
            color: #ffffff;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.3);
        }

        h1 {
            margin: 0 0 20px;
            text-align: center;
        }

        p {
            margin: 12px 0;
        }

        .pantalla {
            margin-bottom: 20px;
            padding: 18px;
            border-radius: 14px;
            background: #101919;
            text-align: center;
        }

        .hora {
            display: block;
            font-family: "Courier New", monospace;
            font-size: 42px;
        }

        .fecha {
            display: block;
            margin-top: 6px;
            color: #9daaaa;
        }

        .datos {
            padding-top: 4px;
            border-top: 1px solid #3b4846;
        }
    </style>
</head>
<body>
    <main class="reloj">
        <h1><?= htmlspecialchars($reloj->getTipo(), ENT_QUOTES, "UTF-8"); ?></h1>

        <section class="pantalla">
            <span class="hora"><?= htmlspecialchars($horaInicial ?? "", ENT_QUOTES, "UTF-8"); ?></span>
            <span class="fecha"><?= htmlspecialchars($fechaInicial ?? "", ENT_QUOTES, "UTF-8"); ?></span>
        </section>

        <section class="datos">
            <p><strong>Marca:</strong> <?= htmlspecialchars($reloj->getMarca(), ENT_QUOTES, "UTF-8"); ?></p>
            <p><strong>Modelo:</strong> <?= htmlspecialchars($reloj->getModelo(), ENT_QUOTES, "UTF-8"); ?></p>
            <p><strong>Color:</strong> <?= htmlspecialchars($reloj->getColor(), ENT_QUOTES, "UTF-8"); ?></p>
            <p><strong>Tamaño:</strong> <?= htmlspecialchars($reloj->getTamano(), ENT_QUOTES, "UTF-8"); ?></p>
        </section>
    </main>
</body>
</html>
