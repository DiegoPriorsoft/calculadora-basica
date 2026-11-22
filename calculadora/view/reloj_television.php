<?php

/** @var Reloj $reloj */
/** @var Television $television */
/** @var array $canales */
/** @var array $canalActual */
/** @var string $horaInicial */
/** @var string $fechaInicial */
/** @var string|null $error */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reloj Televisión</title>

    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
            background: #edf2ef;
            color: #27312e;
            font-family: Arial, sans-serif;
        }
        .pagina { width: min(100%, 950px); margin: auto; }
        .encabezado {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .television {
            padding: 18px;
            border-radius: 18px;
            background: #283431;
            color: #fff;
            box-shadow: 0 20px 45px rgba(0, 0, 0, .28);
        }
        .barra {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
            color: #c7d3cf;
            font-size: 12px;
            font-weight: bold;
        }
        .pantalla {
            position: relative;
            padding: 8px;
            border-radius: 8px;
            background: #080d0c;
        }
        video {
            display: block;
            width: 100%;
            aspect-ratio: 16 / 9;
            background: #000;
        }
        .reloj-digital {
            position: absolute;
            right: 24px;
            bottom: 24px;
            padding: 12px 16px;
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 8px;
            background: rgba(10, 18, 16, .82);
            text-align: right;
        }
        .reloj-digital strong { display: block; font-size: 30px; }
        .reloj-digital span { color: #d9ef7c; font-size: 11px; }
        .informacion { padding: 16px 4px 4px; }
        .informacion h1 { margin: 0 0 5px; font-size: 20px; }
        .informacion p { margin: 0; color: #b9c6c1; }
        .canales {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 10px;
            margin-top: 18px;
        }
        .canal {
            padding: 12px;
            border: 1px solid #53625e;
            border-radius: 8px;
            color: #fff;
            text-decoration: none;
        }
        .canal:hover, .canal.activo { background: #41533d; border-color: #aadb7d; }
        .canal strong, .canal span { display: block; }
        .canal span { margin-top: 4px; color: #b9c6c1; font-size: 12px; }
        .error {
            margin-top: 16px;
            padding: 12px;
            border-radius: 8px;
            background: #7b2929;
        }
        @media (max-width: 600px) {
            .reloj-digital { right: 16px; bottom: 16px; }
            .reloj-digital strong { font-size: 22px; }
        }
    </style>
</head>
<body>
    <main class="pagina">
        <header class="encabezado">
            <span>← Gadgets</span>
            <span>Reloj Televisión</span>
        </header>

        <section class="television">
            <div class="barra">
                <span><?= htmlspecialchars($television->getMarca(), ENT_QUOTES, "UTF-8"); ?></span>
                <span><?= htmlspecialchars($television->getModelo(), ENT_QUOTES, "UTF-8"); ?></span>
            </div>

            <div class="pantalla">
                <video controls autoplay muted>
                    <source src="<?= htmlspecialchars($canalActual["url"], ENT_QUOTES, "UTF-8"); ?>" type="video/mp4">
                    Tu navegador no puede reproducir este video.
                </video>

                <div class="reloj-digital">
                    <strong><?= htmlspecialchars($horaInicial, ENT_QUOTES, "UTF-8"); ?></strong>
                    <span><?= htmlspecialchars($fechaInicial, ENT_QUOTES, "UTF-8"); ?></span>
                </div>
            </div>

            <div class="informacion">
                <h1><?= htmlspecialchars($canalActual["nombre"], ENT_QUOTES, "UTF-8"); ?></h1>
                <p><?= htmlspecialchars($canalActual["descripcion"], ENT_QUOTES, "UTF-8"); ?></p>
            </div>

            <nav class="canales">
                <?php foreach ($canales as $id => $canal): ?>
                    <a
                        class="canal <?= $canal === $canalActual ? "activo" : ""; ?>"
                        href="?canal=<?= urlencode($id); ?>"
                    >
                        <strong><?= htmlspecialchars($canal["nombre"], ENT_QUOTES, "UTF-8"); ?></strong>
                        <span><?= htmlspecialchars($canal["descripcion"], ENT_QUOTES, "UTF-8"); ?></span>
                    </a>
                <?php endforeach; ?>
            </nav>

            <?php if ($error !== null): ?>
                <div class="error"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?></div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
