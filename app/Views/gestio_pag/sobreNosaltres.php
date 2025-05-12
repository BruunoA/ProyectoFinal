<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosaltres</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
</head>
<style>
    .w3-row-padding {
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
    }

    .w3-card {
        display: flex;
        flex-direction: column;
        /* height: 100%; */
    }

    .w3-card .w3-container.w3-center {
        margin-top: auto;
    }

    .w3-card div a {
        display: inline-block;
        margin: 5px 0;
        padding: 8px 12px;
        background: #007BFF;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: 0.3s;
    }

    .w3-card div a:hover {
        background: #0056b3;
    }
</style>

<body class="w3-light-grey">
    <?= $this->include('general/menuGestio'); ?>
    <a href="<?= base_url('wysiwyg') ?>" class="w3-button w3-blue w3-margin"><?= lang("noticies.afegir") ?></a>
    <div class="w3-container  w3-margin">
        <?= session()->getFlashdata('success'); ?>
        <h1 class="w3-center"><?= lang("sobreNosaltres.Titol") ?></h1>

        <?php if (!empty($historia)): ?>
            <h2 class="w3-center"><?= lang("sobreNosaltres.Historia") ?></h2>
            <?php foreach ($historia as $item): ?>
                <div class="w3-card w3-white w3-round w3-margin w3-padding">
                    <h3><strong>Nom:</strong><?= esc($item['nom']) ?></h3>
                    <p><strong>Resum:</strong> <?= esc($item['resum']) ?></p>
                    <p><strong>Estat:</strong> <?= esc($item['estat']) ?></p>
                    <div class="w3-container w3-center">
                        <a href="<?= base_url('/gestio/modify/' . $item['id']) ?>" class="w3-button w3-blue">Editar</a>
                        <a href="<?= base_url('/gestio/delete/' . $item['id']) ?>" class="w3-button w3-red" onclick="return confirm('Estàs segur que vols eliminar aquest element?')">Esborrar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="w3-panel w3-yellow w3-padding"><?= lang("sobreNosaltres.mssgHistoria") ?></p>
        <?php endif; ?>

        <?php if (!empty($missio)): ?>
            <h2 class="w3-center"><?= lang("sobreNosaltres.Missio") ?></h2>
            <?php foreach ($missio as $item): ?>
                <div class="w3-card w3-white w3-round w3-margin w3-padding">
                    <h3><strong>Nom:</strong><?= esc($item['nom']) ?></h3>
                    <p><strong>Resum:</strong> <?= esc($item['resum']) ?></p>
                    <p><strong>Estat:</strong> <?= $item['estat'] === "1" ? 'Publicat' : 'No publicat' ?></p>
                    <div class="w3-container w3-center">
                        <a href="<?= base_url('/gestio/modify/' . $item['id']) ?>" class="w3-button w3-blue">Editar</a>
                        <a href="<?= base_url('/gestio/delete/' . $item['id']) ?>" class="w3-button w3-red" onclick="return confirm('Estàs segur que vols eliminar aquest element?')">Esborrar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="w3-panel w3-yellow w3-padding"><?= lang("sobreNosaltres.mssgMissio") ?></p>
        <?php endif; ?>

        <?php if (!empty($visio)): ?>
            <h2 class="w3-center"><?= lang("sobreNosaltres.Visio") ?></h2>
            <?php foreach ($visio as $item): ?>
                <div class="w3-card w3-white w3-round w3-margin w3-padding">
                    <h3><strong>Nom:</strong><?= esc($item['nom']) ?></h3>
                    <p><strong>Resum:</strong> <?= esc($item['resum']) ?></p>
                    <p><strong>Estat:</strong> <?= esc($item['estat']) ?></p>
                    <div class="w3-container w3-center">
                        <a href="<?= base_url('/gestio/modify/' . $item['id']) ?>" class="w3-button w3-blue">Editar</a>
                        <a href="<?= base_url('/gestio/delete/' . $item['id']) ?>" class="w3-button w3-red" onclick="return confirm('Estàs segur que vols eliminar aquest element?')">Esborrar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="w3-panel w3-yellow w3-padding"><?= lang("sobreNosaltres.mssgVisio") ?></p>
        <?php endif; ?>

        <?php if (!empty($valors)): ?>
            <h2 class="w3-center"><?= lang("sobreNosaltres.Valors") ?></h2>
            <?php foreach ($valors as $valor): ?>
                <div class="w3-card w3-white w3-round w3-margin w3-padding">
                    <h3><strong>Nom:</strong><?= esc($item['nom']) ?></h3>
                    <p><strong>Resum:</strong> <?= esc($item['resum']) ?></p>
                    <p><strong>Estat:</strong> <?= esc($item['estat']) ?></p>
                    <div class="w3-container w3-center">
                        <a href="<?= base_url('/gestio/modify/' . $valor['id']) ?>" class="w3-button w3-blue">Editar</a>
                        <a href="<?= base_url('/gestio/delete/' . $valor['id']) ?>" class="w3-button w3-red" onclick="return confirm('Estàs segur que vols eliminar aquest element?')">Esborrar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="w3-panel w3-yellow w3-padding"><?= lang("sobreNosaltres.mssgValors") ?></p>
        <?php endif; ?>
    </div>
</body>

</html>