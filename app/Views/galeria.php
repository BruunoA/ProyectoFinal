<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title>Document</title>
</head>
<style>
    .album-header {
        display: flex;
        align-items: center;
        background-color: #f5f5f5;
        padding: 10px 15px;
        border-radius: 5px 5px 0 0;
    }

    .photo-count {
        background-color: #009688;
        color: white;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 0.9em;
    }
</style>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container">
        <h1>Galería de Fotos</h1>

        <?php if (!empty($albums)): ?>
            <?php foreach ($albums as $albumId => $albumData): ?>
                <div class="w3-panel w3-border w3-round-large" style="margin-bottom: 20px;">
                    <h2>Titol album</h2>
                    <div class="w3-row-padding">
                        
                        <div class="w3-col m3 w3-margin-bottom">
                            <div class="w3-card w3-padding" style="height: 250px; overflow: hidden;">
                                <img src="<?= base_url('assets/img/camara.png'); ?>" style="width:100%">
                            </div><br>
                            <span class="photo-count"><?= $albumData['count'] ?> fotos</span>
                        </div>
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