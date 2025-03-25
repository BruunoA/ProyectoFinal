<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <ul class="menu-items">
            <li><a href="">Inici</a></li>
            <li><a href="">Contacte</a></li>
            <!-- <li><a href="">Sobre Nosaltres</a></li> -->
            <select id="seccio-select" class="w3-select" value="Sobre nosaltres">
                <option value="historia">Història</option>
                <option value="missio">Missió/Visió/Valors</option>
            </select>
            <li><a href="">Programes</a></li>
            <li><a href="#" onclick="filtrarSeccio('noticies'); return false;">Noticies</a></li>
            <li><a href="">Galeria</a></li>
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
