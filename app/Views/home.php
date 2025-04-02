<!doctype html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/homecalendario.css'); ?>">
</head>
<body>

<?= $this->include('general/menu'); ?>

    <!-- Carrusel Bootstrap -->
    <section class="w3-container w3-center w3-padding-32">
    <div id="carouselExample" class="carousel slide w-75 mx-auto" data-bs-ride="carousel" data-bs-interval="4000">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/img/campoAlpicat.jpg'); ?>" class="d-block w-100 rounded" alt="Campo de fútbol Alpicat" style="height: 500px;">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/campoAlpicat.jpg'); ?>" class="d-block w-100 rounded" alt="Imagen 2" style="height: 500px;">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/campoAlpicat.jpg'); ?>" class="d-block w-100 rounded" alt="Imagen 3" style="height: 500px;">
                </div>
            </div>

        
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>

            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <section class="w3-row-padding w3-padding-32">
        <div class="w3-col l4 m6 s12 w3-margin-bottom">
            <h2 class="w3-text-green"><?=lang('home.Destacat')?></h2>
            <img src="<?= base_url('assets/img/destacado.jpg'); ?>" alt="Destacado" class="w3-image w3-hover-opacity w3-round" style="width:100%">
        </div>

        <div class="w3-col l4 m6 s12 w3-margin-bottom">
            <h2 class="w3-text-green"><?=lang('home.TitolBanner')?></h2>
            <p class="w3-justify"><?=lang('home.DescripcioBanner')?></p>
        </div>

        <div class="calendario-container">
            <h2 class="w3-text-black"><?=lang('home.Calendari')?></h2>
            <div class="calendario">
                <?php 
                $year = date('Y');
                $month = date('m');
                $today = date('j');
                $firstDayOfMonth = strtotime("$year-$month-01");
                $daysInMonth = date('t', $firstDayOfMonth);
                $firstDayOfWeek = date('N', $firstDayOfMonth);
                $diasSemana = ['L', 'M', 'X', 'J', 'V', 'S', 'D'];
                foreach ($diasSemana as $dia) {
                    echo "<div class='calendario-header'>$dia</div>";
                }
                for ($i = 1; $i < $firstDayOfWeek; $i++) {
                    echo '<div class="calendario-dia"> </div>';
                }
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $class = ($day == $today) ? 'calendario-dia hoy' : 'calendario-dia';
                    echo "<div class='$class'>$day</div>";
                }
                ?>
            </div>
        </div>
    </section>
    
<?= $this->include('general/footer'); ?>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto-slide personalizado (opcional) -->
<script>
    var myCarousel = new bootstrap.Carousel(document.querySelector('#carouselExample'), {
        interval: 4000, // Cambia cada 4 segundos
        ride: 'carousel'
    });
</script>

</body>
</html>
