<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/sobreNosaltres.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title><?= lang('sobreNosaltres.Titol') ?></title>
</head>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container" style="margin-top: 2rem;">
        <div class="w3-container w3-blue" style="margin-bottom: 2rem">
            <h1 class="w3-center w3-text-white"><?= lang('sobreNosaltres.TitolHistoria') ?></h1>
        </div>
        <h2 class="w3-center"><strong></strong></h2>
        <div class="historia-container">
            <img src="assets/img/campoAlpicat.jpg" alt="Campo Alpicat" class="historia-img" style="width: 50%;">
            <div id="historia" class="w3-container w3-border">
                <?php if (!empty($historia)): ?>
                    <h3 class="w3-center"><?= esc($historia['nom']) ?></h3>
                    <p><?= $historia['contingut'] ?></p>
                <?php else: ?>
                    <p><?= lang('errors.historia') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="w3-container" style="margin-top: 2rem;">
        <div class="w3-container w3-blue" style="margin-bottom: 2rem">
            <h1 class="w3-center w3-text-white"><?= lang('sobreNosaltres.TitolPresentacio') ?></h1>
        </div>
        <div class="historia-container">
            <div id="historia" class="w3-container w3-border">
                <?php if (!empty($presentacio)): ?>
                    <h3 class="w3-center"><?= esc($historia['nom']) ?></h3>
                    <p><?= $presentacio['contingut'] ?></p>
                <?php else: ?>
                    <p><?= lang('errors.presentacio') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="w3-container" style="margin-top: 2rem; margin-bottom: 2rem;">
        <div class="w3-container">
            <div class="w3-container w3-blue" style="margin-bottom: 2rem">
                <h1 class="w3-center w3-text-white"><?= lang('sobreNosaltres.Subtitol') ?></h1>
            </div>
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button tablink w3-red"
                    onclick="openCity(event,'Missio')"><?= lang('sobreNosaltres.TitolMissio') ?></button>
                <button class="w3-bar-item w3-button tablink"
                    onclick="openCity(event,'Visio')"><?= lang('sobreNosaltres.TitolVissio') ?></button>
                <button class="w3-bar-item w3-button tablink"
                    onclick="openCity(event,'Valors')"><?= lang('sobreNosaltres.TitolValors') ?></button>
            </div>

            <div id="Missio" class="w3-container w3-border city">
                <?php if (!empty($missio)): ?>
                    <p><?= $missio['contingut'] ?></p>
                <?php else: ?>
                    <p><?= lang('errors.missio') ?></p>
                <?php endif; ?>
            </div>

            <div id="Visio" class="w3-container w3-border city" style="display:none">
                <?php if (!empty($visio)): ?>
                    <p><?= $visio['contingut'] ?></p>
                <?php else: ?>
                    <p><?= lang('errors.visio') ?></p>
                <?php endif; ?>
            </div>

            <div id="Valors" class="w3-container w3-border city" style="display:none">
                <?php if (!empty($valors)): ?>
                    <p><?= $valors['contingut'] ?></p>
                <?php else: ?>
                    <p><?= lang('errors.valors') ?></p>
                <?php endif; ?>
            </div>

            <script>
                function openCity(evt, cityName) {
                    var i, x, tablinks;
                    x = document.getElementsByClassName("city");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " w3-red";
                }
            </script>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>

</body>

</html>