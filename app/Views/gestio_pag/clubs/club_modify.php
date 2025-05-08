<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/css/elfinder.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/js/elfinder.min.js"></script>
    <title>Afegir club</title>
</head>
<body>
<?php if (session()->has('errors')): ?>
        <div class="w3-panel w3-red w3-padding">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
    <form action="<?= base_url('gestio/clubs/modify/' . $club['id'])?>" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
        <?= csrf_field() ?>

        <h2 class="w3-center">Afegir Club</h2>
        <div class="w3-section">
            <label for="nom" class="w3-text-blue"><b>Nom del club:</b></label>
            <input class="w3-input w3-border" type="text" id="nom" name="nom" value="<?= old('nom', $club['nom'] ?? '') ?>">
        </div>
        <div class="w3-section">
            <label for="foto" class="w3-text-blue"><b>Foto del club:</b></label>
            <input class="w3-input w3-border" type="text" id="foto" name="foto" value="<?= old('foto', $club['foto_club'] ?? '')?>" readonly>
            <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()">Seleccionar imatge</button>
        </div>
        <div class="w3-section">
            <input type="submit" value="Afegir Club" class="w3-button w3-blue w3-block">
        </div>
    </form>

    <script>
        function openFileManager() {
            $('<div/>').dialogelfinder({
                url: '<?= base_url("fileconnector") ?>',
                width: '80%',
                height: '80%',
                commandsOptions: {
                    getfile: {
                        oncomplete: 'close',
                        multiple: false
                    }
                },
                getFileCallback: function(file) {
                    console.log(file);
                    $('#foto').val(file.url);
                }
            });
        }
    </script>
</body>
</html>