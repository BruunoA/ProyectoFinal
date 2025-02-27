<!doctype html>
<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" href="<?php // base_url('el_meu_estil/burlywood.css') ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        footer {
        background-color: #000;
        color: white;
        padding: 2rem 0;
        text-align: center;
    }

    footer div {
        margin-bottom: 1rem;
    }

    footer a {
        color: #ccc;
        text-decoration: none;
        margin: 0 0.5rem;
        transition: color 0.3s ease;
    }

    footer a:hover {
        color: #d32f2f;
    }
    </style>
<body>
<header>
        <div class="w3-bar w3-border" style="background-color: white;">
            <a href="index.html" class="w3-bar-item w3-button w3-padding-16">Inici</a>
            <a href="pages/Contacte.html" class="w3-bar-item w3-button w3-padding-16">Contacte</a>
            <a href="pages/sobreNosaltres.html" class="w3-bar-item w3-button w3-padding-16">Sobre Nosaltres</a>
            <a href="pages/Programes.html" class="w3-bar-item w3-button w3-padding-16">Programes</a>
            <a href="pages/Noticies.html" class="w3-bar-item w3-button w3-padding-16">Noticies</a>
            <a href="pages/Galeria.html" class="w3-bar-item w3-button w3-padding-16">Galeria</a>
            <a href="pages/Classificacio.html" class="w3-bar-item w3-button w3-padding-16">Classificacio</a>
        </div>
    </header>

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

    <footer>
        <div>
            <h3>Xarxes socials</h3>
            <img src="img/x.jpg" alt="">
            <img src="img/facebook.png" alt="">
            <img src="img/instagram.png" alt="">
        </div>
        <div>
            <a href="#">Inici</a>
            <a href="#">Contacte</a>
            <a href="#">Sobre Nosaltres</a>
            <a href="#">Programes</a>
            <a href="#">Noticies</a>
            <a href="#">Galeria</a>
            <a href="#">Classificacio</a>
        </div>
    </footer>
</body>

</html>
