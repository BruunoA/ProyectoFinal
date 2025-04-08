<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/sobreNosaltres.css'); ?>">
    <title><?= lang('sobreNosaltres.Titol') ?></title>
</head>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container" style="margin-top: 2rem;">
        <h2 class="w3-center"><?= lang('sobreNosaltres.TitolHistoria') ?></h2>
        <div class="historia-container">
            <img src="assets/img/campoAlpicat.jpg" alt="Campo Alpicat" class="historia-img" style="width: 50%;">
            <div class="w3-container historia-text">
                <p><?= lang('sobreNosaltres.TextHistoria') ?></p>
            </div>
        </div>
    </div>

    <div class="w3-container" style="margin-top: 2rem; margin-bottom: 2rem;">
        <div class="w3-container">
            <h1 class="w3-center"><?= lang('sobreNosaltres.Subtitol') ?></h1>

            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button tablink w3-red"
                    onclick="openCity(event,'Missio')"><?= lang('sobreNosaltres.TitolMissio') ?></button>
                <button class="w3-bar-item w3-button tablink"
                    onclick="openCity(event,'Vissio')"><?= lang('sobreNosaltres.TitolVissio') ?></button>
                <button class="w3-bar-item w3-button tablink"
                    onclick="openCity(event,'Valors')"><?= lang('sobreNosaltres.TitolValors') ?></button>
            </div>

            <!-- <div id="Missio" class="w3-container w3-border city">
                <h2><?= lang('sobreNosaltres.TitolMissio') ?></h2>
                <p><?= lang('sobreNosaltres.Missio') ?></p>
            </div> -->
            <a href="<?= base_url('sobre-nosaltres/missio') ?>">Ver Misión</a>
            <div id="Missio" class="w3-container w3-border city">
                <?php if (!empty($missio)): ?>
                    <p><?= esc($missio['contingut']) ?></p>
                <?php else: ?>
                    <p>No s'ha carregat</p>
                <?php endif; ?>
            </div>

            <div id="Visio" class="w3-container w3-border city">
                <?php if (!empty($visio)): ?>
                    <p><?= esc($visio['contingut']) ?></p>
                <?php else: ?>
                    <p>No s'ha carregat</p>
                <?php endif; ?>
            </div>

            <div id="Valors" class="w3-container w3-border city">
                <?php if (!empty($valors)): ?>
                    <p><?= esc($valors['contingut']) ?></p>
                <?php else: ?>
                    <p>No s'ha carregat</p>
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
                    for (i = 0; i < x.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " w3-red";
                }
            </script>
        </div>

        <?= $this->include('general/footer'); ?>

</body>

</html>