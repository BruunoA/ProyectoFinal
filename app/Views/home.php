<!doctype html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
</head>
<style>
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            text-align: center;
        }

        .calendar div {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .calendar .header {
            font-weight: bold;
            background-color: #f1f1f1;
        }

        .calendar .day {
            background-color: #e7f3fe;
        }
    </style>
<body>
<?= $this->include('general/menu'); ?>

    <section class="w3-display-container w3-center w3-padding-32">
        <img src="img/campoAlpicat.jpg" alt="Campo de fútbol Alpicat" class="w3-image" style="max-width: 80%; border-radius: 10px;">
    </section>

    <section class="w3-row-padding w3-padding-32">
        <div class="w3-col m4 s12 w3-margin-bottom">
            <h2 class="w3-text-green">Destacado</h2>
            <img src="img/destacado.jpg" alt="Destacado" class="w3-image w3-hover-opacity" style="border-radius: 10px;">
        </div>

        <div class="w3-col m4 s12 w3-margin-bottom">
            <h2 class="w3-text-green">Inaugurado el campo de fútbol municipal de Alpicat (Lleida)</h2>
            <p class="w3-justify">El día 22 de septiembre 2019, ha sido inaugurado el campo de fútbol de Alpicat, tras el trabajo de remodelación realizado por Sports&Landscape, aprovechando así el torneo entre At. Club Alpicat y Torrefarrera CF. Por lo que los jugadores pudieron disfrutar de un terreno en perfectas condiciones gracias a un nuevo césped combinación de hilos monofilamentos y fibrilados de 60 mm.</p>
        </div>

        <div class="w3-col m4 s12 w3-padding-16 w3-center" style="border-radius: 10px;">
            <h2 class="w3-text-black">Calendario</h2>
            <div class="calendar">
                <div class="header">Lunes</div>
                <div class="header">Martes</div>
                <div class="header">Miércoles</div>
                <div class="header">Jueves</div>
                <div class="header">Viernes</div>
                <div class="header">Sábado</div>
                <div class="header">Domingo</div>

                <div class="day">1</div>
                <div class="day">2</div>
                <div class="day">3</div>
                <div class="day">4</div>
                <div class="day">5</div>
                <div class="day">6</div>
                <div class="day">7</div>
                <div class="day">8</div>
                <div class="day">9</div>
                <div class="day">10</div>
                <div class="day">11</div>
                <div class="day">12</div>
                <div class="day">13</div>
                <div class="day">14</div>
                <div class="day">15</div>
                <div class="day">16</div>
                <div class="day">17</div>
                <div class="day">18</div>
                <div class="day">19</div>
                <div class="day">20</div>
                <div class="day">21</div>
                <div class="day">22</div>
                <div class="day">23</div>
                <div class="day">24</div>
                <div class="day">25</div>
                <div class="day">26</div>
                <div class="day">27</div>
                <div class="day">28</div>
                <div class="day">29</div>
                <div class="day">30</div>
            </div>
        </div>
    </section>
    <?= $this->include('general/footer'); ?>
</body>

</html>
