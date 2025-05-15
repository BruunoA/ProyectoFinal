<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/banner.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/css/elfinder.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/js/elfinder.min.js"></script>

    <!-- CKEditor -->
    <script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>
    <title><?= lang('gestioGeneral.modificarTitol') ?></title>
</head>

<body>
    <?php helper('form'); ?>
    <form action="<?= base_url('gestio/banner/modify/' . $banner['id']) ?>" method="POST">
        <div class="w3-container w3-card w3-white w3-padding w3-margin w3-round-large" style="max-width: 600px; margin: auto;">
            <h2 class="w3-center"><?= lang('gestioGeneral.modificarTitol') ?></h2>

            <p>
                <label for="titol" class="w3-text-grey"><?= lang('gestioGeneral.titol') ?></label>
                <input class="w3-input w3-border w3-round" type="text" id="titol" name="titol" value="<?= $banner['titol'] ?>">
            <div class="error"><?= validation_show_error('titol') ?></div>
            </p>

            <p>
                <label for="imatge" class="w3-text-black"><b><?= lang('gestioGeneral.imatge') ?></b></label>
                <input class="w3-input w3-border imatge" type="text" id="imatge" name="imatge" value="<?= $banner['img'] ?>" readonly>
            <div class="error"><?= validation_show_error('imatge') ?></div>
            <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()">Seleccionar imatge</button>
            </p>

            <p>
                <label for="tipus"><?= lang('gestioGeneral.tipus') ?></label>
                <select class="w3-select w3-border" name="tipus" id="tipus">
                    <option value="" disabled selected><?= lang('gestioGeneral.seleccionaTipus') ?></option>
                    <option value="banner" <?= $banner['tipus'] === 'banner' ? 'selected' : '' ?>><?= lang('gestioGeneral.banner') ?></option>
                    <option value="logo" <?= $banner['tipus'] === 'logo' ? 'selected' : '' ?>><?= lang('gestioGeneral.logo') ?></option>
                </select>
            <div class="error"><?= validation_show_error('tipus') ?></div>
            </p>

            <p>
                <label for="destacat"><?= lang('gestioGeneral.destacat') ?></label>
                <select class="w3-select w3-border" name="destacat" id="destacat">
                    <option value="" disabled selected><?= lang('gestioGeneral.seleccionaOpcio') ?></option>
                    <option value="0" <?= $banner['destacat'] === '0' ? 'selected' : '' ?>><?= lang('gestioGeneral.no_publicat') ?></option>
                    <option value="1" <?= $banner['destacat'] === '1' ? 'selected' : '' ?>><?= lang('gestioGeneral.publicat') ?></option>
                </select>
            <div class="error"><?= validation_show_error('destacat') ?></div>
            </p>


            <p class="w3-center">
                <button type="submit" class="w3-button w3-green w3-round w3-margin-top"><?= lang('gestioGeneral.modificar') ?></button>
            </p>
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
                    $('#imatge').val(file.url);
                }
            });
        }
    </script>
</body>

</html>