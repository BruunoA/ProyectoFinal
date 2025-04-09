<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

<!-- TODO: ACABAR DE VEURE COM FICAR ELS APARTATS DE FILTRAR-->
        <ul class="menu-items">
            <li><a href="">Inici</a></li>
            <li><a href="">Contacte</a></li>
            <select id="seccio-select" class="w3-select" onchange="filtrarSeccio(this.value)">
                <option value="" style="font-weight: bold;">Sobre Nosaltres</option>
                <option value="historia">&nbsp;&nbsp;&nbsp;Història</option>
                <option value="missio">&nbsp;&nbsp;&nbsp;Missió</option>
                <option value="visio">&nbsp;&nbsp;&nbsp;Visió</option>
                <option value="valors">&nbsp;&nbsp;&nbsp;Valors</option>
            </select>
            <li><a href="">Programes</a></li>
            <!-- <li><a href="#" onclick="filtrarSeccio('noticies'); return false;">Noticies</a></li> -->
            <select id="seccio-select" class="w3-select" onchange="filtrarSeccio(this.value)">
                <option value="" style="font-weight: bold;">Noticies</option>
                <option value="noticies">&nbsp;&nbsp;&nbsp;Noticies</option>
                <option value="event">&nbsp;&nbsp;&nbsp;Events</option>
            </select>
            <li><a href="" onclick="filtrarSeccio('galeria'); return false;">Galeria</a></li>
            <li><a href="">Configuracio</a></li>
        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        document.querySelector(".menu-items").classList.toggle("show");
    }

    function filtrarSeccio(seccio) {
        document.querySelectorAll(".gestio-item").forEach(item => {
            if (item.getAttribute("data-seccio") === seccio) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }
</script>
