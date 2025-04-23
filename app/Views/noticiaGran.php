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

<div class="w3-container" style="margin-top: 2rem;">
    <div class="w3-container w3-teal" style="margin-bottom: 2rem">
        <h1><?= $noticia['nom'] ?></h1>
    </div>
    <div class="w3-card news-card" style="display:flex; flex-direction: column;">
        <img src="<?= base_url('assets/img/noticia.jpeg'); ?>" style="height: 50%px; width:50%">
        <div class="w3-container news-container">
            <p><?= $noticia['contingut'] ?></p>
        </div>
    </div>
</div>

<?= $this->include('general/footer'); ?>
</body>
</html>