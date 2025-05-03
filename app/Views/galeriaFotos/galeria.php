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
        .album-card {
            cursor: pointer;
            transition: transform 0.3s;
        }

        .album-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .photo-count {
            display: block;
            text-align: center;
            margin-top: 5px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container">
        <h1><?= lang('galeria.TitolGaleria') ?></h1>

        <?php if (!empty($albums)): ?>
            <div class="w3-row-padding">
                <?php foreach ($albums as $albumId => $albumData): ?>
                    <div class="w3-col m4 w3-margin-bottom">
                        <a href="<?= base_url("galeria/album/$albumId") ?>" class="w3-card w3-padding album-card w3-block w3-hover-shadow" style="text-decoration: none; color: inherit;">
                            <img src="<?= base_url('assets/img/camara.png'); ?>" style="width:100%; height:200px; object-fit:cover;">
                            <div class="w3-container w3-center">
                                <h3><?= $albumData['titol']; ?></h3>
                                <span class="photo-count"><?= $albumData['count'] ?> fotos</span>
                            </div>
                        </a>
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