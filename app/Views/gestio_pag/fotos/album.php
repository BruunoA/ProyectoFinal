<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/albumsGestio.css'); ?>">

    <title><?= lang('albumsGestio.titol') ?></title>
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <a href="<?= base_url('pujarArxiu') ?>" class="w3-button w3-black w3-margin"><?= lang('albumsGestio.imatges') ?></a>
    <a href="<?= base_url('gestio/galeria/crearAlbum') ?>" class="w3-button w3-black w3-margin"><?= lang('albumsGestio.crear') ?></a>
    <div class="w3-container">
        <?= session()->getFlashdata('success') ?>
        <h2><?= lang('albumsGestio.subtitol') ?></h2>
        <form method='get' action="<?= base_url('gestio/galeria'); ?>" id="searchForm">
            <input type='text' name='q' value='<?= $search ?>' placeholder="Buscar aqui...">
            <input type='button' id='btnsearch' value='Cercar' onclick='document.getElementById("searchForm").submit();'>
        </form><br>
        <?php if (!empty($albums) && is_array($albums)): ?>
            <div class="album-row">
                <?php foreach ($albums as $album): ?>
                    <div class="album-card">
                        <div class="w3-card-4">
                            <a href="<?= base_url('gestio/galeria_fotos/' . $album['id']) ?>">
                                <img src="<?= $album['portada'] ?>" alt="<?= esc($album['titol']) ?>" style="width:100%">
                                <div class="w3-container">
                                    <h3><?= esc($album['titol']) ?></h3>
                                </div>
                            </a>
                            <div class="w3-bar w3-margin-bottom w3-margin-left">
                                <a href="<?= base_url('gestio/galeria/modify/' . $album['id']) ?>" class="w3-bar-item w3-button w3-blue w3-margin-right">Modificar album</a>
                                <a href="<?= base_url('gestio/galeria/eliminarAlbum/' . $album['id']) ?>" class="w3-bar-item w3-button w3-red" onclick="return confirm('Vols eliminar aquest album?');">Eliminar album</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p><?= lang('albumsGestio.null') ?></p>
        <?php endif; ?>
        <div class="paginador w3-center w3-black" style="color:black">
            <p><?= $pager->links('default', 'daw_template'); ?></p> <?php ?>
        </div>
    </div>
</body>

</html>