<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('upload.Titol') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .drag-over {
            border: dashed 3px red !important;
        }

        #dropContainer {
            height: 150px;
            padding: 16px;
            transition: border 0.3s;
        }

        .error {
            color: red;
            font-size: 1em;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="w3-light-grey">
    <?php helper('form'); ?>
    <div class="w3-container w3-padding">
        <h2 class="w3-center"><?= lang('upload.Titol') ?></h2>

        <div id="dropContainer" class="w3-border w3-white w3-center"
            ondragover="dOver(event)" ondragenter="dEnter(event)"
            ondrop="dDrop(event)" ondragleave="dLeave(event)" style="font-size: 1.5em; padding: 1em;">
            <?= lang('upload.soltar') ?>
            <div class="error"><?= validation_show_error('userfile') ?></div>
        </div>

        <?= form_open_multipart(base_url('pujarArxiu'), ['class' => 'w3-container w3-card w3-white w3-margin-top']) ?>

        <input type="file" id="formFiles" name="userfile[]" style="display:none" />

        <p>
            <label for="titol">Titol de la imatge</label>
            <input class="w3-input w3-border" type="text" name="titol" id="titol">
        <div class="error"><?= validation_show_error('titol') ?></div>
        </p>

        <!-- <p>
            <label for="banner">Destacat banner</label>
            <select class="w3-select w3-border" name="banner" id="banner">
            <option value="no">No</option>
            <option value="si">Si</option>
            </select>
        </p> -->

        <p>
            <label for="descripcio">Descripcio de la imatge</label>
            <input class="w3-input w3-border" type="text" name="descripcio" id="descripcio">
        </p>

        <p>
            <label for="album" class="w3-text">Album:</label>
            <select name="album" id="album" class="w3-select w3-border">
                <option value="">Selecciona un album</option>
                <?php foreach ($albums as $album) : ?>
                    <option value="<?= esc($album['titol']) ?>"><?= esc($album['titol']) ?></option>
                <?php endforeach; ?>
            </select>
        <div class="error"><?= validation_show_error('album') ?></div>
        </p>

        <p class="w3-center">
            <input class="w3-button w3-green w3-round" type="submit" value=<?= lang('upload.submit') ?>>
        </p>

        </form>
    </div>

    <script>
        function dOver(evt) {
            evt.preventDefault();
            evt.target.classList.add('drag-over');
        }

        function dEnter(evt) {
            evt.preventDefault();
            evt.target.classList.add('drag-over');
            document.getElementById("dropContainer").textContent = 'Drop your files here';
        }

        function dLeave(e) {
            e.target.classList.remove('drag-over');
            document.getElementById("dropContainer").textContent = 'Drop Here';
        }

        function dDrop(evt) {
            evt.stopPropagation();
            evt.preventDefault();

            evt.target.classList.remove('drag-over');
            document.getElementById("dropContainer").textContent = '';

            var dt = evt.dataTransfer;
            var files = dt.files;

            var count = files.length;
            output("File Count: " + count + "\n");

            for (var i = 0; i < files.length; i++) {
                output(" File " + i + ":\n(" + (typeof files[i]) + ") : <" + files[i] + " > " +
                    files[i].name + " " + files[i].size + "\n");
            }

            var fileInput = document.getElementById('formFiles');
            fileInput.files = dt.files;
        }

        function output(text) {
            document.getElementById("dropContainer").textContent += text;
        }
    </script>
</body>

</html>