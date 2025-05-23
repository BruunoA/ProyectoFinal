<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Gestió</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/partPrivada.css'); ?>">
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
        <a href="<?= base_url('wysiwyg'); ?>" class="w3-button w3-black w3-margin w3-right">WYSIWYG</a>
        <a href="<?= base_url('create/add/event'); ?>" class="w3-button w3-black w3-margin w3-right">Crear event</a>

        <h1 class="w3-center">Llista de gestio</h1>

        <div class="w3-center w3-margin-bottom">
            <button onclick="mostrarTots()" class="w3-button w3-blue">Mostrar Tot</button>
        </div>

        <?php if (!empty($gestio)): ?>
            <div class="w3-row-padding" style="margin-left: 14rem;">
                <?php foreach ($gestio as $item): ?>
                    <div class="w3-col m6 s12 w3-padding gestio-item" data-seccio="<?= esc($item['seccio']) ?>">
                        <div class="w3-card w3-white w3-round w3-padding">
                            <header class="w3-container w3-blue">
                                <h3><?= esc($item['nom']) ?></h3>
                            </header>
                            <div class="w3-container">
                                <p>Resum: <strong></strong> <?= $item['resum'] ?></p>
                                <!-- <p>Contingut: <strong></strong> <?= $item['contingut'] ?></p> -->
                                <p>Seccio: <strong></strong> <?= $item['seccio'] ?></p>
                            </div>
                            <div class="w3-container w3-center">
                                <a href="<?= base_url('/gestio/modify/' . $item['id']) ?>">Editar</a>
                                <a href="<?= base_url('/gestio/delete/' . $item['id']) ?>">Esborrar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php foreach ($events as $event): ?>
                    <div class="w3-col m6 s12 w3-padding gestio-item" data-seccio="<?= esc($event['seccio']) ?>">
                        <div class="w3-card w3-white w3-round w3-padding">
                            <header class="w3-container w3-blue">
                                <h3><?= esc($event['nom']) ?></h3>
                            </header>
                            <div class="w3-container">
                                <p>Resum: <strong></strong> <?= $event['data'] ?></p>
                                <!-- <p>Contingut: <strong></strong> <?= $event['tipus_event'] ?></p> -->
                            </div>
                            <div class="w3-container w3-center">
                                <a href="<?= base_url('/gestio/modify/' . $event['id']) ?>">Editar</a>
                                <a href="<?= base_url('/gestio/delete/' . $event['id']) ?>">Esborrar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="w3-panel w3-yellow w3-padding">No hi ha contingut</p>
        <?php endif; ?>
    </div>

    <script>
        function mostrarTots() {
            document.querySelectorAll(".gestio-item").forEach(item => {
                item.style.display = "block";
            });
        }
    </script>
</body>

</html>