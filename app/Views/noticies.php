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
        <div class="w3-container w3-teal w3-padding-16 w3-round-large" style="margin-bottom: 2rem;">
            <h1 class="w3-center"><?= lang('noticies.Titol') ?></h1>
        </div>

        <button onclick="document.getElementById('eventModal').style.display='block'" class="w3-button w3-teal w3-round-large w3-hover-shadow">
            <?= lang('noticies.VeureEvents') ?>
        </button><br><br>

        <div id="eventModal" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom w3-round-large">
                <span onclick="document.getElementById('eventModal').style.display='none'" class="w3-button w3-large w3-display-topright w3-hover-red">&times;</span>
                <div class="w3-container w3-padding-16">
                    <h2 class="w3-text-teal"><?= lang('noticies.Events') ?></h2>
                    <ul class="w3-ul w3-border">
                        <?php foreach ($events as $event): ?>
                            <li class="w3-padding-16">
                                <span class="w3-text-black"><?= $event['nom']; ?></span> --
                                <span class="w3-text-teal w3-bold"><?= $event['data']; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <?php $counter = 0; ?>
        <?php foreach ($gestio as $noticia): ?>
            <?php if ($counter % 3 == 0): ?>
                <div class="w3-row-padding">
            <?php endif; ?>
            <div class="w3-col l4 m6 s12" style="margin-bottom: 1rem;">
                <div class="w3-card w3-hover-shadow w3-round-large news-card" style="display:flex; flex-direction: column;">
                    <a href="<?= base_url('noticia/' . $noticia['url']); ?>" class="w3-hover-opacity">
                        <img src="<?= $noticia['portada']; ?>" class="w3-round-large" style="width:100%; height: 250px;">
                    </a>
                    <div class="w3-container w3-padding-16 news-container">
                        <h5 class="w3-text-teal"><strong><?= $noticia['nom'] ?></strong></h5>
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

        <div class="w3-center w3-padding-16">
            <div class="w3-bar w3-border w3-round-large w3-red w3-hover-shadow" style="color:black;">
                <p><?= $pager->links('default', 'daw_template'); ?></p>
            </div>
        </div>
    </div>

    <?= $this->include('general/footer'); ?>
</body>

</html>