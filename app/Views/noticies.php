<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/noticies.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title><?= lang('noticies.Titol') ?></title>
</head>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container" style="margin-top: 2rem;">
        <div class="w3-container w3-teal" style="margin-bottom: 2rem">
            <h1><?= lang('noticies.Titol') ?></h1>
        </div>

        <button onclick="document.getElementById('eventModal').style.display='block'" class="w3-button w3-teal"><?= lang('noticies.VeureEvents') ?></button><br><br>

        <div id="eventModal" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <span onclick="document.getElementById('eventModal').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
                <div class="w3-container">
                    <h2><?= lang('noticies.Events') ?></h2>
                    <ul>
                        <?php foreach ($events as $event): ?>
                            <li>
                                <?= $event['nom']; ?> --
                                <span style="font-weight: bold; color: teal;"><?= $event['data']; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php $counter = 0; ?>
        <?php foreach ($gestio as $noticia): ?>
            <?php if ($counter % 3 == 0): ?>  <!-- Mostrara les noticies de 3 en 3 sempre que el modul doni 0 -->  
                <div class="w3-row-padding">
                <?php endif; ?>
                <div class="w3-col l4 m6 s12" style="margin-bottom: 1rem;">
                    <div class="w3-card news-card" style="display:flex; flex-direction: column;">
                        <a href="<?= base_url('noticia/' . $noticia['url']); ?>">
                            <img src="<?= $noticia['portada']; ?>" style="width:100%; height: 250px;">
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
<div class="paginador w3-center w3-red" style="color:black">
    <p><?= $pager->links('default', 'daw_template'); ?></p> <?php ?>
</div>
</div>

<?= $this->include('general/footer'); ?>
</body>

</html>