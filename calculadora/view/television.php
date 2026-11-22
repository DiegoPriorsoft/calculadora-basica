<?php

/** @var Television $television */
/** @var array $canales */
/** @var array $canalActual */
/** @var string|null $error */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Smart TV</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
            background: #edf2ef;
            color: #27312e;
            font-family: Arial, sans-serif;
        }

        .pagina {
            width: min(100%, 900px);
            margin: auto;
        }

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
            color: #ffffff;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.28);
        }

        .marca {
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            color: #c7d3cf;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .pantalla {
            padding: 8px;
            border-radius: 8px;
            background: #080d0c;
        }

        video {
            display: block;
            width: 100%;
            aspect-ratio: 16 / 9;
            background: #000000;
        }

        .informacion {
            display: flex;
            gap: 14px;
            align-items: center;
            padding: 16px 4px 8px;
        }

        .icono {
            display: grid;
            width: 42px;
            height: 42px;
            place-items: center;
            border-radius: 8px;
            background: #87cad0;
            color: #24312e;
            font-weight: bold;
        }

        .informacion h1 {
            margin: 0 0 5px;
            font-size: 20px;
        }

        .informacion p {
            margin: 0;
            color: #b9c6c1;
            font-size: 14px;
        }

        .canales {
            display: grid;
            grid-template-columns: repeat(
                auto-fit,
                minmax(160px, 1fr)
            );
            gap: 10px;
            margin-top: 18px;
        }

        .canal {
            display: block;
            padding: 12px;
            border: 1px solid #53625e;
            border-radius: 8px;
            color: #ffffff;
            text-decoration: none;
            transition:
                background 0.15s ease,
                transform 0.15s ease;
        }

        .canal:hover {
            background: #3a4945;
            transform: translateY(-2px);
        }

        .canal.activo {
            border-color: #aadb7d;
            background: #41533d;
        }

        .canal strong,
        .canal span {
            display: block;
        }

        .canal span {
            margin-top: 4px;
            color: #b9c6c1;
            font-size: 12px;
        }

        .error {
            margin-top: 18px;
            padding: 12px;
            border-radius: 8px;
            background: #7b2929;
            color: #ffffff;
        }

        .pie {
            margin-top: 16px;
            color: #aebbb7;
            font-size: 11px;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <main class="pagina">
        <header class="encabezado">
            <span>← Gadgets</span>

            <span>
                <?= htmlspecialchars(
                    $television->getTipo(),
                    ENT_QUOTES,
                    "UTF-8"
                ); ?>
            </span>
        </header>

        <section class="television">
            <div class="marca">
                <span>
                    <?= htmlspecialchars(
                        $television->getMarca(),
                        ENT_QUOTES,
                        "UTF-8"
                    ); ?>
                </span>

                <span>
                    <?= htmlspecialchars(
                        $television->getModelo(),
                        ENT_QUOTES,
                        "UTF-8"
                    ); ?>
                </span>
            </div>

            <div class="pantalla">
                <video controls autoplay muted>
                    <source
                        src="<?= htmlspecialchars(
                            $canalActual["url"],
                            ENT_QUOTES,
                            "UTF-8"
                        ); ?>"
                        type="video/mp4"
                    >

                    Tu navegador no puede reproducir este video.
                </video>
            </div>

            <div class="informacion">
                <div class="icono">TV</div>

                <div>
                    <h1>
                        <?= htmlspecialchars(
                            $canalActual["nombre"],
                            ENT_QUOTES,
                            "UTF-8"
                        ); ?>
                    </h1>

                    <p>
                        <?= htmlspecialchars(
                            $canalActual["descripcion"],
                            ENT_QUOTES,
                            "UTF-8"
                        ); ?>
                    </p>
                </div>
            </div>

            <nav class="canales">
                <?php foreach ($canales as $id => $canal): ?>
                    <a
                        class="canal <?= (
                            $canal === $canalActual
                                ? "activo"
                                : ""
                        ); ?>"
                        href="?canal=<?= urlencode($id); ?>"
                    >
                        <strong>
                            <?= htmlspecialchars(
                                $canal["nombre"],
                                ENT_QUOTES,
                                "UTF-8"
                            ); ?>
                        </strong>

                        <span>
                            <?= htmlspecialchars(
                                $canal["descripcion"],
                                ENT_QUOTES,
                                "UTF-8"
                            ); ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </nav>

            <?php if ($error !== null): ?>
                <div class="error">
                    <?= htmlspecialchars(
                        $error,
                        ENT_QUOTES,
                        "UTF-8"
                    ); ?>
                </div>
            <?php endif; ?>

            <div class="pie">
                <?= htmlspecialchars(
                    $television->getColor(),
                    ENT_QUOTES,
                    "UTF-8"
                ); ?>

                ·

                <?= htmlspecialchars(
                    $television->getTamano(),
                    ENT_QUOTES,
                    "UTF-8"
                ); ?>
            </div>
        </section>
    </main>
</body>
</html>
