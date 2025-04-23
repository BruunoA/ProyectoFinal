<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-container">

    <form class="w3-card w3-padding w3-margin-top w3-light-grey" action="<?= base_url('config/menu/add') ?>" method="POST">
        <h2 class="w3-center"><?= lang('gestioMenu.afegir') ?></h2>

        <div class="w3-section">
            <label for="nom"><?= lang('gestioMenu.nom') ?></label>
            <input class="w3-input w3-border" type="text" name="nom" id="nom" required>
        </div>

        <div class="w3-section">
            <label for="valor"><?= lang('gestioMenu.valor') ?></label>
            <input class="w3-input w3-border" type="text" name="valor" id="valor" required>
        </div>

        <div class="w3-section">
            <label for="tipus"><?= lang('gestioMenu.tipus') ?></label>
            <select class="w3-select w3-border" name="tipus" id="tipus" required>
                <option value=""><?= lang('gestioMenu.selecciona') ?></option>
                <option value="menu_general"><?= lang('gestioMenu.general') ?></option>
                <option value="menu_gestio"><?= lang('gestioMenu.gestio') ?></option>
            </select>

            <div class="w3-section">
                <label for="id_pare"><?= lang('gestioMenu.id_pare') ?></label>
                <input class="w3-input w3-border" type="number" name="id_pare" id="id_pare">
            </div>

            <div class="w3-section">
                <label for="visibilitat"><?= lang('gestioMenu.visibilitat') ?></label>
                <select class="w3-select w3-border" name="visibilitat" id="visibilitat" required>
                    <option value=""><?= lang('gestioMenu.selecciona') ?></option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="w3-section">
                <label for="ordre"><?= lang('gestioMenu.ordre') ?></label>
                <input class="w3-input w3-border" type="number" name="ordre" id="ordre" required>
            </div>

            <div class="w3-center">
                <button class="w3-button w3-green w3-margin-top" type="submit">
                    <?= lang('gestioMenu.guardar') ?>
                </button>
            </div>
    </form>

</body>

</html>