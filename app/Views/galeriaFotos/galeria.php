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

    <div class="cards-container w3-margin-bottom">
        <h1><?= lang('galeria.TitolGaleria') ?></h1>
        <?php if (!empty($albums)): ?>
            <div class="w3-row-padding">
                <?php foreach ($albums as $albumId): ?>
                    <div class="news-card w3-round">
                        <div class="w3-card w3-hover-shadow w3-round-large" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                            <a href="<?= base_url("galeria/album/$albumId") ?>" class="w3-card w3-padding album-card w3-block w3-hover-shadow" style="text-decoration: none; color: inherit;">
                                <div class="img-album">
                                    <img src="<?= $albumId['portada']; ?>" alt="Portada album">
                                </div>
                                <div class="card-content">
                                    <h3><?= $albumId['titol']; ?></h3>
                                    <span class="photo-count"><?= $albumId['count'] ?> fotos</span>
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