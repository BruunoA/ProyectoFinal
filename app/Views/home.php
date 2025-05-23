<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/homecalendario.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title><?= lang('home.home') ?></title>
</head>
<style>
    .w3-card-4 .w3-container {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .mySlides {
        display: none;
    }

    .w3-display-container.mySlides {
        max-width: 90%;
        margin: 0 auto;
        position: relative;
    }

    .w3-display-container.mySlides .banner {
        max-width: 100%;
        height: auto;
        display: block;
        width: 100%;
    }
</style>

<body>
    <?= $this->include('general/menu'); ?>
    <?= session()->getFlashdata('error') ?>

    <div class="w3-content w3-display-container" style=" z-index: 0;">
        <!-- <div class="w3-content w3-display-container"> -->
        <?php foreach ($banners as $banner): ?>
            <div class="w3-display-container mySlides">
                <img src="<?= $banner['img']; ?>" class="w3-margin-top banner" style="max-height: 400px;">
            </div>
        <?php endforeach; ?>

        <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
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

                    <div class="w3-col l6 m12 s12 w3-padding">
                        <div class="w3-card w3-padding-16 w3-round-large w3-center">
                            <h2 class="w3-text-black"><?= lang('home.Calendari') ?></h2>
                            <div class="calendario-container">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="w3-margin-top w3-margin">
            <h2 class="w3-text-green"><?= lang('home.NoticiesDestacades') ?></h2>
            <?php if (!empty($noticies)): ?>
                <div class="cards-container">
                    <?php foreach ($noticies as $noticia): ?>
                        <div class="news-card w3-round" style="border: 2px solid black; display: flex; flex-direction: column;">
                            <a href="<?= base_url('noticia/' . esc($noticia['url'])) ?>">
                                <img src="<?= esc($noticia['portada']); ?>" alt="<?= esc($noticia['nom']); ?>" class="w3-image">
                            </a>
                            <div class="card-content">
                                <h3><?= esc(strlen($noticia['nom']) > 30 ? substr($noticia['nom'], 0, 30) . '...' : $noticia['nom']) ?></h3>
                                <p class="content-preview">
                                    <?= esc(strlen($noticia['resum']) > 60 ? substr($noticia['resum'], 0, 60) . '...' : $noticia['resum']) ?>
                                </p>
                                <a href="<?= base_url('noticia/' . esc($noticia['url'])) ?>" class="w3-button w3-green w3-margin-top"><?= lang('home.LlegirMes') ?></a>
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
        // var myCarousel = new bootstrap.Carousel(document.querySelector('#carouselExample'), {
        //     interval: 2000,
        //     ride: 'carousel'
        // });

        let slideIndex = 1;
        document.addEventListener("DOMContentLoaded", function() {
            showDivs(slideIndex);
        });

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        setInterval(() => plusDivs(1), 4000);

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>
</body>

</html>