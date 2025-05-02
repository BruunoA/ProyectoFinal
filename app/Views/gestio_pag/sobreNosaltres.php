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
        height: 100%;
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

<div class="w3-container">
    <h1 class="w3-center"><?= lang("sobreNosaltres.Titol") ?></h1>

    <?php if (!empty($historia)): ?>
        <h2 class="w3-center"><?= lang("sobreNosaltres.Historia") ?></h2>
            <div class="w3-card w3-white w3-round w3-margin w3-padding">
                <h3><?= esc($historia['nom']) ?></h3>
                <p><?= esc($historia['resum']) ?></p>
                <div class="w3-container w3-center">
                    <a href="<?= base_url('/gestio/modify/' . $historia['id']) ?>" class="w3-button w3-blue">Editar</a>
                    <a href="<?= base_url('/gestio/delete/' . $historia['id']) ?>" class="w3-button w3-red" onclick="return confirm('Estàs segur que vols eliminar aquest element?')">Esborrar</a>
                </div>
            </div>
    <?php else: ?>
        <p class="w3-panel w3-yellow w3-padding"><?= lang("sobreNosaltres.mssgHistoria") ?></p>
    <?php endif; ?>

    <?php if (!empty($missio)): ?>
        <h2 class="w3-center"><?= lang("sobreNosaltres.Missio") ?></h2>
            <div class="w3-card w3-white w3-round w3-margin w3-padding">
                <h3><?= esc($missio['nom']) ?></h3>
                <p><?= esc($missio['contingut']) ?></p>
                <div class="w3-container w3-center">
                    <a href="<?= base_url('/gestio/modify/' . $missio['id']) ?>" class="w3-button w3-blue">Editar</a>
                    <a href="<?= base_url('/gestio/delete/' . $missio['id']) ?>" class="w3-button w3-red" onclick="return confirm('Estàs segur que vols eliminar aquest element?')">Esborrar</a>
                </div>
            </div>
    <?php else: ?>
        <p class="w3-panel w3-yellow w3-padding"><?= lang("sobreNosaltres.mssgMissio") ?></p>
    <?php endif; ?>

    <?php if (!empty($visio)): ?>
        <h2 class="w3-center"><?= lang("sobreNosaltres.Visio") ?></h2>
            <div class="w3-card w3-white w3-round w3-margin w3-padding">
                <h3><?= esc($visio['nom']) ?></h3>
                <p><?= esc($visio['contingut']) ?></p>
                <div class="w3-container w3-center">
                    <a href="<?= base_url('/gestio/modify/' . $visio['id']) ?>" class="w3-button w3-blue">Editar</a>
                    <a href="<?= base_url('/gestio/delete/' . $visio['id']) ?>" class="w3-button w3-red" onclick="return confirm('Estàs segur que vols eliminar aquest element?')">Esborrar</a>
                </div>
            </div>
    <?php else: ?>
        <p class="w3-panel w3-yellow w3-padding"><?= lang("sobreNosaltres.mssgVisio") ?></p>
    <?php endif; ?>

    <?php if (!empty($valors)): ?>
        <h2 class="w3-center"><?= lang("sobreNosaltres.Valors") ?></h2>
            <div class="w3-card w3-white w3-round w3-margin w3-padding">
                <h3><?= esc($valors['nom']) ?></h3>
                <p><?= esc($valors['contingut']) ?></p>
                <div class="w3-container w3-center">
                    <a href="<?= base_url('/gestio/modify/' . $valors['id']) ?>" class="w3-button w3-blue">Editar</a>
                    <a href="<?= base_url('/gestio/delete/' . $valors['id']) ?>" class="w3-button w3-red" onclick="return confirm('Estàs segur que vols eliminar aquest element?')">Esborrar</a>
                </div>
            </div>
    <?php else: ?>
        <p class="w3-panel w3-yellow w3-padding"><?= lang("sobreNosaltres.mssgValors") ?></p>
    <?php endif; ?>
</div>
</body>
</html>