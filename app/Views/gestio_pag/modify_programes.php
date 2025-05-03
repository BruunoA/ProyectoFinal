<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Programa</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container w3-padding">
        <h2 class="w3-center w3-text-blue">Modificar Programa</h2>
    <div class="w3-margin-bottom">
        <a href="javascript:history.back()" class="w3-button w3-light-gray w3-round w3-hover-dark-gray">Volver Atrás</a>
    </div>
        <?php if (session()->getFlashdata('msg')): ?>
            <div class="w3-panel w3-<?= session()->getFlashdata('msg_type') ?> w3-display-container w3-animate-opacity">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-large w3-display-topright">&times;</span>
                <p><?= session()->getFlashdata('msg') ?></p>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('gestio/programes/modify/' . $categories['id']) ?>" enctype="multipart/form-data" class="w3-card w3-padding w3-round-large w3-light-grey">
            <?= csrf_field() ?>

            <!-- Campo oculto para método PUT si tu backend lo soporta -->
            <form method="post" action="<?= base_url('gestio/modify/programa/'.$categories['id']) ?>">

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-col m6">
                    <label class="w3-text-blue"><b>Títol</b></label>
                    <input class="w3-input w3-border w3-round" type="text" name="titol"
                        value="<?= old('titol', $categories['titol'] ?? '') ?>" required>
                </div>

                <div class="w3-col m6">
                    <label class="w3-text-blue"><b>Horari</b></label>
                    <input class="w3-input w3-border w3-round" type="text" name="horari"
                        value="<?= old('horari', $categories['horari'] ?? '') ?>" required>
                </div>
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Descripció</b></label>
                <textarea class="w3-input w3-border w3-round" name="descripcio" rows="5" required><?=
                                                                                            old('descripcio', $categories['descripcio'] ?? '')
                                                                                            ?></textarea>
            </div>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-col m6">
                    <label class="w3-text-blue"><b>ID Equip</b></label>
                    <input class="w3-input w3-border w3-round" type="number" name="id_equip"
                        value="<?= old('id_equip', $categories['id_equip'] ?? '') ?>" required>
                </div>

                <div class="w3-col m6">
                    <label class="w3-text-blue"><b>Imatge Actual</b></label>
                    <?php if (!empty($categories['img'])): ?>
                        <div class="w3-margin-top">
                            <img src="<?= base_url($categories['img']) ?>" class="w3-image w3-border w3-round" style="max-height: 100px;">
                        </div>
                        <label class="w3-text-blue w3-margin-top">
                            <input type="checkbox" name="remove_image" value="1"> Eliminar imatge actual
                        </label>
                    <?php else: ?>
                        <p class="w3-text-gray">No hi ha imatge pujada</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Nova Imatge (opcional)</b></label>
                <input class="w3-input w3-border w3-round" type="file" name="img">
                <p class="w3-small w3-text-gray">Formatos acceptats: JPG, PNG. Màxim 2MB.</p>
            </div>

            <div class="w3-center">
                <button type="submit" class="w3-button w3-blue w3-round w3-margin-right w3-hover-light-blue">Guardar Canvis</button>
                <a href="<?= base_url('gestio/programes') ?>" class="w3-button w3-gray w3-round w3-hover-dark-gray">Cancel·lar</a>
            </div>
        </form>
    </div>
</body>
</html>
