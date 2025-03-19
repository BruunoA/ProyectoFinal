<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Gestió</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-grey">

    <div class="w3-container">
        <h1 class="w3-center">Llista de gestio</h1>

        <?php if (!empty($gestio)): ?>
            <div class="w3-row-padding">
                <?php foreach ($gestio as $item): ?>
                    <div class="w3-col l4 m6 s12 w3-padding">
                        <div class="w3-card w3-white w3-round w3-padding">
                            <header class="w3-container w3-blue">
                                <h3><?= esc($item['nom']) ?></h3>
                            </header>
                            <div class="w3-container">
                                <p><strong></strong> <?= esc($item['resum']) ?></p>
                                <p><strong></strong> <?= ($item['contingut']) ?></p>
                                <p><strong></strong> <?= esc($item['seccio']) ?></p>
                            </div>
                            <div>
                                <?php 
                                    echo "<a href='" . base_url('/create/add/' . $item['id']) . "'>Mostrar</a> ";
                                    echo "<a href='" . base_url('/gestio/modify/' . $item['id']) . "'>Editar</a> ";
                                    echo "<a href='" . base_url('/gestio/delete/' . $item['id']) . "'>Esborrar</a> ";
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="w3-panel w3-yellow w3-padding">No hi ha contingut</p>
        <?php endif; ?>

    </div>

</body>
</html>
