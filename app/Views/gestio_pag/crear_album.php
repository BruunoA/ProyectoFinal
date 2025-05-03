<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('albumsGestio.crearAlbum') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-light-grey">

    <div class="w3-container w3-card w3-white w3-padding w3-margin w3-round-large" style="max-width: 500px; margin: auto;">
        <h2 class="w3-center"><?= lang('albumsGestio.crearAlbum') ?></h2>

        <form action="<?= base_url('gestio/galeria/crearAlbum') ?>" method="POST" class="w3-container">

            <p>
                <label for="titol" class="w3-text-grey"><?= lang('albumsGestio.crearTitol') ?></label>
                <input class="w3-input w3-border w3-round" type="text" id="titol" name="titol" required>
            </p>

            <p>
                <label for="estat" class="w3-text-grey"><?= lang('albumsGestio.crearEstat') ?></label>
                <select class="w3-select w3-border w3-round" name="estat" id="estat" required>
                    <option value="" disabled selected><?= lang('albumsGestio.selecciona') ?></option>
                    <option value="publicat"><?= lang('albumsGestio.publicat') ?></option>
                    <option value="no_publicat"><?= lang('albumsGestio.noPublicat') ?></option>
                </select>
            </p>

            <p class="w3-center">
                <button type="submit" class="w3-button w3-green w3-round w3-margin-top"><?= lang('albumsGestio.crearAlbum') ?></button>
            </p>

        </form>
    </div>

</body>

</html>