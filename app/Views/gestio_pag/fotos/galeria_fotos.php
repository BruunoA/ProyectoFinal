<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Fotos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    .w3-button {
        margin: 2px;
    }

    .w3-button[disabled] {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>

<body class="w3-light-grey">
    <a href="<?= base_url('gestio/galeria') ?>" class="w3-button w3-black w3-margin"><i class="fas fa-arrow-left"></i> Tornar a la galeria</a>
    <div class="w3-container w3-padding-32">
        <?= session()->getFlashdata('success') ?>
        <?php if (!empty($album)): ?>
            <h1 class="w3-center"><?= esc($album['titol']) ?></h1>

            <?php if (!empty($fotos)): ?>
                <div class="w3-row-padding w3-margin-top">
                    <?php foreach ($fotos as $foto): ?>
                        <div class="w3-third w3-margin-bottom">
                            <div class="w3-card w3-white w3-padding">
                                <img src="<?= $foto['ruta'] ?>" alt="foto" style="width:100%" class="w3-image">
                                <h4><?= esc(strlen($foto['titol']) > 20 ? substr($foto['titol'], 0, 20) . '...' : $foto['titol']) ?></h4>
                                <p><?= esc(strlen($foto['descripcio']) > 50 ? substr($foto['descripcio'], 0, 50) . '...' : $foto['descripcio']) ?></p>
                                <form action="<?= base_url('gestio/eliminar_foto') ?>" method="post">
                                    <input type="hidden" name="id_foto" value="<?= $foto['id'] ?>">
                                    <input type="hidden" name="id_album" value="<?= $album['id'] ?>">
                                    <button type="submit" class="w3-button w3-red w3-small" onclick="return confirm('Vols eliminar aquesta foto?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                    <a href="<?= base_url('gestio/galeria/edit_foto/' . $foto['id']) ?>" class="w3-button w3-blue w3-small">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                </form>
                                <form action="<?= base_url('gestio/cambiar_estat_foto') ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="id_foto" value="<?= $foto['id'] ?>">
                                    <input type="hidden" name="id_album" value="<?= $album['id'] ?>">
                                    <input type="hidden" name="estat" value="publicat">
                                    <button type="submit" class="w3-button w3-green w3-small" <?= $foto['estat'] == 1 ? 'disabled' : '' ?>>
                                        <i class="fas fa-check"></i> Publicar
                                    </button>
                                </form>

                                <form action="<?= base_url('gestio/cambiar_estat_foto') ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="id_foto" value="<?= $foto['id'] ?>">
                                    <input type="hidden" name="id_album" value="<?= $album['id'] ?>">
                                    <input type="hidden" name="estat" value="no_publicat">
                                    <button type="submit" class="w3-button w3-orange w3-small" <?= $foto['estat'] == 0 ? 'disabled' : '' ?>>
                                        <i class="fas fa-times"></i> Despublicar
                                    </button>
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