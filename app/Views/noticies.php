<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/noticies.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title><?=lang('noticies.Titol')?></title>
</head>
<body>
<?= $this->include('general/menu'); ?>

<div class="w3-container" style="margin-top: 2rem;">
    <div class="w3-container w3-teal" style="margin-bottom: 2rem">
        <h1><?=lang('noticies.Titol')?></h1>
    </div>
    <?php $counter = 0; ?>
    <?php foreach ($gestio as $noticia): ?>
        <?php if ($counter % 3 == 0): ?>
            <div class="w3-row-padding">
        <?php endif; ?>
        <div class="w3-col l4 m6 s12" style="margin-bottom: 1rem;">
            <div class="w3-card news-card" style="display:flex; flex-direction: column;">
            <a href="<?= base_url('noticia/' . $noticia['id']); ?>">
                    <!-- <img src="<?php // base_url('assets/img/noticia.jpeg'); ?>" style="width:100%"> -->
                    <img src="<?= $noticia['portada']; ?>" style="width:100%; height: 300px;">
                </a>
                <div class="w3-container news-container">
                    <h5><strong><?= $noticia['nom'] ?></strong></h5>
                    <p><?= $noticia['resum'] ?></p>
                </div>
            </div>
        </div>
        <?php $counter++; ?>
        <?php if ($counter % 3 == 0): ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php if ($counter % 3 != 0): ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->include('general/footer'); ?>
</body>
</html>