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
        <div class="staff-container">
            <?php foreach ($carrecs as $carrec => $persones): ?>
                <h2 class="w3-padding"><?= esc($carrec) ?></h2>
                <div class="cards-container w3-row-padding">
                    <?php foreach ($persones as $persona): ?>
                        <div class="news-card w3-round w3-col m4 l3" style="border: 2px solid black; max-height: 400px; margin-bottom: 20px;">
                            <div class="w3-center">
                                <img src="<?= esc($persona['img']); ?>" alt="<?= esc($persona['nom']); ?>"
                                    class="w3-image" style="width:100%; max-height:200px; object-fit:cover;">
                            </div>
                            <div class="card-content w3-padding">
                                <h3><?= esc($persona['nom']) ?></h3>
                                <p class="content-preview">
                                    <strong><?= esc($persona['nom_carrec']) ?></strong>
                                </p>
                                <p>
                                    <?= esc(strlen($persona['descripcio']) > 90 ? substr($persona['descripcio'], 0, 90) . '...' : $persona['descripcio']) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- 
        <div class="paginador w3-center w3-black" style="color:black">
            <p><?php // $pager->links('default', 'daw_template'); 
                ?></p> <?php ?>
        </div> -->
    </div>
    <?= $this->include('general/footer'); ?>
</body>

</html>