<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Programa</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/css/elfinder.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/js/elfinder.min.js"></script>
</head>

<body>
    <div class="w3-container w3-padding">
        <h2 class="w3-center w3-text-blue">Modificar Programa</h2>
        <div class="w3-margin-bottom">
            <a href="<?= base_url('gestio/programes') ?>" class="w3-button w3-light-gray w3-round w3-hover-dark-gray">Tornar a programes</a>
        </div>

        <?php if (session()->has('errors')): ?>
            <div class="w3-panel w3-red w3-padding">
                <ul>
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form method="post" action="<?= base_url('gestio/modify/programa/' . $categories['id']) ?>" enctype="multipart/form-data" class="w3-card w3-padding w3-round-large w3-light-grey">
            <?= csrf_field() ?>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-col m6">
                    <label class="w3-text-blue"><b>Títol</b></label>
                    <input class="w3-input w3-border w3-round" type="text" name="titol" value="<?= old('titol', $categories['titol'] ?? '') ?>">
                </div>

                <div class="w3-col m6">
                    <label class="w3-text-blue"><b>Horari</b></label>
                    <input class="w3-input w3-border w3-round" type="text" name="horari" value="<?= old('horari', $categories['horari'] ?? '') ?>">
                </div>
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Descripció</b></label>
                <textarea class="w3-input w3-border w3-round" name="descripcio" rows="5" required><?= old('descripcio', $categories['descripcio'] ?? '') ?></textarea>
            </div>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-col m6">
                    <label class="w3-text-blue"><b>ID Equip</b></label>
                    <select class="w3-select w3-border w3-round" name="id_equip">
                        <option value="" disabled selected>Selecciona un equip</option>
                        <?php foreach ($equips as $equip): ?>
                            <option value="<?= $equip['id'] ?>" <?= ($equip['id'] == $categories['id_equip']) ? 'selected' : '' ?>><?= $equip['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="w3-col m6">
                    <label class="w3-text-blue"><b>Imatge Actual</b></label>
                    <?php if (!empty($categories['img'])): ?>
                        <div class="w3-margin-top">
                            <img src="<?= $categories['img'] ?>" class="w3-image w3-border w3-round" style="max-height: 100px;">
                        </div>
                    <?php else: ?>
                        <p class="w3-text-gray">No hi ha imatge pujada</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w3-margin-bottom">
                <label for="img" class="w3-text-blue"><b>Nova Imatge (opcional)</b></label>
                <input type="text" class="w3-input w3-border w3-round" type="file" name="img" readonly id="img" value="<?= old($categories['img']) ?>">
                <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()">Seleccionar imatge</button>
            </div>

            <div class="w3-center">
                <button type="submit" class="w3-button w3-blue w3-round w3-margin-right w3-hover-light-blue">Guardar Canvis</button>
                <a href="<?= base_url('gestio/programes') ?>" class="w3-button w3-gray w3-round w3-hover-dark-gray">Cancel·lar</a>
            </div>
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
                    $('#img').val(file.url);
                }
            });
        }
    </script>
</body>

</html>