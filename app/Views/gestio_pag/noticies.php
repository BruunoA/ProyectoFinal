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
        <h1 class="w3-center"><?= lang("noticies.Titol") ?></h1>
        <?php if (!empty($noticies)): ?>
            <div class="cards-container">
                <?php foreach ($noticies as $noticia): ?>
                    <div class="news-card w3-round">
                        <div class="card-content">
                            <h3><?= esc($noticia['nom']) ?></h3>
                            <p><strong><?= lang("noticies.Resum") ?>:</strong> <?= esc($noticia['resum']) ?></p>
                            <div class="content-preview">
                                <strong><?= lang("noticies.Contingut") ?>:</strong>
                                <?= strlen($noticia['contingut']) > 400 ? substr(esc($noticia['contingut']), 0, 400) . '...' : esc($noticia['contingut']) ?>
                            </div>
                        </div>
                        <div class="card-actions">
                            <a href="<?= base_url('noticia/' . esc($noticia['id'])) ?>"><?= lang("noticies.Veure") ?></a>
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
    </div>
</body>

</html>