<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar album</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-grey">
<?php if (session()->has('errors')) : ?>
    <div class="w3-container w3-red w3-round w3-margin">
        <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>
    <form action="<?= base_url('gestio/galeria/modify/' . $album['id']) ?>" method="POST">
        <div class="w3-container w3-card w3-white w3-padding w3-margin w3-round-large" style="max-width: 500px; margin: auto;">
            <h2 class="w3-center">Modificar Album</h2>

            <p>
                <label for="titol" class="w3-text-grey">Títol</label>
                <input class="w3-input w3-border w3-round" type="text" id="titol" name="titol" value="<?= $album['titol'] ?>">
            </p>

            <p>
                <label for="portada" class="w3-text-grey"><b>Portada</b></label>
                <input class="w3-input w3-border w3-round" type="text" id="portada" name="portada" value="<?= $album['portada'] ?>" readonly>
                <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()">Seleccionar imatge</button>
            </p>

            <p>
                <label for="club" class="w3-text-grey">Selecciona club</label>
                <select class="w3-select w3-border w3-round" name="club" id="club">
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id'] ?>" <?= $album['id_club'] == $club['id'] ? 'selected' : '' ?>><?= $club['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <label for="estat">Estat de album</label>
                <select class="w3-select w3-border" name="estat" id="estat">
                    <option value="publicat" <?= $album['estat'] == 'publicat' ? 'selected' : '' ?>>Publicat</option>
                    <option value="no_publicat" <?= $album['estat'] == 'no_publicat' ? 'selected' : '' ?>>No publicat</option>
                </select>
            </p>

            <p class="w3-center">
                <button type="submit" class="w3-button w3-green w3-round w3-margin-top">Modificar</button>
            </p>
        </div>
    </form>
</body>
</html>
