<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Sobre nosaltres</title>
    <style>
        .historia-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1rem;
        }

        .historia-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .historia-text {
            background-color: #f1f1f1;
            padding: 16px;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .historia-container {
                flex-direction: column;
                text-align: center;
            }

            .historia-text {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container" style="margin-top: 2rem;">
        <h2 class="w3-center"><?= lang('sobreNosaltres.Titol') ?></h2>
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
            <div id="Missio" class="w3-container w3-border city">
                <h2>Misión</h2>
                <?php if (!empty($missio)): ?>
                    <?php foreach ($missio as $item): ?>
                        <strong><?= esc($item['nom']) ?></strong>
                        <pre>
                            <?php var_dump($item['resum'])?>
                        </pre>
                        <p><?= esc($item['resum']) ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div id="Vissio" class="w3-container w3-border city" style="display:none">
                <h2><?= lang('sobreNosaltres.TitolVissio') ?></h2>
                <p><?= lang('sobreNosaltres.Vissio') ?></p>
            </div>

            <div id="Valors" class="w3-container w3-border city" style="display:none">
                <h2><?= lang('sobreNosaltres.TitolValors') ?></h2>
                <p><?= lang('sobreNosaltres.Valors') ?></p>
            </div>
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