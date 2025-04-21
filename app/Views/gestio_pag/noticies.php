<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícies</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        /* Aseguramos que todas las tarjetas tengan la misma altura */
        .same-height {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        /* Esto fuerza que las tarjetas se distribuyan bien en una fila */
        .w3-row-padding {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Cada tarjeta tendrá un 30% del ancho para que quepan 3 por fila */
        .w3-third {
            flex: 1 1 30%;
            min-width: 280px;
            /* Garantizamos que no se colapsen */
        }

        .content-preview {
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body class="w3-light-grey">
<?= $this->include('general/menuGestio'); ?>
    <div class="w3-container">
        <h1 class="w3-center"><?= lang("noticies.Titol") ?></h1>
        <?php if (!empty($noticies)): ?>
            <div class="w3-row-padding">
                <?php foreach ($noticies as $index => $noticia): ?>
                    <div class="w3-third w3-margin-bottom">
                        <div class="w3-card w3-white w3-round w3-padding same-height">
                            <div>
                                <h3><?= esc($noticia['nom']) ?></h3>
                                <p><strong><?= lang("noticies.Resum") ?>:</strong> <?= esc($noticia['resum']) ?></p>
                                <p><strong><?= lang("noticies.Contingut") ?>:</strong>
                                    <?php
                                    $contingut = esc($noticia['contingut']);
                                    echo strlen($contingut) > 400 ? substr($contingut, 0, 400) . '...' : $contingut;
                                    ?>
                                </p>
                            </div>
                            <div class="w3-bar w3-margin-top w3-center">
                                <a href="<?= base_url('noticia/' . esc($noticia['id'])) ?>" class="w3-button w3-blue w3-small w3-margin-right"><?= lang("noticies.Veure") ?></a>
                                <a href="<?= base_url('gestio/modify/' . esc($noticia['id'])) ?>" class="w3-button w3-green w3-small w3-margin-right"><?= lang("noticies.Editar") ?></a>
                                <a href="<?= base_url('gestio/delete/' . esc($noticia['id'])) ?>" class="w3-button w3-red w3-small" onclick="return confirm('Estàs segur que vols eliminar aquesta notícia?')"><?= lang("noticies.Eliminar") ?></a>
                            </div>
                        </div>
                    </div>
                    <?php if (($index + 1) % 3 == 0): ?>
            </div>
            <div class="w3-row-padding">
            <?php endif; ?>
        <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="w3-panel w3-yellow w3-padding">No hi ha notícies disponibles.</p>
        <?php endif; ?>
    </div>
</body>

</html>