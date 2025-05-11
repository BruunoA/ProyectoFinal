<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/noticies.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title><?= $noticia['nom'] ?></title>
</head>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container" style="margin-top: 2rem; max-width: 800px; margin: auto;">
        <div class="w3-container w3-blue" style="margin-bottom: 2rem">
            <h1 class="w3-text-white w3-center"><?= $noticia['nom'] ?></h1>
        </div>
        <div class="w3-card" style="display:flex; flex-direction: column; align-items:center">
            <img src="<?= $noticia['portada'] ?>" alt="Noticia portada" class="img-fluid rounded" style="object-fit: cover;">
            <div class="w3-container news-container">
                <p><strong><?= lang('noticies.dataCreacio') . date('d/m/Y', strtotime($noticia['created_at'])) ?></strong></p>
                <p><?= $noticia['contingut'] ?></p>
            </div>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>
</body>

</html>