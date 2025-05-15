<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/galeria.css'); ?>">
    <title><?= lang('galeria.Titol') ?></title>
    <style>
        .img-album {
            height: 200px;
            overflow: hidden;
        }

        .img-album img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>
</head>

<body>
    <?= $this->include('general/menu'); ?>
    <?= session()->getFlashdata('error') ?>
    <div class="cards-container w3-margin-bottom w3-container" style="margin-top: 2rem;">
        <div class="w3-container w3-blue" style="margin-bottom: 2rem">
            <h1 class="w3-center w3-text-white"><?= lang('galeria.TitolGaleria') ?></h1>
        </div>

        <?php if (!empty($albums)): ?>
            <div class="w3-row-padding">
                <?php foreach ($albums as $albumId => $album): ?>
                    <div class="news-card w3-round">
                        <div class="w3-card w3-hover-shadow w3-round-large" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                            <a href="<?= base_url("galeria/album/" . $album['slug']) ?>" class="w3-card w3-padding album-card w3-block w3-hover-shadow" style="text-decoration: none; color: inherit;">
                                <div class="img-album">
                                    <img src="<?= $album['portada']; ?>" alt="Portada album">
                                </div>
                                <div class="card-content">
                                    <h3>
                                        <?= esc(strlen($album['titol']) > 40 ? substr($album['titol'], 0, 40) . '...' : $album['titol']) ?>
                                    </h3>
                                    <span class="photo-count"><?= $album['count'] ?> fotos</span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="w3-panel w3-yellow">
                <p><?= lang('galeria.ErrorFotos') ?></p>
            </div>
        <?php endif; ?>
    </div>

    <?= $this->include('general/footer'); ?>
</body>

</html>