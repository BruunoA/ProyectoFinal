<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('albumsGestio.titolModify') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/albumModify.css') ?>">
</head>

<body class="w3-light-grey">
    <?= helper('form') ?>
    <form action="<?= base_url('gestio/galeria/modify/' . $album['id']) ?>" method="POST">
        <div class="w3-container w3-card w3-white w3-padding w3-margin w3-round-large" style="max-width: 700px; margin: auto;">
            <h2 class="w3-center"><?= lang('albumsGestio.titolModify') ?></h2>

            <p>
                <label for="titol" class="w3-text-black"><strong><?= lang('albumsGestio.modifyTitol') ?></strong></label>
                <input class="w3-input w3-border w3-round" type="text" id="titol" name="titol" value="<?= $album['titol'] ?>">
            <div class="error"><?= validation_show_error('titol') ?></div>
            </p>

            <p>
                <label for="portada" class="w3-text-black"><b><strong><?= lang('albumsGestio.modifyPortada') ?></strong></b></label>
                <input class="w3-input w3-border w3-round" type="text" id="portada" name="portada" value="<?= $album['portada'] ?>" readonly>
            <div class="error"><?= validation_show_error('portada') ?></div>
            <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()"><?= lang('albumsGestio.modifySelect') ?></button>
            </p>

            <p>
                <label for="club" class="w3-text-black"><strong><?= lang('albumsGestio.modifyClub') ?></strong></label>
                <select class="w3-select w3-border w3-round" name="club" id="club">
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id'] ?>" <?= $album['id_club'] == $club['id'] ? 'selected' : '' ?>><?= $club['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
            <div class="error"><?= validation_show_error('club') ?></div>
            </p>

            <p>
                <label for="estat"><strong><?= lang('albumsGestio.modifyEstat') ?></strong></label>
                <select class="w3-select w3-border" name="estat" id="estat">
                    <option value="1" <?= $album['estat'] === '1' ? 'selected' : '' ?>><?= lang('albumsGestio.publicat') ?></option>
                    <option value="0" <?= $album['estat'] === '0' ? 'selected' : '' ?>><?= lang('albumsGestio.no_publicat') ?></option>
                </select>
            <div class="error"><?= validation_show_error('estat') ?></div>
            </p>

            <p class="w3-center">
                <button type="submit" class="w3-button w3-green w3-round w3-margin-top"><?= lang('albumsGestio.modify') ?></button>
            </p>
        </div>
    </form>
</body>

</html>