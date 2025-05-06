<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícies</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/gestioNoticies.css'); ?>">
</head>

<body class="w3-light-grey">
    <?= $this->include('general/menuGestio'); ?>
    <div class="w3-container">
        <a href="<?= base_url('wysiwyg') ?>" class="w3-button w3-blue w3-margin"><?= lang("noticies.afegir") ?></a>
    </div>
    <?= session()->getFlashdata('success') ?>
    <div class="w3-container">
    <form method='get' action="<?= base_url('gestio/noticies'); ?>" id="searchForm">
        <input type='text' name='q' value='<?= $search ?>' placeholder="Buscar aqui...">
        <input type='button' id='btnsearch' value='Cercar' onclick='document.getElementById("searchForm").submit();'>
    </form>
        <h1 class="w3-center"><?= lang("noticies.Titol") ?></h1>
        <?php if (!empty($noticies)): ?>
            <div class="cards-container">
                <?php foreach ($noticies as $noticia): ?>
                    <div class="news-card w3-round">
                        <div class="card-content">
                            <h3><?= esc($noticia['nom']) ?></h3>
                            <img src="<?= esc($noticia['portada']) ?>" alt="<?= esc($noticia['nom']) ?>" class="w3-image">
                            <p><strong><?= lang("noticies.Resum") ?>:</strong> <?= $noticia['resum']?></p>
                        </div>
                        <div class="w3-container card-footer">
                            <strong><?= lang("noticies.Data") ?>:</strong> <?= $noticia['created_at'] ?>
                        </div>
                        <div class="w3-container card-footer">
                            <strong>Estat:</strong> <?= esc($noticia['estat']) ?>
                        </div>
                        <div class="card-actions">
                            <!-- <a href="<?php // base_url('noticia/' . esc($noticia['id'])) ?>"><?= lang("noticies.Veure") ?></a> -->
                            <a href="<?= base_url('gestio/modify/' . esc($noticia['id'])) ?>" class="w3-green"><?= lang("noticies.Editar") ?></a>
                            <a href="<?= base_url('gestio/delete/' . esc($noticia['id'])) ?>" class="w3-red" onclick="return confirm('Estàs segur que vols eliminar aquesta notícia?')"><?= lang("noticies.Eliminar") ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-news">
                <p><?= lang("noticies.NoNoticies") ?></p>
            </div>
        <?php endif; ?>
        <div class="paginador w3-center w3-red" style="color:black">
            <p><?= $pager->links('default', 'daw_template'); ?></p> <?php ?>
        </div>
    </div>
</body>

</html>