<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title>Document</title>
</head>
<body>
<?= $this->include('general/menu'); ?>

<div class="w3-container" style="margin-top: 2rem; margin-bottom: 2rem;">
    <div class="w3-container w3-teal">
        <h1 style="text-align: center;">Galeria</h1>
    </div>

    <div class="w3-row-padding w3-margin-top">
        <?php for ($i = 0; $i < 6; $i++): ?>
            <div class="w3-third">
                <div class="w3-card">
                    <img src="<?= base_url('assets/img/camara.png'); ?>" style="width:100%">
                    <div class="w3-container">
                        <h5>20 imatges / 5 vídeos</h5>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>

<?= $this->include('general/footer'); ?>
</body>
</html>
