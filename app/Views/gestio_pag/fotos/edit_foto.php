<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('albumsGestio.titolEditFoto') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/editFoto.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="w3-light-grey">
    <?= helper('form') ?>
    <div class="w3-margin-top form-container">
        <header class="w3-blue w3-padding w3-card-custom">
            <h1 class="w3-center"><i class="fa fa-image"></i><?= lang('albumsGestio.titolEditFoto') ?></h1>
        </header>

        <?php if (isset($success)): ?>
            <div class="w3-panel w3-green w3-display-container w3-card-custom">
                <?= $success ?>
            </div>
        <?php endif; ?>

        <div class="w3-card-4 w3-margin-top w3-white w3-card-custom">
            <div class="w3-row">
                <div class="w3-half w3-padding">
                    <img class="w3-image w3-border w3-round"
                        src="<?= $foto['ruta'] ?>"
                        alt="<?= esc($foto['titol']) ?>">
                    <div class="w3-margin-top">
                        <p class="w3-small w3-text-black">
                            <strong><?= lang('albumsGestio.dataPujada') ?></strong> <?= date('d/m/Y H:i', strtotime($foto['created_at'])) ?>
                        </p>
                    </div>
                </div>

                <div class="w3-half w3-padding">
                    <form action="<?= base_url('gestio/galeria/edit_foto/' . $foto['id']) ?>" method="post">
                        <div class="w3-margin-bottom">
                            <label class="w3-text-black"><strong><?= lang('albumsGestio.editarTitol') ?></strong></label>
                            <input class="w3-input w3-border w3-round <?= isset($errors['titol']) ? 'w3-border-red' : '' ?>"
                                type="text" name="titol" value="<?=  esc($foto['titol']) ?>">
                            <div class="error"><?= validation_show_error('titol') ?></div>
                        </div>

                        <div class="w3-margin-bottom">
                            <label class="w3-text-black"><strong><?= lang('albumsGestio.editarDescripcio') ?></strong></label>
                            <textarea class="w3-input w3-border w3-round <?= isset($errors['descripcio']) ? 'w3-border-red' : '' ?>"
                                name="descripcio" rows="4"><?=  esc($foto['descripcio']) ?></textarea>
                        </div>
                        <div class="w3-margin-top w3-bar">
                            <button type="submit" class="w3-button w3-black w3-round w3-button-custom w3-bar-item">
                                <i class="fa fa-save"></i> <?= lang('albumsGestio.guardar') ?>
                            </button>
                            <span class="w3-bar-item" style="width: 10px;"></span>
                            <a href="<?= base_url('gestio/galeria_fotos/' . $foto['id_album']) ?>" class="w3-button w3-grey w3-round w3-button-custom w3-bar-item">
                                <i class="fa fa-arrow-left"></i> <?= lang('albumsGestio.tornar') ?>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>