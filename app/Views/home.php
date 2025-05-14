<!doctype html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/homecalendario.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<style>
    .w3-card-4 .w3-container {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    <?= $this->include('general/menu'); ?>
    <?= session()->getFlashdata('error') ?>
    <div id="carouselExample" class="carousel slide w-75 mx-auto" data-bs-ride="carousel" data-bs-interval="1000">

        <!-- <div class="carousel-inner">
            <?php // foreach ($banners as $banner): 
            ?>
                <div class="carousel-item">
                    <img src="<?php // $banner['contingut']; 
                                ?>" class="d-block w-100 rounded img-fluid" alt="Banner" style="object-fit: cover; height: 500px;">
                </div>
            <?php // endforeach; 
            ?>
        </div> -->


        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/img/campoAlpicat.jpg'); ?>" class="d-block w-100 rounded img-fluid" alt="Campo de fútbol Alpicat" style="height: 500px; object-fit:cover">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/campoAlpicat.jpg'); ?>" class="d-block w-100 rounded img-fluid" alt="Imagen 2" style="height: 500px; object-fit:cover">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/campoAlpicat.jpg'); ?>" class="d-block w-100 rounded img-fluid" alt="Imagen 3" style="height: 500px; object-fit:cover">
            </div>
        </div>

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    </div>
    </section>

    <div class="w3-content w3-padding-32" style="max-width:1200px">

        <section class="w3-row-padding">
            <div class="w3-container w3-margin-top">
                <div class="w3-row">
                    <div class="w3-col l6 m12 s12 w3-padding">
                        <div class="w3-card w3-padding-16 w3-round-large w3-light-grey">
                            <div class="w3-card w3-padding-16 w3-amber w3-padding w3-margin">
                                <h4 class="w3-text-white"><?= lang('home.Missio') ?></h4>
                                <p class="w3-text-white"><?= $missio['resum'] ?? '' ?></p>
                            </div>
                            <div class="w3-card w3-padding-16 w3-blue w3-padding w3-margin" style="margin-top: 20px;">
                                <h4 class="w3-text-white"><?= lang('home.Visio') ?></h4>
                                <p class="w3-text-white"><?= $visio['resum'] ?? '' ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="calendario-container">
                        <div class="w3-row w3-margin-bottom">
                            <div class="w3-col s4">
                                <a href="?month=<?= $month - 1 ?>&year=<?= ($month == 1) ? $year - 1 : $year ?>"
                                    class="w3-button w3-round-large w3-grey">
                                    <i class="fas fa-arrow-left"></i> Anterior
                                </a>
                            </div>
                            <div class="w3-col s4">
                                <h3 class="w3-text-black"><?= $mesesCatala[$month] . ' ' . $year ?></h3>
                            </div>
                            <div class="w3-col s4">
                                <a href="?month=<?= $month + 1 ?>&year=<?= ($month == 12) ? $year + 1 : $year ?>"
                                    class="w3-button w3-round-large w3-grey">
                                    Siguiente <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="calendario">
                            <?php foreach (['L', 'M', 'X', 'J', 'V', 'S', 'D'] as $dia): ?>
                                <div class='calendario-header'><?= $dia ?></div>
                            <?php endforeach; ?>

                            <?php
                            $firstDayOfWeek = date('N', strtotime("$year-$month-01"));
                            for ($i = 1; $i < $firstDayOfWeek; $i++): ?>
                                <div class="calendario-dia"></div>
                            <?php endfor; ?>

                            <?php
                            $daysInMonth = date('t', strtotime("$year-$month-01"));
                            for ($day = 1; $day <= $daysInMonth; $day++):
                                $isToday = ($day == $today && $year == $currentYear && $month == $currentMonth);
                            ?>
                                <div class='calendario-dia <?= $isToday ? 'hoy' : '' ?>'>
                                    <div><?= $day ?></div>
                                    <?= isset($eventDays[$day]) ? '<div class="event-dot"></div>' : '' ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </section>


    <div class="w3-margin-top">
        <h2 class="w3-text-green"><?= lang('home.NoticiesDestacades') ?></h2>
        <?php if (!empty($noticies)): ?>
            <div class="w3-row-padding">
                <?php foreach ($noticies as $noticia): ?>
                    <div class="w3-third w3-margin-bottom">
                        <div class="w3-card-4 noticies" style="display: flex; flex-direction: column; height: 100%; justify-content: space-between;">
                            <div class="w3-container w3-padding">
                                <img src="<?= $noticia['portada']; ?>" style="width:100%; height: 200px; object-fit: cover;">
                                <h3><?= esc($noticia['nom']) ?></h3>
                                <p><?= esc($noticia['resum']) ?></p>
                            </div>
                            <a href="<?= base_url('noticia/' . esc($noticia['url'])) ?>" class="w3-button w3-green w3-margin-top w3-margin-bottom w3-margin"><?= lang('home.LlegirMes') ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p style="background-color: red; color: white; padding: 10px;"><?= lang('errors.noNews') ?></p>
        <?php endif; ?>
    </div>
    </div>
    <?= $this->include('general/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var myCarousel = new bootstrap.Carousel(document.querySelector('#carouselExample'), {
            interval: 2000,
            ride: 'carousel'
        });
    </script>
</body>

</html>