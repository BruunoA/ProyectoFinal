<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('albumsGestio.crearAlbum') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/crearAlbum.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/css/elfinder.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/js/elfinder.min.js"></script>

</head>

<body class="w3-light-grey">
    <?php helper('form'); ?>
    <div class="w3-container w3-card w3-white w3-padding w3-margin w3-round-large" style="max-width: 500px; margin: auto;">
        <h2 class="w3-center"><?= lang('albumsGestio.crearAlbum') ?></h2>

        <form action="<?= base_url('gestio/galeria/crearAlbum') ?>" method="POST" class="w3-container">

            <p>
                <label for="titol" class="w3-text-black"><strong><?= lang('albumsGestio.crearTitol') ?></strong></label>
                <input class="w3-input w3-border w3-round" type="text" id="titol" name="titol" value="<?= old('titol') ?>">
            <div class="error"><?= validation_show_error('titol') ?></div>
            </p>

            <p>
                <label for="portada" class="w3-text-black"><b><strong><?= lang('albumsGestio.portada') ?></strong></b></label>
                <input class="w3-input w3-border" type="text" id="portada" name="portada" value="<?= old('portada') ?>" readonly>
            <div class="error"><?= validation_show_error('portada') ?></div>
            <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()">Seleccionar imatge</button>
            </p>

            <p>
                <label for="club"><strong><?= lang('albumsGestio.club') ?></strong></label>
                <select class="w3-select w3-border" name="club" id="club">
                    <option value="" disabled selected><strong><?= lang('albumsGestio.selecciona') ?></strong></option>
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id'] ?>" <?= old('club') == $club['id'] ? 'selected' : '' ?>><?= $club['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
            <div class="error"><?= validation_show_error('club') ?></div>
            </p>

            <p>
                <label for="estat" class="w3-text-black"><strong><?= lang('albumsGestio.crearEstat') ?></strong></label>
                <select class="w3-select w3-border w3-round" name="estat" id="estat">
                    <option value="" disabled selected><?= lang('albumsGestio.selecciona') ?></option>
                    <option value="publicat" <?= old('estat') == 'publicat' ? 'selected' : '' ?>><?= lang('albumsGestio.publicat') ?></option>
                    <option value="no_publicat" <?= old('estat') == 'no_publicat' ? 'selected' : '' ?>><?= lang('albumsGestio.no_publicat') ?></option>
                </select>
            <div class="error"><?= validation_show_error('estat') ?></div>
            </p>

            <p class="w3-center">
                <button type="submit" class="w3-button w3-green w3-round w3-margin-top"><?= lang('albumsGestio.crearAlbum') ?></button>
            </p>

        </form>
    </div>
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
                    $('#portada').val(file.url);
                }
            });
        }
    </script>
</body>

</html>