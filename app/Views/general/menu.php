<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <ul class="menu-items">
            <li><a href="<?= base_url('/') ?>">Inici</a></li>
            <li><a href="<?= base_url('contacte') ?>">Contacte</a></li>
            <li><a href="<?= base_url('sobrenosaltres') ?>">Sobre Nosaltres</a></li>
            <li><a href="<?= base_url('programes') ?>">Programes</a></li>
            <li><a href="<?= base_url('noticies') ?>">Noticies</a></li>
            <li><a href="<?= base_url('galeria') ?>">Galeria</a></li>
            <li><a href="<?= base_url('classificacio') ?>">Classificacio</a></li>
            <a href="<?= site_url('idioma/cambiar/es') ?>">ES</a> |
            <a href="<?= site_url('idioma/cambiar/ca') ?>">CA</a> |
        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        document.querySelector(".menu-items").classList.toggle("show");
    }
</script>