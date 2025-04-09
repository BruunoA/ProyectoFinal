<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/galeria.css'); ?>">
    <title><?= esc($album['titol']) ?> - Galería</title>
</head>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container">
        
        <h1><?= esc($album['titol']) ?></h1>
        <p class="w3-opacity"><?= count($album['fotos']) ?> fotos</p>

        <div class="photo-grid">
            <?php foreach ($album['fotos'] as $foto): ?>
                <div class="photo-item">
                    <img src="<?= base_url($foto['ruta']) ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="imageModal" class="w3-modal" onclick="this.style.display='none'">
        <span class="w3-button w3-display-topright w3-large w3-text-white">&times;</span>
        <div class="w3-modal-content w3-animate-zoom">
            <img id="modalImage" style="width:100%">
            <div id="modalCaption" class="w3-container w3-center w3-padding"></div>
        </div>
    </div>

    <?= $this->include('general/footer'); ?>
</body>
</html>