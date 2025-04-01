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

<div class="w3-container">
    <h1>Galería de Fotos</h1>
    
    <?php if(!empty($albums)): ?>
        <?php foreach ($albums as $albumId => $albumData): ?>
            <div class="w3-panel w3-border w3-round-large" style="margin-bottom: 20px;">
                <h2>Album <?= $albumId ?> - <?= $albumData['count'] ?> imatges</h2>
                
                <div class="w3-row-padding">
                    <?php foreach ($albumData['fotos'] as $foto): ?>
                        <div class="w3-col m3 w3-margin-bottom">
                            <div class="w3-card w3-padding" style="height: 250px; overflow: hidden;">
                                <h4><?= esc($foto['titol']) ?></h4>
                                <p><?= esc(substr($foto['descripcio'], 0, 50)) ?>...</p>
                                <small>ID: <?= $foto['id'] ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="w3-panel w3-yellow">
            <p>No hi ha fotos</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->include('general/footer'); ?>
</body>
</html>
