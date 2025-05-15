<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/staffCreate.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/banner.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/css/elfinder.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/js/elfinder.min.js"></script>

    <!-- CKEditor -->
    <script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>
    <title><?= lang('staff.titolCreate') ?></title>
</head>

<body>
    <?= helper('form') ?>
    <form action="<?= base_url('gestio/staff/add') ?>" method="POST">
        <div class="w3-container w3-card w3-white w3-padding w3-margin w3-round-large" style="max-width: 500px; margin: auto;">
            <h2 class="w3-center"><?= lang('staff.subtitolCreate') ?></h2>

            <p>
                <label for="nom" class="w3-text-black"><strong><?= lang('staff.nom') ?></strong></label>
                <input class="w3-input w3-border w3-round" type="text" id="nom" name="nom" value="<?= old('nom') ?>">
            <div class="error"><?= validation_show_error('nom') ?></div>

            </p>


            <p>
                <label for="imatge" class="w3-text-black"><b><strong><?= lang('staff.imatge') ?></strong></b></label>
                <input class="w3-input w3-border imatge" type="text" id="imatge" name="imatge" value="<?= old('img') ?>" readonly>
            <div class="error"><?= validation_show_error('imatge') ?></div>
            <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()"><?= lang('staff.seleccionaimatge') ?></button>
            </p>

            <p>
                <label for="carrec"><strong><?= lang('staff.carrec') ?></strong></label>
                <select class="w3-select w3-border" name="carrec" id="carrec">
                    <option value="" disabled selected><?= lang('staff.seleccionaOpcio') ?></option>
                    <?php foreach ($carrecs as $carrec): ?>
                        <option value="<?= $carrec['id'] ?>" <?= old('carrec') == $carrec['id'] ? 'selected' : '' ?>><?= $carrec['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
                    <div class="error"><?= validation_show_error('carrec') ?></div>
            </p>

            <p>
                <label for="descripcio"><strong><?= lang('staff.descripcio') ?></strong></label>
                <textarea class="w3-input w3-border w3-round" id="descripcio" name="descripcio" rows="4"><?= old('descripcio') ?></textarea>
            <div class="error"><?= validation_show_error('descripcio') ?></div>
            </p>

            <p>
                <label for="estat"><strong><?= lang('staff.estat') ?></strong></label>
                <select class="w3-select w3-border" name="estat" id="estat">
                    <option value="" disabled selected><?= lang('staff.seleccionaOpcio') ?></option>
                    <option value="0" <?= old('estat') === 'no' ? 'selected' : '' ?>><?= lang('staff.no_publicat') ?></option>
                    <option value="1" <?= old('estat') === 'si' ? 'selected' : '' ?>><?= lang('staff.publicat') ?></option>
                </select>
            <div class="error"><?= validation_show_error('estat') ?></div>
            </p>

            <p class="w3-center">
                <button type="submit" class="w3-button w3-green w3-round w3-margin-top"><?= lang('staff.crear') ?></button>
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