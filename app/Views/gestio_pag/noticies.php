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

        <h1 class="w3-center"><?= lang("noticies.Titol") ?></h1>

        <form method='get' action="<?= base_url('gestio/noticies'); ?>" id="searchForm" class="w3-container w3-padding w3-card w3-margin-bottom">

            <div class="w3-row w3-margin-bottom">
                <input type='text' name='q' value='<?= $search ?>' class="w3-input" placeholder="<?= lang('noticies.Buscar') ?>">
            </div>

            <div class="w3-row w3-margin-bottom">
                <select name="club" id="club" class="w3-select w3-border">
                    <option value=""><?= lang('noticies.Clubs') ?></option>
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id'] ?>" <?= old('club', $club['id'] ?? '') == $club['id'] ? 'selected' : '' ?>>
                            <?= $club['nom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="w3-row">
                <input type='button' id='btnsearch' value='Cercar' class="w3-button w3-green" onclick='document.getElementById("searchForm").submit();'>
            </div>
        </form>

        <?php if (!empty($noticies)): ?>
            <div class="cards-container">
                <?php foreach ($noticies as $noticia): ?>
                    <div class="news-card w3-round">
                        <div class="card-content">
                            <!-- <h3><?= esc($noticia['nom']) ?></h3> -->
                            <h3><?= esc(strlen($noticia['nom']) > 30 ? substr($noticia['nom'], 0, 30) . '...' : $noticia['nom']) ?></h3>
                            <img src="<?= esc($noticia['portada']) ?>" alt="<?= esc($noticia['nom']) ?>" class="w3-image">
                            <p><strong><?= lang("noticies.Resum") ?>:</strong> <?= esc(strlen($noticia['resum']) > 70 ? substr($noticia['resum'], 0, 70) . '...' : $noticia['resum']) ?></p>
                        </div>
                        <div class="w3-container card-footer">
                            <strong><?= lang("noticies.Data") ?>:</strong> <?= $noticia['created_at'] ?>
                        </div>
                        <div class="w3-container card-footer">
                            <strong><?= lang('noticies.Estat') ?></strong> <?= esc($noticia['estat'] ? 'publicat' : 'no_publicat') ?>
                        </div>
                        <div class="card-actions">
                            <!-- <a href="<?php // base_url('noticia/' . esc($noticia['id'])) 
                                            ?>"><?= lang("noticies.Veure") ?></a> -->
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