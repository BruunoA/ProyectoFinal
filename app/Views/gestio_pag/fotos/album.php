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
        <form method='get' action="<?= base_url('gestio/galeria'); ?>" id="searchForm" class="w3-container w3-padding w3-card w3-margin-bottom">

            <div class="w3-row w3-margin-bottom">
                <input type='text' name='q' value='<?= $search ?>' class="w3-input" placeholder="<?= lang('galeria.Buscar') ?>">
            </div>

            <div class="w3-row w3-margin-bottom">
                <select name="club" id="club" class="w3-select w3-border">
                    <option value=""><?= lang('noticies.Clubs') ?></option>
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id'] ?>" <?= old('club', $album['id_club'] ?? '') == $club['id'] ? 'selected' : '' ?>>
                            <?= $club['nom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="w3-row">
                <input type='button' id='btnsearch' value='Cercar' class="w3-button w3-green" onclick='document.getElementById("searchForm").submit();'>
            </div>
        </form>

        <?php if (!empty($albums)): ?>
            <div class="cards-container">
                <?php foreach ($albums as $album): ?>
                    <div class="album-card w3-round">
                        <div class="card-content">
                            <a href="<?= base_url('gestio/galeria_fotos/' . $album['id']) ?>">
                                <img src="<?= $album['portada'] ?>" alt="<?= esc($album['titol']) ?>" class="w3-image">
                                <h3><?= esc(strlen($album['titol']) > 30 ? substr($album['titol'], 0, 30) . '...' : $album['titol']) ?></h3>
                            </a>
                        </div>
                        <div class="w3-container card-footer">
                            <a href="<?= base_url('gestio/galeria/modify/' . $album['id']) ?>" class="w3-bar-item w3-button w3-blue w3-margin-right">Modificar album</a>
                            <a href="<?= base_url('gestio/galeria/eliminarAlbum/' . $album['id']) ?>" class="w3-bar-item w3-button w3-red" onclick="return confirm('Vols eliminar aquest album?');">Eliminar album</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-albums">
                <p>No hi ha àlbums disponibles.</p>
            </div>
        <?php endif; ?>
        <div class="paginador w3-center w3-black" style="color:black">
            <p><?= $pager->links('default', 'daw_template'); ?></p> <?php ?>
        </div>
    </div>
</body>

</html>