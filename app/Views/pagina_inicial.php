<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner y Escudos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/pagina_inicial.css'); ?>">
</head>

<body>
    <header class="w3-container w3-center w3-padding-32"
        style="background: linear-gradient(to right, #000, #d32f2f); color: white;">
        <h1 style="margin: 0;"><?= lang('home.titolClubs') ?></h1>
    </header>
    <?= session()->getFlashdata('error'); ?>
    <div class="w3-row-padding w3-center w3-margin-top">
        <?php
        foreach ($tags as $tag): ?>
            <div class="w3-third">
                <a href="<?= base_url('home?club=' . $tag['nom']); ?>" class="team-card">
                    <div class="w3-card w3-hover-shadow w3-round-large">
                        <img src="<?= $tag['foto_club'] ?>" alt="<?= $tag['nom']; ?>"
                            class="w3-image" style="width:50%; padding-top: 20px;">
                        <div class="w3-container w3-padding">
                            <h3><?= $tag['nom']; ?></h3>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
</body>

</html>