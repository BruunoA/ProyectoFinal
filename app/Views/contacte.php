<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contacte.css'); ?>">
    <title><?= lang('contacte.Titol') ?></title>
</head>

<body>
    <?= $this->include('general/menu'); ?>
    <?php helper('form'); ?>
    <div class="w3-container w3-padding">
        <?= session()->getFlashdata('success') ?>
    </div>

    <div class="w3-row content">
        <div class="w3-half w3-padding">
            <div class="w3-container w3-blue" style="margin-bottom: 2rem">
                <h1 class="w3-center w3-text-white"><?= lang('contacte.Titol') ?></h1>
            </div>
            <form class="w3-container w3-card w3-padding w3-white" action="<?= base_url('contacte/send') ?>" method="post">
                <div class="w3-section">
                    <label><?= lang('contacte.Camp_nom') ?></label>
                    <input class="w3-input w3-border" name="nom" type="text" value="<?= old('nom') ?>">
                    <div class="error"><?= validation_show_error('nom') ?></div>
                </div>
                <div class="w3-section">
                    <label><?= lang('contacte.Camp_correu') ?></label>
                    <input class="w3-input w3-border" name="from_email" type="email" value="<?= old('from_email') ?>">
                    <div class="error"><?= validation_show_error('from_email') ?></div>
                </div>
                <div class="w3-section">
                    <label><?= lang('contacte.Camp_telefon') ?></label>
                    <input class="w3-input w3-border" name="telefon" type="number" value="<?= old('telefon') ?>">
                    <div class="error"><?= validation_show_error('telefon') ?></div>
                </div>
                <div class="w3-section">
                    <label><?= lang('contacte.Camp_assumpte') ?></label>
                    <select class="w3-select w3-border" name="assumpte">
                        <option value="" disabled selected><?= lang('contacte.Selecciona_assumpte') ?></option>
                        <?php foreach ($assumptes as $assumpte): ?>
                            <option value="<?= $assumpte['id'] ?>" <?= old('assumpte') == $assumpte['id'] ? 'selected' : '' ?>><?= $assumpte['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="error"><?= validation_show_error('assumpte') ?></div>
                </div>
                <div class="w3-section">
                    <label><?= lang('contacte.Camp_motiu') ?></label>
                    <textarea class="w3-input w3-border" name="text" rows="4" placeholder="<?= lang('contacte.Placeholder') ?>" maxlength="400"></textarea>
                    <span id="numero">0</span>/400
                    <div class="error"> <?= validation_show_error('text') ?></div>
                </div>
                <button type="submit" class="w3-btn w3-green"><?= lang('contacte.Boto_enviar') ?></button>
            </form>
        </div>

        <div class="w3-half w3-padding">
            <div class="w3-container w3-blue" style="margin-bottom: 2rem">
                <h1 class="w3-center w3-text-white"><?= lang('contacte.TitolContacte') ?></h1>
            </div>
            <div class="w3-card w3-white w3-padding w3-margin-bottom">
                <?php foreach ($dades as $dada): ?>
                    <p><strong><?= esc($dada['nom']) ?>: </strong><?= esc($dada['valor']) ?></p>
                <?php endforeach; ?>
            </div>
            <div class="mapa">
                <iframe src="<?= esc($urlMapa) ?>"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.querySelector('textarea[name="text"]');
            const numero = document.getElementById('numero');

            textarea.addEventListener('input', function() {
                const length = this.value.length;
                numero.textContent = length;
            });
        });
    </script>
</body>

</html>