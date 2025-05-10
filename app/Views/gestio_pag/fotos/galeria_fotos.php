<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Fotos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-light-grey">
    <a href="<?= base_url('gestio/galeria') ?>" class="w3-button w3-black w3-margin">Tornar a la galeria</a>
    <div class="w3-container w3-padding-32">
        <?= session()->getFlashdata('success') ?>
        <?php if (!empty($album)): ?>
            <h1 class="w3-center"><?= esc($album['titol']) ?></h1>

            <?php if (!empty($fotos)): ?>
                <div class="w3-row-padding w3-margin-top">
                    <?php foreach ($fotos as $foto): ?>
                        <div class="w3-third w3-margin-bottom">
                            <div class="w3-card w3-white w3-padding">
                                <img src="<?= base_url($foto['ruta']) ?>" alt="foto" style="width:100%" class="w3-image">
                                <h4><?= esc($foto['titol']) ?></h4>
                                <p><?= esc($foto['descripcio']) ?></p>
                                <form action="/gestio/eliminar_foto" method="post">
                                    <input type="hidden" name="id_foto" value="<?= $foto['id'] ?>">
                                    <input type="hidden" name="id_album" value="<?= $album['id'] ?>">
                                    <button type="submit" class="w3-button w3-red w3-small" onclick="return confirm('Vols eliminar aquesta foto?')">Eliminar</button>
                                    <button type="button" class="w3-button w3-blue w3-small" onclick="window.location.href='<?= base_url('gestio/galeria/edit_foto/' . $foto['id']) ?>'">Editar</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="w3-center w3-text-grey">No s'ha trobat cap foto en aquest àlbum.</p>
            <?php endif; ?>

        <?php else: ?>
            <p class="w3-center w3-text-red">Àlbum no trobat.</p>
        <?php endif; ?>
    </div>

</body>

</html>