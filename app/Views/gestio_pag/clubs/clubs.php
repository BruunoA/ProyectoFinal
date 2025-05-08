<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
    <title>Clubs</title>
</head>
<body>
    
    <?= $this->include('general/menuGestio'); ?>
    <?= session()->getFlashdata('success') ?>
    <div class="w3-container w3-margin-top">
        <h2>Gestió Clubs</h2>
        <a href="<?= base_url('gestio/clubs/add') ?>" class="w3-button w3-black w3-margin">Crear Club</a>
        <?php if (!empty($clubs)): ?>
            <table class="w3-table w3-bordered w3-striped">
                <thead class="w3-dark-grey">
                    <tr>
                        <th>Nom</th>
                        <th>Foto Club</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clubs as $club): ?>
                        <tr>
                            <td><?= esc($club['nom']) ?></td>
                            <td>
                                <a href="<?= base_url('gestio/galeria_fotos/' . $club['id']) ?>">
                                    <img src="<?= $club['foto_club'] ?>" alt="<?= esc($club['nom']) ?>" style="width:100px; height:auto;" class="w3-image w3-border">
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url('gestio/clubs/modify/' . $club['id']) ?>" class="w3-button w3-blue w3-small w3-margin-right">Modificar</a>
                                <a href="<?= base_url('gestio/clubs/delete/' . $club['id']) ?>" class="w3-button w3-red w3-small" onclick="return confirm('Vols eliminar aquest club?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hi ha clubs</p>
        <?php endif; ?>
    </div>
</body>
</html>
