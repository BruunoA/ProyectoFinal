<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Gestió</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/gestio.css'); ?>"> -->
</head>
<style>
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
<?= $this->include('general/menu'); ?>

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
                                <p>Resum: <strong></strong> <?= esc($item['resum']) ?></p>
                                <p>Contingut: <strong></strong> <?= ($item['contingut']) ?></p>
                                <p>Seccio: <strong></strong> <?= esc($item['seccio']) ?></p>
                            </div>
                            <div>
                                <?php 
                                    // echo "<a href='" . base_url('/create/add/' . $item['id']) . "'>Mostrar</a> ";
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
    <?php // $this->include('general/footer'); ?>
</body>
</html>
