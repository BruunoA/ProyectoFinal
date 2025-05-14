<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/staff.css'); ?>">
    <title><?= lang('sobreNosaltres.titolStaff') ?></title>
</head>

<body>
    <?= $this->include('general/menu'); ?>
    <div>
        <div class="cards-container w3-margin">
            <?php foreach ($staff as $persona): ?>
                <div class="news-card w3-round" style="border: 2px solid black; max-width: 300px; max-height: 600px;">
                    <div class="w3-center">
                        <img src="<?= esc($persona['img']); ?>" alt="<?= esc($persona['nom']); ?>" class="w3-image" style="width:300px; max-height:200px; object-fit:cover;">
                    </div>
                    <div class="w3-margin">
                        <h3><?= esc($persona['nom']) ?></h3>
                        <p class="content-preview"><strong><?= esc($persona['nom_carrec']) ?></strong></p>
                        <p><?= esc($persona['descripcio']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="paginador w3-center w3-black" style="color:black">
            <p><?= $pager->links('default', 'daw_template'); ?></p> <?php ?>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>
</body>

</html>