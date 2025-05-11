<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/galeria.css'); ?>">
    <title><?= esc($album['titol']) ?> - Galería</title>
</head>

<body class="w3-light-grey">
    <?= $this->include('general/menu'); ?>

    <div class="w3-container w3-content w3-padding-64">
        <h1 class="w3-center"><?= esc($album['titol']) ?></h1>
        <p class="w3-opacity w3-center"><?= count($album['fotos']) ?> fotos</p>

        <div class="w3-row-padding w3-margin-top">
            <?php foreach ($album['fotos'] as $foto): ?>
                <div class="w3-col s12 m6 l3 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <img class="ferGran" src="<?= $foto['ruta'] ?>" alt="<?= esc($foto['descripcio']) ?>" style="width:100%">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="imageModal" class="w3-modal" onclick="this.style.display='none'">
        <span class="w3-button w3-display-topright w3-large w3-text-white">&times;</span>
        <div class="w3-modal-content w3-animate-zoom w3-black w3-round-large">
            <img id="modalImage" style="width:100%" class="w3-image w3-round-large">
            <div id="caption" class="w3-container w3-center w3-padding w3-white w3-text-black w3-round-large"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {     // esperem a que el DOM estigui carregat
            const images = document.querySelectorAll('.ferGran');       // seleccionem totes les imatges amb la classe 'ferGran'
            const modal = document.getElementById('imageModal');        // seleccionem el modal
            const modalImg = document.getElementById('modalImage');     // seleccionem la imatge del modal
            const captionText = document.getElementById("caption");     // seleccionem el del modela mostrar

            images.forEach(image => {
                image.addEventListener('click', function () {
                    modal.style.display = 'block';            // mostrem el modal
                    modalImg.src = this.src;                 // assignem la imatge al modal
                    captionText.innerHTML = this.alt;       // mostrem la descripcio de la imatge
                });
            });
        });
    </script>

    <?= $this->include('general/footer'); ?>
</body>
</html>
