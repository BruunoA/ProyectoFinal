<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner y Escudos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/pagina_inicial.css'); ?>">
</head>

<body>
    <header class="w3-container w3-center w3-padding-32"
        style="background: linear-gradient(to right, #000, #d32f2f); color: white;">
        <h1 style="margin: 0;">FUTBOL CLUB ALPICAT</h1>
    </header>

    <section class="w3-display-container w3-center">
        <div>
            <img src="<?= base_url('assets/img/campoAlpicat.jpg'); ?>" alt="Campo de fútbol Alpicat"
                class="w3-image w3-margin-top"
                style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;">
        </div>
    </section>

    <div class="w3-row-padding w3-center w3-margin-top">
        <?php
        $equipos = [
            ['link' => 'home/', 'img' => 'alpicatLogo.png', 'nombre' => 'Equipo ALPICAT 1'],
            ['link' => 'equipo2/', 'img' => 'alpicatLogo.png', 'nombre' => 'Equipo ALPICAT 2'],
            ['link' => 'equipo3/', 'img' => 'alpicatLogo.png', 'nombre' => 'Equipo ALPICAT 3']
        ];
        foreach ($equipos as $equipo): ?>
            <div class="w3-third">
                <a href="<?= base_url($equipo['link']); ?>" class="team-card">
                    <div class="w3-card w3-hover-shadow w3-round-large">
                        <img src="<?= base_url('assets/img/' . $equipo['img']); ?>" alt="<?= $equipo['nombre']; ?>"
                            class="w3-image" style="width:50%; padding-top: 20px;">
                        <div class="w3-container w3-padding">
                            <h3><?= $equipo['nombre']; ?></h3>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <br>
    <footer class="w3-padding-32 w3-center" style="background: #000; color: white;">
        <div>
            <a href="https://x.com/" target="_blank"><img src="<?= base_url('assets/img/x.jpg'); ?>" class="social-icon"
                    alt="Twitter"></a>
            <a href="https://facebook.com/" target="_blank"><img src="<?= base_url('assets/img/facebook.png'); ?>"
                    class="social-icon" alt="Facebook"></a>
            <a href="https://instagram.com/" target="_blank"><img src="<?= base_url('assets/img/instagram.png'); ?>"
                    class="social-icon" alt="Instagram"></a>
        </div>
    </footer>
</body>

</html>