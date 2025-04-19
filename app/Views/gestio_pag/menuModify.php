<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('gestioMenu.titol')?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">

    <form class="w3-card w3-padding w3-margin-top w3-light-grey" action="<?= base_url('/gestio/menu/modify/' . $menu['id']) ?>" method="POST">
        <h2 class="w3-center"><?= lang('gestioMenu.titol')?></h2>

        <div class="w3-section">
            <label for="nom"><?= lang('gestioMenu.nom')?></label>
            <input class="w3-input w3-border" type="text" name="nom" id="nom" value="<?= esc($menu['nom']) ?>" required>
        </div>

        <div class="w3-section">
            <label for="enllaç"><?= lang('gestioMenu.enllaç')?></label>
            <input class="w3-input w3-border" type="text" name="enllaç" id="enllaç" value="<?= esc($menu['enllaç']) ?>" required>
        </div>

        <div class="w3-section">
            <label for="id_pare"><?= lang('gestioMenu.id_pare')?></label>
            <input class="w3-input w3-border" type="number" name="id_pare" id="id_pare" value="<?= esc($menu['id_pare']) ?>">
        </div>

        <div class="w3-section">
            <label for="visibilitat"><?= lang('gestioMenu.visibilitat')?></label>
            <input class="w3-input w3-border" type="text" name="visibilitat" id="visibilitat" value="<?= esc($menu['visibilitat']) ?>" required>
        </div>

        <div class="w3-section">
            <label for="ordre"><?= lang('gestioMenu.ordre')?></label>
            <input class="w3-input w3-border" type="number" name="ordre" id="ordre" value="<?= esc($menu['ordre']) ?>" required>
        </div>

        <div class="w3-center">
            <button class="w3-button w3-blue w3-margin-top" type="submit">
                <?= lang('gestioMenu.modificar') ?>
            </button>
        </div>
    </form>

</body>
</html>
