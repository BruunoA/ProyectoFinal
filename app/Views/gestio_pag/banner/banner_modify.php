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

    <!-- CKEditor -->
    <script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>
    <title>Modificar banner</title>
</head>

<body>
<?php if (session()->has('errors')) : ?>
    <div class="w3-container w3-red w3-round w3-margin">
        <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>
    <form action="<?= base_url('gestio/banner/modify/' . $banner['id']) ?>" method="POST">
        <div class="w3-container w3-card w3-white w3-padding w3-margin w3-round-large" style="max-width: 500px; margin: auto;">
            <h2 class="w3-center">Modificar Banner</h2>

            <p>
                <label for="titol" class="w3-text-grey">Títol</label>
                <input class="w3-input w3-border w3-round" type="text" id="titol" name="titol" value="<?= $banner['titol'] ?>">
            </p>

            <p>
                <label for="descripcio" class="w3-text-grey">Descripció</label>
                <input class="w3-input w3-border w3-round" type="text" id="descripcio" name="descripcio" value="<?= $banner['descripcio'] ?>">
            </p>

            <p>
                <label for="ruta" class="w3-text-black"><b>Imatge</b></label>
                <input class="w3-input w3-border ruta" type="text" id="ruta" name="ruta" value="<?= $banner['ruta'] ?>" readonly>
                <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()">Seleccionar imatge</button>
            </p>

            <p>
                <label for="banner">Destacat banner</label>
                <select class="w3-select w3-border" name="banner" id="banner">
                    <option value="no">No</option>
                    <option value="si">Si</option>
                </select>
            </p>

            <p class="w3-center">
                <button type="submit" class="w3-button w3-green w3-round w3-margin-top">Modificar</button>
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
                    $('#ruta').val(file.url);
                }
            });
        }
    </script>
</body>

</html>