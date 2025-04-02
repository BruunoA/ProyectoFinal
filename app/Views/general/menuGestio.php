<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

<!-- TODO: ACABAR DE VEURE COM FICAR ELS APARTATS DE FILTRAR-->
        <ul class="menu-items">
            <li><a href="">Inici</a></li>
            <li><a href="">Contacte</a></li>
            <select id="seccio-select" class="w3-select" onchange="filtrarSeccio(this.value)">
                <!-- <option value="">Sobre Nosaltres</option> -->
                <option value="sobreNosaltres">Sobre Nosaltres</option>
                <option value="historia">Història</option>
                <option value="missio">Missió</option>
                <option value="visio">Visió</option>
                <option value="valors">Valors</option>
            </select>
            <li><a href="">Programes</a></li>
            <li><a href="#" onclick="filtrarSeccio('noticies'); return false;">Noticies</a></li>
            <li><a href="">Galeria</a></li>
            <li><a href="">Configuracio</a></li>
            <!-- <li><a href="">Classificacio</a></li> -->
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
