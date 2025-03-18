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
        <h2 class="w3-center">Historia</h2>
        <div class="historia-container">
            <img src="assets/img/campoAlpicat.jpg" alt="Campo Alpicat" class="historia-img" style="width: 50%;">
            <div class="w3-container historia-text">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam temporibus placeat doloribus
                    eveniet cumque illum officia recusandae quas ut fuga esse nobis, optio reprehenderit possimus.
                    Debitis exercitationem pariatur veniam dolore.Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste reprehenderit at quas mollitia? Sit
                    distinctio maxime nesciunt rem. Id vero ipsam ipsa delectus architecto similique laborum, labore
                    quas incidunt ipsum?</p>
            </div>
        </div>
    </div>

    <div class="w3-container" style="margin-top: 2rem; margin-bottom: 2rem;">
        <div class="w3-container">
            <h1 class="w3-center">Títol</h1>

            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'Missio')">Missio</button>
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Vissio')">Vissio</button>
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Valors')">Valors</button>
            </div>

            <div id="Missio" class="w3-container w3-border city">
                <h2>Missio</h2>
                <p>Text de la missio</p>
            </div>

            <div id="Vissio" class="w3-container w3-border city" style="display:none">
                <h2>Vissio</h2>
                <p>Text de la vissio</p>
            </div>

            <div id="Valors" class="w3-container w3-border city" style="display:none">
                <h2>Valors</h2>
                <p>Text dels valors</p>
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