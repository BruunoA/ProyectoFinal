<!doctype html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
</head>
<body>
<?= $this->include('general/menu'); ?>

    <section class="w3-container w3-center w3-padding-32">
        <img src="<?= base_url('assets/img/campoAlpicat.jpg'); ?>" alt="Campo de fútbol Alpicat" class="w3-image w3-round" style="max-width: 100%; height: auto;">
    </section>

    <section class="w3-row-padding w3-padding-32">
        <div class="w3-col l4 m6 s12 w3-margin-bottom">
            <h2 class="w3-text-green">Destacado</h2>
            <img src="<?= base_url('assets/img/destacado.jpg'); ?>" alt="Destacado" class="w3-image w3-hover-opacity w3-round" style="width:100%">
        </div>

        <div class="w3-col l4 m6 s12 w3-margin-bottom">
            <h2 class="w3-text-green">Inaugurado el campo de fútbol municipal de Alpicat (Lleida)</h2>
            <p class="w3-justify">El día 22 de septiembre 2019, ha sido inaugurado el campo de fútbol de Alpicat, tras el trabajo de remodelación realizado por Sports&Landscape, aprovechando así el torneo entre At. Club Alpicat y Torrefarrera CF. Por lo que los jugadores pudieron disfrutar de un terreno en perfectas condiciones gracias a un nuevo césped combinación de hilos monofilamentos y fibrilados de 60 mm.</p>
        </div>

        <div class="w3-col l4 m12 s12 w3-padding-16 w3-center">
            <h2 class="w3-text-black">Calendario</h2>
            <div class="w3-responsive w3-card w3-padding">
                <div class="w3-row w3-border-bottom">
                    <div class="w3-col s1 w3-padding-small">L</div>
                    <div class="w3-col s1 w3-padding-small">M</div>
                    <div class="w3-col s1 w3-padding-small">X</div>
                    <div class="w3-col s1 w3-padding-small">J</div>
                    <div class="w3-col s1 w3-padding-small">V</div>
                    <div class="w3-col s1 w3-padding-small">S</div>
                    <div class="w3-col s1 w3-padding-small">D</div>
                </div>
                <div class="w3-row">
                    <?php for ($i = 1; $i <= 30; $i++): ?>
                        <div class="w3-col s1 w3-padding-small w3-border w3-center"> <?= $i; ?> </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    
<?= $this->include('general/footer'); ?>
</body>
</html>
