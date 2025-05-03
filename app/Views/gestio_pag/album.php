<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Document</title>
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <a href="<?= base_url('pujarArxiu') ?>" class="w3-button w3-black w3-margin">Pujar imatges</a>
    <a href="<?= base_url('gestio/galeria/crearAlbum') ?>" class="w3-button w3-black w3-margin">Crear album</a>
    <div class="w3-container">
        <?= session()->getFlashdata('success') ?>
        <h2>Galería de Álbumes</h2>
        <?php if (!empty($albums) && is_array($albums)): ?>
            <div class="w3-row-padding">
                <?php foreach ($albums as $album): ?>
                    <div class="w3-third w3-margin-bottom">
                        <div class="w3-card-4">
                            <a href="<?= base_url('gestio/galeria_fotos/' . $album['id']) ?>">
                                <img src="<?= $album['portada'] ?>" alt="<?= esc($album['titol']) ?>" style="width:100%">
                                <div class="w3-container">
                                    <h3><?= esc($album['titol']) ?></h3>
                                </div>
                            </a>
                            <a href="<?= base_url('gestio/galeria/eliminarAlbum/' . $album['id']) ?>" style="margin:1rem;" onclick="return confirm('¿Estás seguro de que deseas eliminar este álbum?');">Eliminar galeria</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No hay álbumes disponibles.</p>
        <?php endif; ?>
    </div>
</body>

</html>